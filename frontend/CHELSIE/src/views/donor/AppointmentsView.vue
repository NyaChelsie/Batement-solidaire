<template>
  <div class="p-6 md:p-8 lg:p-10 max-w-7xl mx-auto w-full">
    <div class="flex justify-between items-center mb-8">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Mes rendez-vous</h1>
        <p class="text-gray-500 mt-1 font-medium">Gérez vos rendez-vous pour donner votre sang.</p>
      </div>
      <button @click="isAppointmentModalOpen = true" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold shadow-md shadow-red-600/20 transition-all active:scale-[0.98]">
        Prendre rendez-vous
      </button>
    </div>

    <div class="space-y-6">
      <div v-if="appointments.length === 0" class="bg-white p-8 rounded-2xl shadow-sm text-center border border-gray-100">
        <p class="text-gray-500 mb-4">Vous n'avez aucun rendez-vous planifié.</p>
      </div>
      
      <div v-for="appt in appointments" :key="appt.id" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex-1">
          <h3 class="text-xl font-bold text-gray-900 mb-1">{{ appt.donation_center?.name || 'Centre' }}</h3>
          <p class="text-sm text-gray-500 mb-2">
            {{ appt.donation_center?.address }}, {{ appt.donation_center?.city }}
          </p>
          <div class="flex flex-col sm:flex-row gap-4 mt-4">
            <div class="bg-gray-50 px-4 py-2 rounded-lg">
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Date</p>
                <p class="font-bold text-gray-900">{{ formatDate(appt.appointment_date) }}</p>
            </div>
            <div class="bg-gray-50 px-4 py-2 rounded-lg">
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Heure</p>
                <p class="font-bold text-gray-900">{{ appt.appointment_time?.substring(0, 5) }}</p>
            </div>
          </div>
        </div>
        
        <div class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl" v-if="appt.qr_code_path">
           <img :src="'https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=' + appt.qr_code_path" alt="QR Code" class="w-24 h-24 rounded-lg mix-blend-multiply">
           <p class="text-xs text-gray-500 font-mono mt-2">{{ appt.qr_code_path }}</p>
        </div>

        <div>
           <button @click="cancelAppointment(appt.id)" class="px-4 py-2 bg-white border border-red-200 text-red-600 font-bold rounded-xl hover:bg-red-50 transition-colors">
              Annuler
           </button>
        </div>
      </div>
    </div>
    
    <BookAppointmentModal :show="isAppointmentModalOpen" @close="isAppointmentModalOpen = false" @appointment-created="handleAppointmentCreated" />
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import BookAppointmentModal from '@/components/donor/BookAppointmentModal.vue';

export default {
    components: { BookAppointmentModal },
    data() {
        return {
            appointments: [],
            isAppointmentModalOpen: false
        }
    },
    mounted() {
        this.fetchAppointments();
    },
    methods: {
        async fetchAppointments() {
            try {
                const token = localStorage.getItem('access_token');
                const response = await axios.get('http://127.0.0.1:8000/api/appointments/my', {
                    headers: { 'Authorization': `Bearer ${token}` }
                });
                this.appointments = response.data.filter(a => a.status === 'scheduled');
            } catch (error) {
                console.error('Erreur de chargement des rendez-vous:', error);
            }
        },
        handleAppointmentCreated() {
            this.fetchAppointments();
        },
        async cancelAppointment(id) {
            const confirmed = await Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Voulez-vous vraiment annuler ce rendez-vous ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Oui, annuler'
            });

            if(confirmed.isConfirmed) {
                try {
                    const token = localStorage.getItem('access_token');
                    await axios.put(`http://127.0.0.1:8000/api/appointments/${id}/cancel`, {}, {
                        headers: { 'Authorization': `Bearer ${token}` }
                    });
                    Swal.fire('Annulé', 'Rendez-vous annulé.', 'success');
                    this.fetchAppointments();
                } catch(error) {
                    Swal.fire('Erreur', 'Impossible d\'annuler.', 'error');
                }
            }
        },
         formatDate(dateStr) {
            if (!dateStr) return '';
            const options = { day: 'numeric', month: 'short', year: 'numeric' };
            return new Date(dateStr).toLocaleDateString('fr-FR', options);
        }
    }
}
</script>
