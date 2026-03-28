<template>
  <div class="min-h-screen bg-gray-50 flex font-sans text-gray-800">
    
    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
      <div class="p-6">
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
          </div>
          <span class="text-xl font-bold tracking-tight">Batement Solidaire</span>
        </div>
      </div>
      
      <nav class="flex-1 px-4 py-4 space-y-2">
        <a href="#" class="flex items-center gap-3 px-4 py-3 bg-red-50 text-red-700 rounded-xl font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
          Tableau de bord
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          Mes rendez-vous
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Historique des dons
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          Centres de collecte
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          ParamÃ¨tres
        </a>
      </nav>

      <div class="p-4 border-t border-gray-100">
        <div class="flex items-center gap-3 px-4 py-3 mb-4">
          <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=fee2e2&color=dc2626" alt="User Profile" class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
          <div class="flex-1 min-w-0">
            <p class="text-sm font-bold text-gray-900 truncate">{{ user.name || 'Jean Dupont' }}</p>
            <p class="text-xs text-red-600 font-medium truncate">Groupe : {{ stats.blood_type || 'O+' }}</p>
          </div>
        </div>
        <button @click="logout" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
          DÃ©connexion
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto w-full transition-all">
      
      <!-- Mobile Header -->
       <header class="md:hidden flex items-center justify-between p-4 bg-white border-b border-gray-200">
          <div class="flex items-center gap-2">
             <div class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            </div>
          </div>
          <p class="font-bold text-sm">Tableau de bord</p>
          <button @click="logout" class="text-gray-500 hover:text-red-600 p-2">
             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
          </button>
       </header>

      <div class="p-6 md:p-8 lg:p-10 max-w-7xl mx-auto w-full">
        
        <!-- Welcome Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
          <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Bonjour, {{ user.name?.split(' ')[0] || 'Jean' }} !</h1>
            <p class="text-gray-500 mt-1 font-medium">Votre gÃ©nÃ©rositÃ© sauve des vies. Voici l'Ã©tat de vos contributions.</p>
          </div>
          <button @click="isAppointmentModalOpen = true" class="flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold shadow-md shadow-red-600/20 transition-all active:scale-[0.98]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Prendre rendez-vous
          </button>
        </div>

        <!-- Next Appointment Area -->
        <div class="max-w-4xl mx-auto mt-8">
            
            <!-- Next Appointment Card -->
            <div class="lg:col-span-1 flex flex-col">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Prochain rendez-vous</h2>
                
                <div v-if="nextAppointment" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex-1 flex flex-col relative">
                    <!-- Map/Header Area -->
                    <div class="h-32 bg-blue-50 relative flex items-center justify-center">
                        <!-- Decorative simplified map background -->
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 16px 16px;"></div>
                        <!-- Location Pin -->
                        <div class="w-16 h-16 bg-[#0f52ba] rounded-full flex flex-col items-center justify-center text-white z-10 shadow-lg relative transform -mt-4">
                            <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                            <div class="h-2 w-4 bg-white/20 rounded-full mb-1"></div>
                            <div class="h-2 w-4 bg-white/20 rounded-full"></div>
                        </div>
                        <div class="absolute top-4 right-4 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-md uppercase tracking-wide">
                            ConfirmÃ©
                        </div>
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ nextAppointment.donation_center?.name || 'Centre de don' }}</h3>
                        <p class="text-sm text-gray-500 mb-6 flex items-start gap-1">
                            <svg class="w-4 h-4 text-gray-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ nextAppointment.donation_center?.address }}, {{ nextAppointment.donation_center?.city }}
                        </p>
                        
                        <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-xl mb-6">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Date</p>
                                <p class="font-bold text-gray-900">{{ formatDate(nextAppointment.appointment_date) }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Heure</p>
                                <p class="font-bold text-gray-900">{{ nextAppointment.appointment_time?.substring(0, 5) }}</p>
                            </div>
                            <div class="col-span-2 mt-2 flex flex-col items-center justify-center bg-white p-4 rounded-xl border-2 border-dashed border-gray-200">
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Votre QR Code</p>
                                <img v-if="nextAppointment.qr_code_path" :src="'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + nextAppointment.qr_code_path" alt="QR Code" class="w-32 h-32 rounded-lg">
                                <p v-else class="text-sm text-gray-400 italic">QR Code indisponible.</p>
                                <p class="mt-3 font-mono text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded">{{ nextAppointment.qr_code_path ? nextAppointment.qr_code_path : 'N/A' }}</p>
                            </div>
                            
                            <!-- Guide Hospitalier -->
                            <div class="col-span-2 mt-4 bg-red-50 p-5 rounded-xl border border-red-100">
                                <h4 class="font-bold text-red-800 text-sm mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Comment ça va se passer à l'hôpital ?
                                </h4>
                                <ol class="text-sm text-gray-700 space-y-3 list-decimal list-inside pl-2">
                                    <li><strong class="text-gray-900">Accueil :</strong> Présentez votre QR Code à l'accueil pour être rapidement identifié.</li>
                                    <li><strong class="text-gray-900">Entretien :</strong> Un infirmier vÃ©rifiera vos constantes (tension, hÃ©moglobine) rapidement.</li>
                                    <li><strong class="text-gray-900">Le Don :</strong> Le prÃ©lÃ¨vement dure environ 10 minutes. C'est indolore et sÃ©curisÃ©.</li>
                                    <li><strong class="text-gray-900">Collation :</strong> Reposez-vous quelques minutes avec des rafraÃ®chissements fournis par l'hÃ´pital !</li>
                                </ol>
                            </div>
                        </div>

                        <button @click="cancelAppointment(nextAppointment.id)" class="mt-auto w-full py-2.5 px-4 bg-white border border-red-200 text-red-600 font-bold rounded-xl hover:bg-red-50 transition-colors flex justify-center items-center gap-2 text-sm">
                            Annuler ce RDV
                        </button>
                    </div>
                </div>

                <div v-else class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex-1 flex flex-col items-center justify-center text-center">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-gray-500 font-medium mb-4">Vous n'avez aucun rendez-vous de prÃ©vu.</p>
                    <button @click="isAppointmentModalOpen = true" class="text-red-600 font-bold text-sm hover:underline">Planifier un don</button>
                </div>
            </div>
            <!-- Guide included inside next appointment card below -->
        </div>

      </div>
    </main>
    <BookAppointmentModal :show="isAppointmentModalOpen" @close="isAppointmentModalOpen = false" @appointment-created="handleAppointmentCreated" />
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import BookAppointmentModal from '@/components/donor/BookAppointmentModal.vue';

// Logic simulating standard behavior for Donateur
export default {
    components: {
        BookAppointmentModal
    },
    data() {
        return {
            user: { name: 'Jean Dupont' },
            stats: {
                total_donations: 5,
                blood_type: 'O+'
            },
            recentDonations: [
                { date: '12 Jui. 2023', ago: 'il y a 3 mois', location: 'EFS Cabine Mobile', type: 'Sang total', status: 'ComplÃ©tÃ©' },
                { date: '28 Avr. 2023', ago: 'il y a 6 mois', location: 'HÃ´pital Necker', type: 'Plasma', status: 'ComplÃ©tÃ©' },
                { date: '15 Jan. 2023', ago: 'il y a 9 mois', location: 'Centre de Don Paris', type: 'Sang total', status: 'ComplÃ©tÃ©' }
            ],
            isAppointmentModalOpen: false,
            appointments: [],
            isLoadingAppointments: false
        }
    },
    computed: {
        nextAppointment() {
            return this.appointments.find(a => a.status === 'scheduled');
        }
    },
    mounted() {
        const userData = localStorage.getItem('user');
        if (userData) {
            try {
                this.user = JSON.parse(userData);
            } catch(e) {
                console.error("User parsing error", e);
            }
        }
        this.fetchAppointments();
    },
    methods: {
        async fetchAppointments() {
            try {
                const token = localStorage.getItem('access_token');
                if(!token) return;
                const response = await axios.get('http://127.0.0.1:8000/api/appointments/my', {
                    headers: { 'Authorization': `Bearer ${token}` }
                });
                this.appointments = response.data;
            } catch (error) {
                console.error('Failed to fetch appointments:', error);
            }
        },
        handleAppointmentCreated() {
            this.fetchAppointments();
        },
        async cancelAppointment(id) {
            const confirmed = await Swal.fire({
                title: 'ÃŠtes-vous sÃ»r ?',
                text: "Voulez-vous vraiment annuler ce rendez-vous ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Oui, annuler',
                cancelButtonText: 'Non, garder'
            });

            if(confirmed.isConfirmed) {
                try {
                    const token = localStorage.getItem('access_token');
                    await axios.put(`http://127.0.0.1:8000/api/appointments/${id}/cancel`, {}, {
                        headers: { 'Authorization': `Bearer ${token}` }
                    });
                    
                    Swal.fire('AnnulÃ©', 'Votre rendez-vous a Ã©tÃ© annulÃ©.', 'success');
                    this.fetchAppointments();
                } catch(error) {
                    Swal.fire('Erreur', 'Impossible d\'annuler le rendez-vous.', 'error');
                }
            }
        },
        formatDate(dateStr) {
            if (!dateStr) return '';
            const options = { day: 'numeric', month: 'short', year: 'numeric' };
            return new Date(dateStr).toLocaleDateString('fr-FR', options);
        },
        logout() {
            localStorage.removeItem('access_token');
            localStorage.removeItem('user');
            this.$router.push('/login');
        }
    }
}
</script>

<style scoped>
/* Standard tailwind handles everything */
</style>

