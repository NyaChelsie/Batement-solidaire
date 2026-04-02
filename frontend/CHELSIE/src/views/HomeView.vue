<template>
  <div class="font-sans antialiased text-medic-900 bg-medic-50 min-h-screen overflow-x-hidden selection:bg-blood-100 selection:text-blood-900">

    <!-- REAL TIME EMERGENCY BANNER (Medical Priority) -->
    <div v-if="emergencyCampaign" @click="$router.push('/campaign/' + emergencyCampaign.slug)" 
         class="fixed top-0 left-0 w-full z-[60] bg-blood-600 text-white cursor-pointer hover:bg-blood-700 transition-colors shadow-lg shadow-blood-600/30">
        <div class="max-w-7xl mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between text-center sm:text-left gap-2 sm:gap-0">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-6 h-6 rounded-full bg-white/20 animate-heartbeat">
                    <span class="w-3 h-3 rounded-full bg-white"></span>
                </div>
                <span class="font-black text-xs uppercase tracking-widest bg-black/20 px-2 py-0.5 rounded-md">Urgence Critique</span>
                <span class="font-bold text-sm md:text-base ml-2">
                    Besoin immédiat : <span class="text-blood-200 text-lg font-black">{{ emergencyCampaign.blood_types_needed?.join(', ') || 'TOUS GROUPES' }}</span>
                </span>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-bold text-sm bg-white text-blood-700 px-4 py-1.5 rounded-full whitespace-nowrap shadow-sm">Répondre à l'appel</span>
                <svg class="w-5 h-5 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </div>
    </div>

    <!-- Navigation (Ultra Clean / Stripe Style) -->
    <nav class="hidden md:flex fixed w-full z-50 transition-all duration-300 bg-white/80 backdrop-blur-xl border-b border-medic-200" 
         :class="{'mt-[64px]': emergencyCampaign}">
        <div class="max-w-7xl mx-auto px-6 w-full">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-14 w-auto object-contain" />
                </div>
                <div class="flex space-x-8 text-sm font-semibold tracking-wide text-medic-800">
                    <a href="#about" class="hover:text-blood-600 transition-colors group relative">
                        Mission
                    </a>
                    <a href="#process" class="hover:text-blood-600 transition-colors group relative">
                        Sauver une vie
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <router-link to="/login" class="px-5 py-2.5 text-sm font-bold text-medic-800 hover:bg-medic-100 rounded-xl transition-colors">Connexion</router-link>
                    <router-link to="/inscription" class="px-6 py-2.5 bg-blood-600 text-white rounded-xl font-bold text-sm shadow-md shadow-blood-500/20 hover:bg-blood-700 hover:-translate-y-0.5 transition-all">
                        Devenir Donneur
                    </router-link>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Mobile Top Bar -->
    <div class="md:hidden fixed top-0 w-full z-50 bg-white/90 backdrop-blur-xl border-b border-medic-200 px-6 py-4 flex justify-between items-center shadow-sm"
         :class="{'mt-[90px]': emergencyCampaign}">
         <div class="flex items-center">
            <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-10 w-auto object-contain" />
        </div>
        <router-link to="/inscription" class="px-5 py-2 bg-blood-50 text-blood-700 rounded-lg text-sm font-bold">
            Rejoindre
        </router-link>
    </div>

    <!-- Hero Section (Emotional & Direct) -->
    <header class="relative pt-32 md:pt-48 pb-20 md:pb-32 overflow-hidden z-10 bg-white rounded-b-[3rem] shadow-sm">
        <div class="absolute inset-0 bg-gradient-to-b from-blood-50/50 to-white -z-10 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20">
                
                <!-- Text Content -->
                <div class="md:w-1/2 flex flex-col items-center md:items-start text-center md:text-left animate-fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 mb-8 rounded-full bg-blood-50 border border-blood-100 text-blood-700 font-bold text-xs uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-blood-600 animate-heartbeat"></span>
                        <span>Plateforme Officielle - Hôpital Général</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-black leading-[1.1] mb-6 tracking-tight text-medic-900">
                        Donnez votre sang.<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blood-600 to-blood-500">Offrez l'espoir.</span>
                    </h1>
                    
                    <p class="text-lg md:text-xl text-medic-800 mb-10 leading-relaxed font-medium max-w-lg">
                        Connectez-vous directement aux urgences hospitalières. Un acte médical simple, un impact humain immédiat.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 w-full justify-center md:justify-start">
                        <router-link to="/inscription" class="px-8 py-4 bg-blood-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-blood-600/30 hover:bg-blood-700 hover:shadow-blood-600/40 transition-all hover:-translate-y-1 text-center flex items-center justify-center gap-3">
                             S'enrôler Maintenant
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </router-link>
                    </div>
                </div>

                <!-- Hero Image (Medical Clean) -->
                <div class="md:w-1/2 relative w-full max-w-lg animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="absolute inset-0 bg-blood-100 rounded-[3rem] transform rotate-3 scale-105 -z-10 opacity-60"></div>
                    <img src="https://images.unsplash.com/photo-1615461066841-6116e61058f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Blood Donation Medical Room" class="w-full h-[500px] object-cover rounded-[3rem] shadow-2xl border border-medic-100">
                    
                    <!-- Floating Badge Apple Health Style -->
                    <div class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-xl p-6 rounded-3xl border border-medic-200 shadow-xl flex items-center gap-5">
                        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-medic-800 uppercase tracking-widest mb-1">Impact Patient</p>
                            <p class="text-2xl font-black text-medic-900 leading-none">3 Vies Sauvées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Data Trust Section (Medical Standards) -->
    <section class="py-16 md:py-24 bg-medic-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-medic-100">
                    <p class="text-4xl md:text-5xl font-black text-blood-600 mb-2 tracking-tighter">450</p>
                    <p class="text-medic-800 text-sm font-bold uppercase tracking-widest">ml par don</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-medic-100">
                    <p class="text-4xl md:text-5xl font-black text-blood-600 mb-2 tracking-tighter">10</p>
                    <p class="text-medic-800 text-sm font-bold uppercase tracking-widest">Minutes</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-medic-100 relative overflow-hidden">
                    <div class="absolute inset-0 bg-emerald-50 opacity-50"></div>
                    <div class="relative z-10">
                        <p class="text-4xl md:text-5xl font-black text-emerald-500 mb-2 tracking-tighter">1</p>
                        <p class="text-emerald-700 text-sm font-bold uppercase tracking-widest">Geste Héroïque</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-medic-100">
                    <p class="text-4xl md:text-5xl font-black text-blood-600 mb-2 tracking-tighter">10k</p>
                    <p class="text-medic-800 text-sm font-bold uppercase tracking-widest">Donneurs Actifs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Medical Focus Section -->
    <section id="about" class="py-32 bg-white rounded-t-[3rem] shadow-sm relative z-20 -mt-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-20 fade-in-up">
                <h2 class="text-4xl md:text-5xl font-black text-medic-900 mb-6 tracking-tight">Une urgence silencieuse.</h2>
                <p class="text-xl text-medic-800 font-medium leading-relaxed">Les structures chirurgicales et les services de traumatologie dépendent de vous. Aucun substitut artificiel n'existe pour le sang humain.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-medic-50 hover:bg-white p-10 rounded-[2rem] border border-medic-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-blood-600 mb-8 shadow-sm group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-medic-900 mb-4 tracking-tight">Intervention Critique</h3>
                    <p class="text-medic-800 leading-relaxed font-medium">Chaque don sécurise les opérations chirurgicales complexes et la prise en charge des traumatologies sévères.</p>
                </div>
                
                <!-- Card 2 -->
                <div class="bg-medic-50 hover:bg-white p-10 rounded-[2rem] border border-medic-100 hover:shadow-xl transition-all duration-300 group">
                     <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-blue-500 mb-8 shadow-sm group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-medic-900 mb-4 tracking-tight">Flux Continu</h3>
                    <p class="text-medic-800 leading-relaxed font-medium">Les plaquettes se conservent seulement 5 jours. Le flux de dons doit être perpétuel pour éviter la rupture de soins.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-medic-50 hover:bg-white p-10 rounded-[2rem] border border-medic-100 hover:shadow-xl transition-all duration-300 group">
                     <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-emerald-500 mb-8 shadow-sm group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-medic-900 mb-4 tracking-tight">Contrôle Médical</h3>
                    <p class="text-medic-800 leading-relaxed font-medium">Avant chaque don, un médecin réalise un bilan de santé clinique. Votre sécurité est aussi prioritaire que celle du receveur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Zero Friction Process -->
    <section id="process" class="py-32 bg-medic-900 text-white rounded-[3rem] mx-4 md:mx-10 mb-20 shadow-2xl relative z-10">
        <div class="max-w-7xl mx-auto px-6 text-center relative z-20">
            <h2 class="text-3xl md:text-5xl font-black mb-6 tracking-tight text-white">Protocole Simplifié.</h2>
            <p class="text-xl text-medic-200 font-medium mb-16 max-w-2xl mx-auto">Parcours patient optimisé pour garantir confort et sécurité en moins d'une heure.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="flex flex-col items-center bg-medic-800/80 p-8 rounded-[2rem] border border-medic-700 shadow-md">
                    <div class="w-16 h-16 rounded-full bg-blood-600 flex items-center justify-center text-2xl font-black text-white mb-6 shadow-lg shadow-blood-600/50">1</div>
                    <h4 class="font-bold text-xl mb-3 text-white">Enregistrement</h4>
                    <p class="text-sm text-medic-300 font-medium leading-relaxed">Vérification de l'identité et questionnaire médical confidentiel.</p>
                </div>
                
                <div class="flex flex-col items-center bg-medic-800/80 p-8 rounded-[2rem] border border-medic-700 shadow-md">
                     <div class="w-16 h-16 rounded-full bg-blood-600 flex items-center justify-center text-2xl font-black text-white mb-6 shadow-lg shadow-blood-600/50">2</div>
                    <h4 class="font-bold text-xl mb-3 text-white">Entretien Clinique</h4>
                    <p class="text-sm text-medic-300 font-medium leading-relaxed">Consultation avec un infirmier pour valider votre aptitude au don.</p>
                </div>

                <div class="flex flex-col items-center bg-medic-800/80 p-8 rounded-[2rem] border-2 border-blood-500 shadow-xl relative overflow-hidden">
                     <div class="absolute inset-0 bg-blood-500/10 pointer-events-none"></div>
                     <div class="w-16 h-16 rounded-full bg-blood-600 flex items-center justify-center text-2xl font-black text-white mb-6 shadow-lg shadow-blood-600/50 relative z-10">3</div>
                    <h4 class="font-bold text-xl mb-3 text-white relative z-10">Le Prélèvement</h4>
                    <p class="text-sm text-medic-200 font-medium leading-relaxed relative z-10">Acte stérile et indolore de 10 minutes sous haute surveillance.</p>
                </div>

                <div class="flex flex-col items-center bg-medic-800/80 p-8 rounded-[2rem] border border-medic-700 shadow-md">
                     <div class="w-16 h-16 rounded-full bg-emerald-500 flex items-center justify-center text-2xl font-black text-white mb-6 shadow-lg shadow-emerald-500/50">4</div>
                    <h4 class="font-bold text-xl mb-3 text-white">Repos & Collation</h4>
                    <p class="text-sm text-medic-300 font-medium leading-relaxed">15 minutes de surveillance avec un en-cas pour reprendre des forces.</p>
                </div>
            </div>
            
            <div class="mt-16 relative z-30">
                <router-link to="/inscription" class="inline-flex items-center gap-3 px-10 py-5 bg-white text-medic-900 rounded-2xl font-black text-xl hover:bg-medic-50 hover:shadow-xl transition-all hover:-translate-y-1">
                    Commencer mon parcours
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </router-link>
            </div>
        </div>
    </section>

    <!-- Footer Medical Style -->
    <footer class="pt-20 pb-24 md:pb-12 bg-white border-t border-medic-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-14 w-auto object-contain" />
                    </div>
                    <p class="text-medic-800 leading-relaxed text-sm font-medium">
                        Système d'Information Hospitalier - Gestion des Urgences Transfusionnelles.
                    </p>
                </div>
                
                <div>
                     <h4 class="font-black text-medic-900 mb-6 uppercase tracking-widest text-xs">Informations Patientes</h4>
                     <ul class="space-y-4 text-sm font-bold text-medic-800">
                         <li><a href="#about" class="hover:text-blood-600 transition">Protocole Médical</a></li>
                         <li><a href="#process" class="hover:text-blood-600 transition">Directives Cliniques</a></li>
                         <li><a href="#" class="hover:text-blood-600 transition">Contact Hôpital</a></li>
                     </ul>
                </div>

                <div>
                     <h4 class="font-black text-medic-900 mb-6 uppercase tracking-widest text-xs">Statut & RGPD</h4>
                     <ul class="space-y-4 text-sm font-bold text-medic-800">
                         <li><a href="#" class="hover:text-blood-600 transition">Confidentialité des données</a></li>
                         <li><a href="#" class="hover:text-blood-600 transition">Mentions sanitaires</a></li>
                         <li><a href="#" class="hover:text-blood-600 transition">Accessibilité (WCAG)</a></li>
                     </ul>
                </div>
            </div>
            
            <div class="border-t border-medic-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-medic-800 font-bold">
                 <p>© 2026 Hôpital Général de Douala - Battements Solidaires.</p>
                 <p class="text-blood-600">Conçu pour l'urgence. Pensé pour l'humain.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Bottom Navigation (iOS Style) -->
    <div class="md:hidden fixed bottom-0 w-full bg-white/90 backdrop-blur-xl border-t border-medic-200 z-50 pb-6 pt-3 safe-area-bottom shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
        <div class="flex justify-around items-center px-4">
            <a href="#" class="flex flex-col items-center gap-1 text-blood-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <span class="text-[10px] font-black uppercase tracking-widest mt-1">Accueil</span>
            </a>
            <router-link to="/inscription" class="relative -top-8 transition-transform active:scale-95">
                <div class="w-16 h-16 rounded-full bg-blood-600 flex items-center justify-center shadow-lg shadow-blood-600/40 border-4 border-white text-white">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                </div>
            </router-link>
            <router-link to="/login" class="flex flex-col items-center gap-1 text-medic-800 hover:text-blood-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="text-[10px] font-black uppercase tracking-widest mt-1">Dossier</span>
            </router-link>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'HomeView',
  data() {
      return {
          emergencyCampaign: null,
          pollingInterval: null
      }
  },
  mounted() {
      this.fetchEmergency();
      // Polling every 20 seconds (System resilience check)
      this.pollingInterval = setInterval(this.fetchEmergency, 20000);
  },
  beforeUnmount() {
      if (this.pollingInterval) {
          clearInterval(this.pollingInterval);
      }
  },
  methods: {
      async fetchEmergency() {
          try {
              const response = await axios.get('http://127.0.0.1:8000/api/public/campaigns/active-emergency');
              this.emergencyCampaign = response.data;
          } catch (error) {
              if (error.response && error.response.status === 404) {
                 this.emergencyCampaign = null;
              } else {
                 console.error('[HGD System] Erreur de récupération des urgences', error);
              }
          }
      }
  }
}
</script>

<style scoped>
/* Smooth medical style transitions */
html { scroll-behavior: smooth; }
.safe-area-bottom { padding-bottom: env(safe-area-inset-bottom, 24px); }
</style>
