<template>
  <div v-if="show" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
      
      <!-- Header -->
      <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50 relative">
          <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-red-600"></div>
          <div>
              <h2 class="text-xl font-black text-gray-900">Prendre rendez-vous</h2>
              <p class="text-sm text-gray-500 font-medium mt-1">Étape {{ step }} sur 3</p>
          </div>
          <button @click="close" class="text-gray-400 hover:text-gray-900 bg-white hover:bg-gray-100 p-2 rounded-xl transition shadow-sm border border-gray-100">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          </button>
      </div>

      <!-- Content Box -->
      <div class="p-6 overflow-y-auto flex-1">
        
        <!-- Step 1: Select Center -->
        <div v-if="step === 1" class="space-y-4">
            <h3 class="font-bold text-gray-900 text-lg mb-4 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center">1</div>
                Choisissez un centre de collecte
            </h3>
            
            <!-- Search -->
            <div class="relative mb-6">
                <input v-model="searchCity" type="text" placeholder="Rechercher par ville (ex: Douala)" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-red-500 focus:border-red-500 transition">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <div v-if="isLoadingCenters" class="py-8 flex justify-center">
                <svg class="animate-spin h-8 w-8 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            </div>
            
            <div v-else class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div v-for="center in filteredCenters" :key="center.id" 
                     @click="selectedCenter = center"
                     :class="{'border-red-500 bg-red-50 ring-2 ring-red-500/20': selectedCenter?.id === center.id, 'border-gray-200 hover:border-red-300 hover:bg-gray-50': selectedCenter?.id !== center.id}"
                     class="border rounded-2xl p-4 cursor-pointer transition relative overflow-hidden group">
                     
                     <div class="absolute top-0 right-0 p-3 opacity-0 group-hover:opacity-100 transition" :class="{'opacity-100 text-red-600': selectedCenter?.id === center.id, 'text-gray-400': selectedCenter?.id !== center.id}">
                         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                     </div>

                    <h4 class="font-bold text-gray-900 pr-8">{{ center.name }}</h4>
                    <p class="text-sm text-gray-500 mt-1 flex items-start gap-1">
                        <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{{ center.address }}, {{ center.city }}</span>
                    </p>
                </div>
                <div v-if="filteredCenters.length === 0" class="col-span-full py-8 text-center text-gray-500">
                    Aucun centre trouvé pour cette ville.
                </div>
            </div>
        </div>

        <!-- Step 2: Select Date and Time -->
        <div v-if="step === 2" class="space-y-6">
            <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                <button @click="step = 1" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-600 flex items-center justify-center hover:bg-gray-200 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                Sélectionnez une date et une heure
            </h3>
            
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex gap-3 text-blue-800 text-sm">
                <svg class="w-5 h-5 shrink-0 mt-0.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Vous aver choisi : <strong>{{ selectedCenter?.name }}</strong>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Date du don</label>
                    <input v-model="appointmentDate" type="date" :min="minDate" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-red-500 focus:border-red-500 transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Heure prévue</label>
                    <select v-model="appointmentTime" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-red-500 focus:border-red-500 transition">
                        <option value="">Choisir une heure...</option>
                        <option v-for="time in availableTimes" :key="time" :value="time">{{ time }}</option>
                    </select>
                </div>
            </div>
            
            <!-- Quick checklist -->
            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5 mt-4">
                <h4 class="font-bold text-sm text-gray-900 mb-3">Rappels importants avant le don :</h4>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Mangez léger et hydratez-vous bien.</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Pesez au moins 50kg.</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Munissez-vous d'une pièce d'identité valide.</li>
                </ul>
            </div>
        </div>

        <!-- Step 3: Confirmation -->
        <div v-if="step === 3" class="space-y-6 text-center py-6">
            <div class="w-20 h-20 rounded-full bg-green-100 text-green-500 mx-auto flex items-center justify-center mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="font-black text-2xl text-gray-900">Résumé de votre rendez-vous</h3>
            <p class="text-gray-500">Veuillez vérifier les informations avant de confirmer.</p>
            
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 max-w-sm mx-auto text-left space-y-4">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Lieu</span>
                    <span class="font-bold text-gray-900">{{ selectedCenter?.name }}</span>
                    <span class="text-sm text-gray-500 block">{{ selectedCenter?.address }}, {{ selectedCenter?.city }}</span>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Date</span>
                        <span class="font-bold text-gray-900">{{ formatDate(appointmentDate) }}</span>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Heure</span>
                        <span class="font-bold text-gray-900">{{ appointmentTime }}</span>
                    </div>
                </div>
            </div>
        </div>

      </div>

      <!-- Footer Buttons -->
      <div class="p-6 border-t border-gray-100 bg-gray-50 flex justify-end gap-3">
          <button v-if="step === 1" @click="close" class="px-6 py-2.5 rounded-xl font-bold text-gray-600 hover:bg-gray-200 transition">Annuler</button>
          <button v-if="step === 1" @click="step = 2" :disabled="!selectedCenter" class="px-6 py-2.5 rounded-xl font-bold text-white bg-red-600 hover:bg-red-700 disabled:opacity-50 transition shadow-lg shadow-red-600/20">Suivant</button>
          
          <button v-if="step === 2" @click="step = 3" :disabled="!appointmentDate || !appointmentTime" class="px-6 py-2.5 rounded-xl font-bold text-white bg-red-600 hover:bg-red-700 disabled:opacity-50 transition shadow-lg shadow-red-600/20">Valider l'horaire</button>
          
          <button v-if="step === 3" @click="step = 2" class="px-6 py-2.5 rounded-xl font-bold text-gray-600 hover:bg-gray-200 transition">Modifier</button>
          <button v-if="step === 3" @click="submit" :disabled="isSubmitting" class="px-6 py-2.5 rounded-xl font-bold text-white bg-green-600 hover:bg-green-700 disabled:opacity-50 transition shadow-lg shadow-green-600/20 flex items-center gap-2">
              <svg v-if="isSubmitting" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
              Confirmer le RDV
          </button>
      </div>

    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    props: {
        show: {
            type: Boolean,
            required: true
        }
    },
    data() {
        return {
            step: 1,
            centers: [],
            searchCity: '',
            isLoadingCenters: false,
            selectedCenter: null,
            appointmentDate: '',
            appointmentTime: '',
            isSubmitting: false,
            // Mock available times for demo purpose
            availableTimes: ['08:00', '09:00', '10:00', '11:00', '14:00', '15:00', '16:00']
        }
    },
    computed: {
        filteredCenters() {
            if (!this.searchCity) return this.centers;
            return this.centers.filter(c => c.city.toLowerCase().includes(this.searchCity.toLowerCase()));
        },
        minDate() {
            const today = new Date();
            today.setDate(today.getDate() + 1); // Earliest tomorrow
            return today.toISOString().split('T')[0];
        }
    },
    watch: {
        show(val) {
            if (val) {
                this.resetForm();
                this.fetchCenters();
            }
        }
    },
    methods: {
        async fetchCenters() {
            this.isLoadingCenters = true;
            try {
                const token = localStorage.getItem('access_token');
                if(!token) return;
                const response = await axios.get('http://127.0.0.1:8000/api/donation-centers', {
                    headers: { 'Authorization': `Bearer ${token}` }
                });
                
                const filtered = response.data.filter(c => 
                    c.name.toLowerCase().includes('douala') || 
                    c.name.toLowerCase().includes('yaound')
                );
                
                // Fallback to mock data if the API doesn't have these specific hospitals
                this.centers = filtered.length > 0 ? filtered : [
                    { id: 1, name: 'Hôpital Général de Douala', address: 'Minedub', city: 'Douala' },
                    { id: 2, name: 'Hôpital Général de Yaoundé', address: 'Quartier Ngousso', city: 'Yaoundé' }
                ];
            } catch (error) {
                console.error('Failed to fetch centers:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Impossible de charger les centres.',
                    confirmButtonColor: '#dc2626'
                });
                this.close();
            } finally {
                this.isLoadingCenters = false;
            }
        },
        async submit() {
            this.isSubmitting = true;
            try {
                const token = localStorage.getItem('access_token');
                const response = await axios.post('http://127.0.0.1:8000/api/appointments', {
                    donation_center_id: this.selectedCenter.id,
                    appointment_date: this.appointmentDate,
                    appointment_time: this.appointmentTime
                }, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                Swal.fire({
                    icon: 'success',
                    title: 'Réservé !',
                    text: response.data.message || 'Votre rendez-vous est confirmé.',
                    confirmButtonColor: '#16a34a'
                });
                
                this.$emit('appointment-created', response.data.appointment);
                this.close();
            } catch (error) {
                console.error(error);
                let text = "Une erreur est survenue lors de la réservation.";
                if(error.response?.data?.message) text = error.response.data.message;
                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: text,
                    confirmButtonColor: '#dc2626'
                });
            } finally {
                this.isSubmitting = false;
            }
        },
        resetForm() {
            this.step = 1;
            this.selectedCenter = null;
            this.searchCity = '';
            this.appointmentDate = '';
            this.appointmentTime = '';
        },
        formatDate(dateStr) {
            if (!dateStr) return '';
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateStr).toLocaleDateString('fr-FR', options);
        },
        close() {
            this.resetForm();
            this.$emit('close');
        }
    }
}
</script>

<style scoped>
</style>
