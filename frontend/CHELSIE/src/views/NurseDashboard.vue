<template>
  <div class="min-h-screen bg-gray-50 flex font-sans text-gray-800">
    <main class="flex-1 overflow-y-auto">
      <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center sticky top-0 z-10">
           <div class="flex items-center gap-3">
               <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-md shadow-blue-600/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
               </div>
               <h1 class="text-xl font-bold text-gray-900">Espace Infirmier(e) - HGD</h1>
           </div>
           <div class="flex items-center gap-6">
               <div class="flex items-center gap-3 hidden sm:flex">
                   <img :src="'https://ui-avatars.com/api/?name='+encodeURIComponent(user.name)+'&background=eff6ff&color=2563eb'" alt="Nurse Profile" class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                   <div class="text-sm">
                       <p class="font-bold text-gray-900">{{ user.name }}</p>
                       <p class="text-xs text-blue-600 font-medium capitalize">{{ user.role }}</p>
                   </div>
               </div>
               
               <button @click="logout" class="text-sm font-bold text-gray-500 hover:text-red-600 transition flex items-center gap-2">
                   Se déconnecter
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
               </button>
           </div>
      </header>

      <div class="p-8 max-w-4xl mx-auto">
          
          <!-- State 1: Awaiting Scan -->
          <div v-if="!appointment" class="bg-white border border-gray-100 rounded-3xl shadow-sm p-10 text-center relative overflow-hidden">
               <div class="w-24 h-24 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 mx-auto mb-6">
                   <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
               </div>
               <h2 class="text-2xl font-bold text-gray-900 mb-2">Scanner le QR Code du donneur</h2>
               <p class="text-gray-500 mb-8 max-w-md mx-auto">Vous pouvez utiliser la caméra de votre tablette ou saisir manuellement le code du rendez-vous.</p>

               <div class="max-w-md mx-auto relative">
                   <div class="flex items-center gap-2">
                       <input v-model="manualQrCode" @keyup.enter="lookupAppointment" type="text" placeholder="Saisie manuelle du code..." class="bg-gray-50 border border-gray-200 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-4 font-bold text-center uppercase tracking-widest">
                       <button @click="lookupAppointment" :disabled="isLoading" class="bg-blue-600 hover:bg-blue-700 disabled:opacity-50 text-white p-4 rounded-xl shadow-lg transition shadow-blue-600/20">
                           <svg v-if="!isLoading" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                           <svg v-else class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                       </button>
                   </div>
                   <div v-if="errorMsg" class="mt-4 text-red-600 font-bold bg-red-50 p-3 rounded-lg border border-red-100">
                       {{ errorMsg }}
                   </div>
               </div>
               
               <div class="mt-8 flex items-center justify-center gap-4 text-sm text-gray-400">
                   <span class="h-px bg-gray-200 w-12"></span> OU <span class="h-px bg-gray-200 w-12"></span>
               </div>
               
               <button class="mt-8 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 px-6 rounded-xl transition flex items-center gap-2 mx-auto">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                   Activer la caméra
               </button>
          </div>

          <!-- State 2: Appointment Found / Donor Info -->
          <div v-else class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden animate-fade-in">
              <div class="bg-blue-50 p-6 border-b border-blue-100 flex justify-between items-center">
                  <div>
                      <h2 class="text-2xl font-black text-gray-900">Validation du Don</h2>
                      <p class="text-blue-700 font-medium">Rendez-vous #{{ appointment.id }}</p>
                  </div>
                  <button @click="resetFlow" class="text-gray-500 hover:text-gray-900 bg-white p-2 rounded-lg border border-gray-200 transition">
                      Annuler
                  </button>
              </div>
              
              <div class="p-8">
                  <!-- Donor Profile Card -->
                  <div class="flex items-start gap-6 mb-10 pb-10 border-b border-gray-100">
                      <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-black text-2xl shadow-sm border-4 border-white">
                          {{ appointment.donor ? appointment.donor.blood_type || '?' : '?' }}
                      </div>
                      <div>
                          <h3 class="text-xl font-bold text-gray-900">{{ appointment.donor ? appointment.donor.name : 'Donneur Inconnu' }}</h3>
                          <div class="text-gray-500 text-sm mt-1 grid grid-cols-2 gap-x-8 gap-y-2">
                               <p v-if="appointment.donor && appointment.donor.weight"><strong>Poids :</strong> {{ parseFloat(appointment.donor.weight) }} kg</p>
                               <p v-if="appointment.donor && appointment.donor.date_of_birth"><strong>Né(e) le :</strong> {{ formatDate(appointment.donor.date_of_birth) }}</p>
                               <p class="col-span-2"><strong>Campagne :</strong> {{ appointment.campaign ? appointment.campaign.title : 'N/A' }}</p>
                               <p class="col-span-2 text-green-600 font-bold bg-green-50 px-2 py-1 rounded inline-block mt-1">Quiz d'éligibilité : Passé avec succès</p>
                          </div>
                      </div>
                  </div>

                  <!-- Medical Form -->
                  <h4 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
                       <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                       Constantes médicales
                  </h4>
                  
                  <form @submit.prevent="submitVitals" class="space-y-6 max-w-2xl">
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tension Artérielle</label>
                                <div class="relative">
                                    <input v-model="vitals.blood_pressure" type="text" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-blue-500 focus:border-blue-500 p-4" placeholder="Ex: 120/80">
                                    <span class="absolute right-4 top-4 text-gray-400 font-medium">mmHg</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Taux d'Hémoglobine</label>
                                <div class="relative">
                                    <input v-model="vitals.hemoglobin_level" type="number" step="0.1" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-blue-500 focus:border-blue-500 p-4" placeholder="Ex: 13.5">
                                    <span class="absolute right-4 top-4 text-gray-400 font-medium">g/dL</span>
                                </div>
                            </div>
                      </div>
                      
                      <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-200 flex items-start gap-3 mt-8">
                          <input type="checkbox" id="validationAlert" required class="mt-1 text-blue-600 focus:ring-blue-500 w-5 h-5 rounded cursor-pointer">
                          <label for="validationAlert" class="text-sm text-yellow-800 font-medium cursor-pointer">
                              Je certifie que le prélèvement sanguin d'une poche s'est déroulé avec succès et en toute sécurité. 
                              <strong>Cette action ajoutera +1 poche au stock du groupe sanguin concerné.</strong>
                          </label>
                      </div>

                      <button type="submit" :disabled="isSubmitting" class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg transition flex justify-center items-center gap-2">
                          <svg v-if="!isSubmitting" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                          <svg v-else class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                          {{ isSubmitting ? 'Validation...' : 'Valider le Don et Mettre à jour le Stock' }}
                      </button>
                  </form>
              </div>
          </div>

      </div>
    </main>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            user: { name: 'Infirmier', role: 'infirmier' },
            manualQrCode: '',
            isLoading: false,
            errorMsg: null,
            appointment: null,
            vitals: {
                blood_pressure: '',
                hemoglobin_level: ''
            },
            isSubmitting: false
        }
    },
    mounted() {
        const userData = localStorage.getItem('user');
        if (userData) {
            try {
                this.user = JSON.parse(userData);
            } catch (e) {
                console.error(e);
            }
        }
    },
    methods: {
        async lookupAppointment() {
            if (!this.manualQrCode) return;
            this.isLoading = true;
            this.errorMsg = null;
            
            try {
                // Fetch appointment by QR code
                const response = await axios.get(`http://127.0.0.1:8000/api/nurse/appointments/qr/${this.manualQrCode}`);
                this.appointment = response.data;
            } catch (err) {
                if (err.response && err.response.status === 404) {
                    this.errorMsg = "Aucun rendez-vous trouvé pour ce code.";
                } else {
                    this.errorMsg = "Erreur de connexion.";
                }
            } finally {
                this.isLoading = false;
            }
        },
        async submitVitals() {
            if (!this.appointment) return;
            this.isSubmitting = true;

            try {
                await axios.post(`http://127.0.0.1:8000/api/nurse/appointments/${this.appointment.id}/complete`, this.vitals);
                alert("Don complété avec succès ! Le stock a été mis à jour.");
                this.resetFlow();
            } catch (err) {
                console.error(err);
                if (err.response && err.response.data && err.response.data.message) {
                    alert(err.response.data.message);
                } else {
                    alert("Une erreur s'est produite lors de la validation du don.");
                }
            } finally {
                this.isSubmitting = false;
            }
        },
        resetFlow() {
            this.appointment = null;
            this.manualQrCode = '';
            this.vitals.blood_pressure = '';
            this.vitals.hemoglobin_level = '';
            this.errorMsg = null;
        },
        formatDate(dateStr) {
            const d = new Date(dateStr);
            return d.toLocaleDateString('fr-FR');
        },
        logout() {
            localStorage.clear();
            this.$router.push('/login');
        }
    }
}
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.4s ease-out forwards;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
