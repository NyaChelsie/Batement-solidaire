<template>
  <div class="p-6 md:p-8 lg:p-10 max-w-7xl mx-auto w-full">
    <!-- Welcome Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Bonjour, {{ user?.name?.split(' ')[0] || 'Jean' }} !</h1>
        <p class="text-gray-500 mt-1 font-medium">Votre gÃ©nÃ©rositÃ© sauve des vies. Voici l'Ã©tat de vos contributions.</p>
      </div>
      <button @click="isAppointmentModalOpen = true" class="flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold shadow-md shadow-red-600/20 transition-all active:scale-[0.98]">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Prendre rendez-vous
      </button>
    </div>

    <!-- Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Total Donations -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center text-red-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total</span>
            </div>
            <div class="mt-auto">
                <p class="text-sm font-medium text-gray-500 mb-1">Total des dons</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-black text-gray-900">{{ stats.total_donations || 0 }}</span>
                    <span class="text-sm font-bold text-gray-400">dons</span>
                </div>
            </div>
        </div>

        <!-- Lives Saved Impact -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Impact</span>
            </div>
            <div class="mt-auto">
                <p class="text-sm font-medium text-gray-500 mb-1">Vies sauvÃ©es</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-black text-gray-900">{{ (stats.total_donations || 0) * 3 }}</span>
                    <span class="text-sm font-bold text-gray-400">personnes</span>
                </div>
            </div>
        </div>

        <!-- Next Possible Donation -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Statut</span>
            </div>
            <div class="mt-auto">
                <p class="text-sm font-medium text-gray-500 mb-1">Prochain don possible</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-black text-gray-900">Maintenant</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Next Appointment Card -->
        <div class="lg:col-span-1 flex flex-col">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Prochain rendez-vous</h2>
            
            <div v-if="nextAppointment" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex-1 flex flex-col relative">
                <!-- Map/Header Area -->
                <div class="h-32 bg-blue-50 relative flex items-center justify-center">
                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 16px 16px;"></div>
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
                        {{ nextAppointment.donation_center?.address || 'Adresse' }}, {{ nextAppointment.donation_center?.city || 'Ville' }}
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

        <!-- Recent History & Promo -->
        <div class="lg:col-span-2 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-900">Historique rÃ©cent</h2>
                <router-link to="/donor-dashboard/history" class="text-sm font-bold text-red-600 hover:text-red-700 transition">Voir tout</router-link>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6 flex-1">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-100">
                                <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Date</th>
                                <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Lieu</th>
                                <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="donation in recentDonations.slice(0, 3)" :key="donation.id" class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <p class="font-bold text-gray-900 text-sm">{{ formatDate(donation.appointment_date) }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="font-bold text-gray-800 text-sm">{{ donation.donation_center?.name || 'IndÃ©fini' }}</p>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" 
                                          :class="donation.status === 'completed' ? 'bg-green-100 text-green-800' : (donation.status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')">
                                        {{ donation.status }}
                                    </span>
                                </td>
                            </tr>
                            <tr v-if="recentDonations.length === 0">
                                <td colspan="3" class="py-6 px-6 text-center text-gray-500">Aucun historique disponible.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Promo Banner -->
            <div class="bg-red-600 rounded-2xl p-6 text-white relative overflow-hidden shadow-md shadow-red-600/20">
                <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-1/4 translate-y-1/4">
                    <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="relative z-10 sm:w-2/3">
                    <h3 class="text-xl font-bold mb-2">Partagez votre pouvoir</h3>
                    <p class="text-sm text-red-100 mb-4 font-medium leading-relaxed">Parrainez un ami pour son premier Batement Solidaire et recevez un badge exclusif dans l'application.</p>
                    <button class="bg-white text-red-600 font-bold py-2.5 px-6 rounded-xl text-sm shadow-sm hover:bg-gray-50 transition-colors active:scale-95 inline-flex items-center gap-2">
                        Inviter un proche
                    </button>
                </div>
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
    components: {
        BookAppointmentModal
    },
    data() {
        return {
            user: null,
            stats: {
                total_donations: 0,
            },
            isAppointmentModalOpen: false,
            appointments: [],
            isLoadingAppointments: false
        }
    },
    computed: {
        nextAppointment() {
            return this.appointments.find(a => a.status === 'scheduled');
        },
        recentDonations() {
            return this.appointments.filter(a => a.status === 'completed');
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
                this.stats.total_donations = this.appointments.filter(a => a.status === 'completed').length;
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
        }
    }
}
</script>

