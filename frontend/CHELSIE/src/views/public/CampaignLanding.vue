<template>
  <div class="min-h-screen bg-gray-50 font-sans text-gray-900 pb-20" :class="{'bg-gray-900': step === 3}">
    
    <!-- Loading State -->
    <div v-if="isLoading" class="flex flex-col items-center justify-center min-h-screen">
        <svg class="animate-spin h-10 w-10 text-red-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
        <p class="text-gray-500 font-medium">Chargement de l'urgence...</p>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="flex flex-col items-center justify-center min-h-screen px-4">
        <div class="bg-red-50 border border-red-200 text-red-700 p-6 rounded-2xl text-center max-w-md w-full">
            <p class="font-bold text-lg mb-2">Impossible de charger la campagne</p>
            <p>{{ error }}</p>
            <button @click="$router.push('/')" class="mt-4 px-6 py-2 bg-red-600 text-white rounded-xl font-bold">Retour à l'accueil</button>
        </div>
    </div>

    <div v-else>
        <!-- STEP 1: Landing Page Choc -->
        <div v-if="step === 1" class="animate-fade-in relative min-h-screen flex flex-col items-center justify-center px-4 overflow-hidden">
            <!-- Bandeau Urgence -->
            <div class="absolute top-0 w-full bg-red-700 text-white text-center py-3 font-black tracking-[0.2em] animate-pulse">
                URGENCE VITALE - HÔPITAL GÉNÉRAL DE DOUALA
            </div>
            
            <div class="max-w-2xl w-full mx-auto text-center mt-16 z-10">
                <div class="mb-8 rounded-3xl overflow-hidden shadow-2xl relative border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1615461066841-6116e61058f4?auto=format&fit=crop&q=80&w=1200" alt="HGD Urgence" class="w-full h-64 sm:h-80 object-cover brightness-75">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6">
                        <span class="bg-red-600 text-white text-xs font-black px-3 py-1 rounded w-max mb-2 uppercase">{{ campaign.urgency_level }}</span>
                        <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight drop-shadow-md">
                            {{ campaign.title }}
                        </h1>
                    </div>
                </div>

                <p class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">
                    L'Hôpital Général a besoin de vous aujourd'hui.
                </p>
                <p class="text-gray-600 font-medium text-lg mb-10">15 minutes suffisent pour sauver 3 vies.</p>

                <button @click="nextStep" class="w-full bg-red-600 hover:bg-red-700 text-white text-2xl font-black rounded-2xl py-6 shadow-[0_0_40px_rgba(220,38,38,0.4)] transition transform hover:scale-105 select-none active:scale-95">
                    Je viens donner mon sang
                </button>
            </div>
            
            <!-- Background abstraction -->
            <div class="absolute inset-0 bg-red-50 -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-red-100 to-transparent opacity-50"></div>
        </div>

        <!-- STEP 2: Formulaire Flash (Guest Checkout) -->
        <div v-if="step === 2" class="animate-fade-in max-w-2xl mx-auto px-4 pt-8">
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-10 mb-8 relative">
                
                <button @click="step = 1" class="absolute top-6 left-6 w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </button>

                <h2 class="text-3xl font-black text-gray-900 mb-8 pt-10 text-center">Fast-Track Urgence</h2>

                <div class="space-y-8">
                    <!-- Nom -->
                    <div>
                        <label class="block text-gray-500 font-bold mb-2 uppercase text-xs tracking-wider">Nom Complet</label>
                        <input v-model="guest.name" type="text" class="w-full bg-gray-50 border-2 border-gray-200 text-gray-900 rounded-2xl p-4 font-bold text-xl focus:ring-0 focus:border-red-500 transition" placeholder="Votre nom sur votre CNI" required>
                    </div>

                    <!-- Téléphone (Numpad forcé) -->
                    <div>
                        <label class="block text-gray-500 font-bold mb-2 uppercase text-xs tracking-wider">Téléphone</label>
                        <input v-model="guest.phone" type="tel" inputmode="numeric" pattern="[0-9]*" class="w-full bg-gray-50 border-2 border-gray-200 text-gray-900 rounded-2xl p-4 font-black text-2xl focus:ring-0 focus:border-red-500 transition tracking-widest placeholder:font-normal placeholder:tracking-normal" placeholder="6..." required>
                    </div>

                    <!-- Groupe Sanguin -->
                    <div>
                        <label class="block text-gray-500 font-bold mb-2 uppercase text-xs tracking-wider">Votre Groupe Sanguin <span class="text-red-500 font-medium lowercase normal-case">(Recherche actuelle: {{ campaign.blood_types_needed?.join(', ') || 'Tous' }})</span></label>
                        <div class="grid grid-cols-4 gap-2">
                            <button v-for="bt in bloodTypes" :key="bt" @click="guest.blood_type = bt" type="button"
                                class="py-3 sm:py-4 rounded-xl font-black text-lg transition border-2"
                                :class="guest.blood_type === bt ? 'bg-red-600 text-white border-red-600 shadow-md transform scale-105' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'">
                                {{ bt }}
                            </button>
                        </div>
                    </div>

                    <!-- Centre -->
                    <div>
                        <label class="block text-gray-500 font-bold mb-2 uppercase text-xs tracking-wider">Lieu du don</label>
                        <select v-model="guest.donation_center_id" class="w-full bg-gray-50 border-2 border-gray-200 text-gray-900 rounded-2xl p-4 font-bold text-xl focus:ring-0 focus:border-red-500 transition appearance-none" required>
                            <option v-for="center in centers" :key="center.id" :value="center.id">
                                {{ center.name }} ({{ center.city }})
                            </option>
                        </select>
                    </div>

                    <!-- Créneau -->
                    <div>
                        <label class="block text-gray-500 font-bold mb-2 uppercase text-xs tracking-wider">Disponibilité à {{ selectedCenterName }}</label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <button v-for="slot in ['Maintenant', 'Ce matin', 'Cet après-midi']" :key="slot" @click="guest.time_slot = slot" type="button"
                                class="py-5 rounded-2xl font-black text-xl transition border-2"
                                :class="guest.time_slot === slot ? 'bg-red-50 text-red-600 border-red-500 shadow-inner' : 'bg-white text-gray-700 border-gray-200 hover:border-gray-300 shadow-sm hover:shadow'">
                                {{ slot }}
                                <span class="block text-xs font-bold text-gray-400 mt-1 uppercase">{{ slot === 'Maintenant' ? 'Aujourd\'hui' : 'Sans RDV Fixe' }}</span>
                            </button>
                        </div>
                    </div>

                    <button @click="submitFastTrack" :disabled="isConfirming || !isGuestFormValid" class="w-full mt-6 bg-red-600 hover:bg-red-700 disabled:opacity-50 disabled:cursor-not-allowed text-white text-2xl font-black rounded-2xl py-6 shadow-xl transition transform hover:scale-[1.02] flex items-center justify-center gap-3 active:scale-95">
                         <svg v-if="isConfirming" class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Générer mon Pass Urgence
                    </button>
                </div>
            </div>
            
            <p class="text-center text-sm font-bold text-gray-400 pb-10">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Vos données sont sécurisées et destinées uniquement à des fins médicales.
            </p>
        </div>

        <!-- STEP 3: Pass (QR Code Sombre) -->
        <div v-if="step === 3" class="animate-fade-in min-h-screen text-white flex flex-col items-center justify-center px-4 relative pb-20">
            <!-- Background effects -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-gray-800 to-gray-900 pointer-events-none"></div>
            
            <div class="text-center mb-8 relative z-10">
                <div class="inline-flex w-16 h-16 rounded-full bg-green-500/20 items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-3xl font-black mb-1 text-white">Rendez-vous Confirmé</h2>
                <p class="text-gray-400 font-bold">{{ selectedCenterName }} vous attend !</p>
            </div>

            <!-- Pass Card -->
            <div class="bg-white rounded-3xl p-8 relative z-10 w-full max-w-sm shadow-[0_0_50px_rgba(255,255,255,0.1)] text-center flex flex-col items-center transform transition-all duration-700 rotate-0">
                
                <h3 class="text-gray-900 font-black text-2xl mb-1 capitalize">{{ guest.name }}</h3>
                <p class="text-red-600 font-bold mb-6 text-sm uppercase tracking-widest">Pass Urgence</p>

                <!-- QR CODE HUGE -->
                <div class="bg-gray-100 p-2 rounded-2xl w-full aspect-square flex items-center justify-center mb-6 border border-gray-200">
                    <img :src="'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' + qrData" alt="QR Code" class="w-full h-full object-contain rounded-xl mix-blend-multiply">
                </div>

                <!-- ALPHANUMERIC CODE -->
                <div class="w-full bg-gray-900 text-white py-4 rounded-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-1 opacity-20">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                    </div>
                    <p class="text-[0.65rem] uppercase tracking-widest text-gray-400 font-bold mb-1">Code Médical</p>
                    <p class="text-4xl font-black tracking-widest">{{ shortCode || 'HGD-O-000' }}</p>
                </div>
                
                <p class="mt-6 text-gray-500 font-bold text-sm">
                    Présentez cet écran à l'accueil<br>de {{ selectedCenterName }}.
                </p>
            </div>
            
            <button @click="$router.push('/')" class="mt-12 text-gray-400 font-bold hover:text-white transition relative z-10">Retour à l'accueil</button>
        </div>

    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            isLoading: true,
            error: null,
            step: 1,
            campaign: null,
            guest: {
                name: '',
                phone: '',
                blood_type: '',
                time_slot: 'Maintenant',
                donation_center_id: ''
            },
            centers: [],
            bloodTypes: ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-', 'Inconnu'],
            isConfirming: false,
            qrData: '',
            shortCode: ''
        }
    },
    computed: {
        isGuestFormValid() {
            return this.guest.name.trim().length > 2 && 
                   this.guest.phone.replace(/[^0-9]/g, '').length >= 9 && 
                   this.guest.blood_type !== '' &&
                   this.guest.donation_center_id !== '';
        },
        selectedCenterName() {
            const center = this.centers.find(c => c.id === this.guest.donation_center_id);
            return center ? center.name : "L'Hôpital";
        }
    },
    mounted() {
        this.fetchCampaignDetails();
        this.fetchCenters();
    },
    methods: {
        async fetchCenters() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/public/centers');
                this.centers = response.data;
                if (this.centers.length > 0) {
                    this.guest.donation_center_id = this.centers[0].id;
                }
            } catch (err) {
                console.error("Erreur de chargement des centres", err);
            }
        },
        async fetchCampaignDetails() {
            try {
                const slug = this.$route.params.slug;
                const response = await axios.get(`http://127.0.0.1:8000/api/public/campaign/${slug}`);
                this.campaign = response.data;
                // Parse blood types logic
                if (typeof this.campaign.blood_types_needed === 'string') {
                    try {
                        this.campaign.blood_types_needed = JSON.parse(this.campaign.blood_types_needed);
                    } catch (e) {
                         this.campaign.blood_types_needed = [];
                    }
                }
                
                // Pré-sélection du groupe sanguin
                if (this.campaign.blood_types_needed && this.campaign.blood_types_needed.length > 0) {
                    this.guest.blood_type = this.campaign.blood_types_needed[0];
                }
                
                this.isLoading = false;
            } catch (err) {
                console.error(err);
                this.error = "Campagne introuvable ou inactive.";
                this.isLoading = false;
            }
        },
        nextStep() {
            this.step++;
            window.scrollTo(0, 0);
        },
        async submitFastTrack() {
            this.isConfirming = true;
            try {
                const payload = {
                    campaign_id: this.campaign.id,
                    donation_center_id: this.guest.donation_center_id,
                    guest_name: this.guest.name,
                    guest_phone: this.guest.phone,
                    guest_blood_type: this.guest.blood_type,
                    time_slot: this.guest.time_slot
                };

                const response = await axios.post('http://127.0.0.1:8000/api/public/donate', payload);

                this.qrData = response.data.qr_data;
                this.shortCode = response.data.short_code;
                
                this.isConfirming = false;
                this.nextStep(); // Goes to step 3
                
            } catch(e) {
                console.error(e);
                let msg = "Erreur lors de la confirmation.";
                if (e.response && e.response.data && e.response.data.message) {
                    msg = e.response.data.message;
                }
                alert(msg);
                this.isConfirming = false;
            }
        }
    }
}
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px) scale(0.98); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

/* Enforce strictly numerical keyboard styling where supported */
input[type=tel] {
    letter-spacing: 0.1em;
}
</style>
