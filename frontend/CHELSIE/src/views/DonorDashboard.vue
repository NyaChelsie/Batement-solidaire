<template>
  <div class="p-6 md:p-10 lg:p-12 max-w-7xl mx-auto w-full">
    
    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6 animate-fade-up">
      <div>
        <p class="text-sm font-black text-blood-600 uppercase tracking-widest mb-1">Dossier Patient</p>
        <h1 class="text-4xl md:text-5xl font-black text-medic-900 tracking-tight">Bonjour, {{ user.name?.split(' ')[0] || 'Jean' }}.</h1>
        <p class="text-medic-800 mt-2 font-medium text-lg">Prêt à sauver des vies aujourd'hui ?</p>
      </div>
      <button @click="isAppointmentModalOpen = true" class="flex items-center gap-3 px-8 py-4 bg-blood-600 hover:bg-blood-700 active:scale-95 text-white rounded-2xl font-bold shadow-xl shadow-blood-600/20 transition-all cursor-pointer">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
        Signaler ma disponibilité
      </button>
    </div>

    <!-- Impact Cards (Apple Health Style Widgets) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 animate-fade-up" style="animation-delay: 0.1s;">
        <!-- Card 1: Vies Sauvées -->
        <div class="bg-gradient-to-br from-blood-500 to-blood-700 rounded-[2rem] p-8 text-white shadow-xl shadow-blood-600/20 relative overflow-hidden group">
            <div class="absolute -right-8 -top-8 opacity-10 transform group-hover:scale-110 transition-transform duration-700">
                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
            <div class="relative z-10 flex flex-col h-full justify-between">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-md mb-8">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-3xl font-black mb-1">Impact Vital</h3>
                    <p class="font-bold opacity-90 text-sm tracking-widest uppercase mb-4">{{ stats.total_donations * 3 }} vies sauvées</p>
                    <div class="inline-block bg-white text-blood-700 font-bold text-xs uppercase tracking-widest px-4 py-2 rounded-full shadow-sm">
                        Poche Transfusée ✔
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Card 2: Niveau HGD -->
        <div class="md:col-span-2 bg-white rounded-[2rem] p-8 border border-medic-100 shadow-[0_4px_24px_rgba(0,0,0,0.02)] flex flex-col sm:flex-row items-center gap-8 text-center sm:text-left">
            <div class="w-24 h-24 bg-medic-50 rounded-full flex items-center justify-center text-medic-900 border-4 border-blood-50 shadow-inner flex-shrink-0 relative">
                 <span class="text-4xl font-black">{{ stats.total_donations || 1 }}</span>
                 <div class="absolute -right-2 -bottom-2 w-8 h-8 bg-emerald-500 rounded-full border-4 border-white flex items-center justify-center text-white">
                     <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                 </div>
            </div>
            <div>
                 <p class="text-medic-400 font-black uppercase tracking-widest text-xs mb-2">Statut Donneur</p>
                 <h3 class="text-3xl font-black text-medic-900 leading-tight">Héros Quotidien</h3>
                 <p class="text-medic-800 mt-2 text-base font-medium">Votre engagement auprès de l'Hôpital Général permet de maintenir un stock de sécurité indispensable. L'Afrique compte sur vous.</p>
            </div>
        </div>
    </div>

    <!-- Active Protocol (Appointment) -->
    <div class="animate-fade-up" style="animation-delay: 0.2s;">
        <h2 class="text-2xl font-black text-medic-900 mb-6 flex items-center gap-3">
             <svg class="w-6 h-6 text-blood-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
             Protocole Actif
        </h2>
        
        <div v-if="nextAppointment" class="bg-white rounded-[2rem] shadow-[0_4px_24px_rgba(0,0,0,0.03)] border border-medic-100 overflow-hidden flex flex-col lg:flex-row">
            
            <!-- Context Area -->
            <div class="lg:w-2/5 bg-medic-50 p-8 border-b lg:border-b-0 lg:border-r border-medic-100 flex flex-col">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-blood-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <span class="bg-emerald-100 text-emerald-700 text-xs font-black px-3 py-1.5 rounded-lg uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Confirmé
                    </span>
                </div>
                
                <h3 class="text-2xl font-black text-medic-900 mb-2">{{ nextAppointment.donation_center?.name || 'Hôpital Général de Douala' }}</h3>
                <p class="text-medic-800 font-medium mb-auto flex items-start gap-2">
                    <svg class="w-5 h-5 text-medic-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    {{ nextAppointment.donation_center?.address }}, {{ nextAppointment.donation_center?.city }}
                </p>
                
                <div class="mt-8 pt-6 border-t border-medic-200">
                    <button @click="cancelAppointment(nextAppointment.id)" class="text-medic-500 hover:text-blood-600 font-bold text-sm transition-colors flex items-center gap-2">
                        Annuler ce protocole
                    </button>
                </div>
            </div>
            
            <!-- Details & QR Area -->
            <div class="lg:w-3/5 p-8 flex flex-col sm:flex-row gap-8">
                <!-- Data -->
                <div class="flex-1 space-y-6">
                    <div>
                        <p class="text-xs font-black text-medic-400 uppercase tracking-widest mb-1.5">Date Prévue</p>
                        <p class="text-2xl font-black text-medic-900">{{ formatDate(nextAppointment.appointment_date) }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black text-medic-400 uppercase tracking-widest mb-1.5">Heure (Créneau)</p>
                        <p class="text-2xl font-black text-medic-900">{{ nextAppointment.appointment_time?.substring(0, 5) }}</p>
                    </div>
                    
                    <div class="bg-blood-50 p-5 rounded-2xl border border-blood-100 mt-4">
                        <h4 class="font-black text-blood-800 text-sm mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Directives Cliniques
                        </h4>
                        <ul class="text-sm text-blood-900/80 font-medium space-y-1.5">
                            <li>• Présentez votre Pass QR à l'accueil.</li>
                            <li>• Mangez légèrement avant de venir.</li>
                            <li>• Hydratez-vous abondamment.</li>
                        </ul>
                    </div>
                </div>

                <!-- QR Pass -->
                <div class="flex flex-col items-center justify-center p-6 bg-white rounded-3xl border-2 border-dashed border-medic-200 w-full sm:w-auto">
                    <p class="text-[10px] font-black text-medic-400 uppercase tracking-widest mb-4">Pass Patient (Scanner)</p>
                    <div class="p-2 bg-white rounded-xl shadow-sm border border-medic-100">
                        <img v-if="nextAppointment.qr_code_path" :src="'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + nextAppointment.qr_code_path" alt="QR Code" class="w-32 h-32 rounded-lg">
                        <div v-else class="w-32 h-32 bg-medic-50 rounded-lg flex items-center justify-center">
                            <span class="text-xs text-medic-400 font-bold">N/A</span>
                        </div>
                    </div>
                    <p class="mt-4 font-black text-lg text-medic-900 tracking-widest">{{ nextAppointment.qr_code_path ? nextAppointment.qr_code_path : 'EN ATTENTE' }}</p>
                </div>
            </div>

        </div>

        <div v-else class="bg-white rounded-[2rem] border border-medic-100 p-12 flex flex-col items-center justify-center text-center shadow-sm">
            <div class="w-20 h-20 bg-medic-50 rounded-full flex items-center justify-center text-medic-400 mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-xl font-black text-medic-900 mb-2">Aucun protocole médical programmé</h3>
            <p class="text-medic-800 font-medium mb-8 max-w-sm">Le centre de transfusion a besoin de votre groupe sanguin. Signalez votre disponibilité.</p>
            <button @click="isAppointmentModalOpen = true" class="px-8 py-3 bg-blood-50 text-blood-700 font-bold rounded-xl hover:bg-blood-100 transition-colors">
                Initier un don
            </button>
        </div>
    </div>

    <!-- Booking Modal -->
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
            user: { name: 'Jean Dupont' },
            stats: {
                total_donations: 5,
                blood_type: 'O+'
            },
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
                title: 'Interrompre le protocole ?',
                text: "Êtes-vous sûr de vouloir annuler ce rendez-vous médical ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#9ca3af',
                confirmButtonText: 'Oui, annuler',
                cancelButtonText: 'Non, conserver'
            });

            if(confirmed.isConfirmed) {
                try {
                    const token = localStorage.getItem('access_token');
                    await axios.put(`http://127.0.0.1:8000/api/appointments/${id}/cancel`, {}, {
                        headers: { 'Authorization': `Bearer ${token}` }
                    });
                    
                    Swal.fire('Annulé', 'Votre rendez-vous a été interrompu.', 'success');
                    this.fetchAppointments();
                } catch(error) {
                    Swal.fire('Erreur', 'Impossible de contacter le serveur de l\'Hôpital.', 'error');
                }
            }
        },
        formatDate(dateStr) {
            if (!dateStr) return '';
            const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            const date = new Date(dateStr).toLocaleDateString('fr-FR', options);
            return date.charAt(0).toUpperCase() + date.slice(1);
        }
    }
}
</script>

<style scoped>
/* Focus & hover states already managed with utility classes */
</style>
