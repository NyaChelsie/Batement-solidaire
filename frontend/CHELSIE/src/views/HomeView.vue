<template>
<<<<<<< HEAD
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
=======
  <div class="font-sans antialiased text-gray-800 bg-white min-h-screen overflow-x-hidden relative selection:bg-red-100 selection:text-red-900">

    <!-- Desktop Navbar -->
    <nav class="hidden md:flex fixed w-full z-50 transition-all duration-300 bg-white/90 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 w-full">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                     <!-- Logo -->
                    <div class="w-10 h-10 rounded-xl bg-red-600 flex items-center justify-center shadow-lg shadow-red-600/20">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-red-600">Batement Solidaire</span>
                </div>
                <div class="flex space-x-10 text-sm font-bold tracking-wide text-gray-600">
                    <router-link to="/" class="hover:text-red-600 transition-colors relative group">
                        Accueil
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 transition-all group-hover:w-full"></span>
                    </router-link>
                    <a href="#about" class="hover:text-red-600 transition-colors relative group">
                        Pourquoi donner ?
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#process" class="hover:text-red-600 transition-colors relative group">
                        Le processus
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 transition-all group-hover:w-full"></span>
                    </a>
                    <router-link to="/impact" class="hover:text-red-600 transition-colors relative group">
                        TÃ©moignages
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 transition-all group-hover:w-full"></span>
                    </router-link>
                </div>
                <div class="flex items-center gap-4">
                    <router-link to="/login" class="px-5 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-50 rounded-xl transition-colors">Connexion</router-link>
                    <router-link to="/inscription" class="px-7 py-2.5 bg-red-600 text-white rounded-xl font-bold text-sm shadow-md shadow-red-600/20 hover:bg-red-700 hover:-translate-y-0.5 transition-all duration-300">
                        S'inscrire
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                    </router-link>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Mobile Top Bar -->
<<<<<<< HEAD
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
=======
    <div class="md:hidden fixed top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 px-6 py-4 flex justify-between items-center bg-white shadow-sm">
         <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-red-600 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            </div>
            <span class="text-lg font-bold text-red-600">Batement Solidaire</span>
        </div>
        <router-link to="/inscription" class="px-4 py-2 bg-red-50 text-red-700 rounded-lg text-xs font-bold">
            S'inscrire
        </router-link>
    </div>

    <!-- Hero Section -->
    <header class="relative pt-32 md:pt-48 pb-20 md:pb-32 overflow-hidden z-10">
        <!-- Abstract red shape background -->
        <div class="absolute top-0 right-0 -z-10 w-full h-full overflow-hidden opacity-5 pointer-events-none">
            <svg viewBox="0 0 100 100" preserveAspectRatio="none" class="absolute top-0 right-0 w-full h-full text-red-600" fill="currentColor">
                <path d="M100 0H0v100h100V0zm-50 85c-19.33 0-35-15.67-35-35s15.67-35 35-35 35 15.67 35 35-15.67 35-35 35z" />
            </svg>
        </div>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960

        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20">
                
                <!-- Text Content -->
<<<<<<< HEAD
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
=======
                <div class="md:w-1/2 flex flex-col items-center md:items-start text-center md:text-left fade-in-up md:pr-10">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 mb-6 rounded-full bg-red-50 text-red-600 font-bold text-xs uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                        <span>Urgence : Groupe O- demandÃ©</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 tracking-tight text-gray-900">
                        Votre sang peut <br>
                        <span class="text-red-600">sauver des vies.</span>
                    </h1>
                    
                    <p class="text-lg md:text-xl text-gray-600 mb-10 leading-relaxed font-medium">
                        Rejoignez notre rÃ©seau de donneurs solidaires. Une heure de votre temps, un geste simple, trois vies sauvÃ©es.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 w-full justify-center md:justify-start">
                        <router-link to="/inscription" class="px-8 py-4 bg-red-600 text-white rounded-xl font-bold text-lg shadow-lg shadow-red-600/30 hover:bg-red-700 hover:shadow-red-600/40 transition-all hover:-translate-y-0.5 text-center flex items-center justify-center gap-2">
                             Je donne mon sang
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </router-link>
                        <a href="#about" class="px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-bold text-lg hover:border-gray-300 hover:bg-gray-50 transition-all text-center">
                             En savoir plus
                        </a>
                    </div>
                    
                    <div class="mt-12 flex items-center gap-4 text-sm font-medium text-gray-500">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 border-2 border-white rounded-full object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="">
                            <img class="w-10 h-10 border-2 border-white rounded-full object-cover" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="">
                            <img class="w-10 h-10 border-2 border-white rounded-full object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="">
                        </div>
                        <p>Rejoignez plus de <span class="font-bold text-gray-900">10 000</span> donneurs actifs.</p>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="md:w-1/2 relative w-full max-w-lg fade-in-up" style="animation-delay: 0.2s;">
                    <div class="absolute inset-0 bg-red-100 rounded-3xl transform rotate-3 scale-105 -z-10 opacity-50"></div>
                    <img src="https://images.unsplash.com/photo-1615461066841-6116e61058f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Blood Donation" class="w-full h-[500px] object-cover rounded-3xl shadow-xl border border-gray-100">
                    
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-5 rounded-2xl border border-gray-100 shadow-xl flex items-center gap-4 animate-float">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Impact direct</p>
                            <p class="text-xl font-black text-gray-900">3 Vies SauvÃ©es</p>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<<<<<<< HEAD
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
=======
    <!-- Info/Stats Section -->
    <section class="py-16 bg-red-600 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-red-500/50">
                <div class="px-4">
                    <p class="text-4xl md:text-5xl font-black mb-2">450</p>
                    <p class="text-red-200 text-sm font-medium">ml par don</p>
                </div>
                <div class="px-4">
                    <p class="text-4xl md:text-5xl font-black mb-2">10</p>
                    <p class="text-red-200 text-sm font-medium">Minutes de prÃ©lÃ¨vement</p>
                </div>
                <div class="px-4">
                    <p class="text-4xl md:text-5xl font-black mb-2">3</p>
                    <p class="text-red-200 text-sm font-medium">Vies sauvÃ©es en moyenne</p>
                </div>
                <div class="px-4">
                    <p class="text-4xl md:text-5xl font-black mb-2">10k+</p>
                    <p class="text-red-200 text-sm font-medium">Donneurs inscrits</p>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                </div>
            </div>
        </div>
    </section>

<<<<<<< HEAD
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
=======
    <!-- Why Donate Section -->
    <section id="about" class="py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">Pourquoi donner son sang ?</h2>
                <p class="text-lg text-gray-600 font-medium leading-relaxed">Le sang ne peut pas Ãªtre fabriquÃ© artificiellement. Les hÃ´pitaux dÃ©pendent entiÃ¨rement de la gÃ©nÃ©rositÃ© des donneurs volontaires pour soigner les patients.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                <!-- Reason 1 -->
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-red-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Sauver des vies</h3>
                    <p class="text-gray-600 leading-relaxed">Chaque don aide les victimes d'accidents, les patients en chirurgie, et ceux souffrant de maladies chroniques comme la drÃ©panocytose.</p>
                </div>
                
                <!-- Reason 2 -->
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                     <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path transform="rotate(180 12 12)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Un besoin constant</h3>
                    <p class="text-gray-600 leading-relaxed">Les produits sanguins ont une durÃ©e de vie limitÃ©e (5 jours pour les plaquettes). Le besoin de nouveaux dons est quotidien et ininterrompu.</p>
                </div>

                <!-- Reason 3 -->
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                     <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Bon pour la santÃ©</h3>
                    <p class="text-gray-600 leading-relaxed">Donner son sang stimule la production de nouvelles cellules sanguines et bÃ©nÃ©ficie d'un mini-bilan de santÃ© gratuit avant chaque don.</p>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                </div>
            </div>
        </div>
    </section>

<<<<<<< HEAD
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
=======
    <!-- Process Section -->
    <section id="process" class="py-32 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Le processus est simple</h2>
            <p class="text-lg text-gray-600 font-medium mb-16">Seulement 4 Ã©tapes pour faire la diffÃ©rence.</p>
            
            <div class="flex flex-col md:flex-row justify-between items-center relative">
                <!-- Connecting Line (Desktop) -->
                <div class="hidden md:block absolute top-1/3 left-0 w-full h-1 bg-gray-100 -z-10"></div>
                
                <div class="flex flex-col items-center w-full md:w-1/4 mb-10 md:mb-0 relative group">
                    <div class="w-20 h-20 rounded-2xl bg-white border-2 border-gray-200 flex items-center justify-center text-3xl font-black text-gray-300 mb-6 group-hover:border-red-600 group-hover:text-red-600 transition-colors shadow-sm">1</div>
                    <h4 class="font-bold text-gray-900 mb-2">Inscription</h4>
                    <p class="text-sm text-gray-500 max-w-[200px]">Remplissez un questionnaire rapide pour vÃ©rifier votre Ã©ligibilitÃ©.</p>
                </div>
                
                <div class="flex flex-col items-center w-full md:w-1/4 mb-10 md:mb-0 relative group">
                     <div class="w-20 h-20 rounded-2xl bg-white border-2 border-gray-200 flex items-center justify-center text-3xl font-black text-gray-300 mb-6 group-hover:border-red-600 group-hover:text-red-600 transition-colors shadow-sm">2</div>
                    <h4 class="font-bold text-gray-900 mb-2">Entretien</h4>
                    <p class="text-sm text-gray-500 max-w-[200px]">Un entretien confidentiel avec un professionnel de santÃ©.</p>
                </div>

                <div class="flex flex-col items-center w-full md:w-1/4 mb-10 md:mb-0 relative group">
                     <div class="w-20 h-20 rounded-2xl bg-white border-2 border-gray-200 flex items-center justify-center text-3xl font-black text-gray-300 mb-6 group-hover:border-red-600 group-hover:text-red-600 transition-colors shadow-sm">3</div>
                    <h4 class="font-bold text-gray-900 mb-2">Le don</h4>
                    <p class="text-sm text-gray-500 max-w-[200px]">Le prÃ©lÃ¨vement dure environ 10 minutes, sous surveillance constante.</p>
                </div>

                <div class="flex flex-col items-center w-full md:w-1/4 relative group">
                     <div class="w-20 h-20 rounded-2xl bg-white border-2 border-gray-200 flex items-center justify-center text-3xl font-black text-gray-300 mb-6 group-hover:border-red-600 group-hover:text-red-600 transition-colors shadow-sm">4</div>
                    <h4 class="font-bold text-gray-900 mb-2">Collation</h4>
                    <p class="text-sm text-gray-500 max-w-[200px]">Un moment de repos avec une collation pour reprendre des forces.</p>
                </div>
            </div>
            
            <div class="mt-20">
                <router-link to="/inscription" class="inline-flex items-center gap-2 px-8 py-4 bg-gray-900 text-white rounded-xl font-bold text-lg hover:bg-black hover:shadow-xl transition-all">
                    VÃ©rifier mon Ã©ligibilitÃ©
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                </router-link>
            </div>
        </div>
    </section>

<<<<<<< HEAD
    <!-- Footer Medical Style -->
    <footer class="pt-20 pb-24 md:pb-12 bg-white border-t border-medic-200">
=======
    <!-- Call to Acton Map Area (Placeholder) -->
    <section class="relative py-24 bg-gray-50 overflow-hidden text-center">
         <div class="max-w-4xl mx-auto px-6 relative z-10">
             <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">Prêt à faire la différence ?</h2>
             <p class="text-xl text-gray-600 mb-10 font-medium">Rejoignez la communautÃ© Batement Solidaire aujourd'hui et trouvez un centre de collecte prÃ¨s de chez vous.</p>
             <router-link to="/inscription" class="px-10 py-5 bg-red-600 text-white rounded-xl font-bold text-xl shadow-xl shadow-red-600/30 hover:bg-red-700 hover:shadow-red-600/40 hover:-translate-y-1 transition-all inline-block">
                  CrÃ©er un compte maintenant
             </router-link>
         </div>
    </section>

    <!-- Footer Redesign -->
    <footer class="pt-20 pb-32 md:pb-12 bg-white border-t border-gray-200">
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
<<<<<<< HEAD
                        <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-14 w-auto object-contain" />
                    </div>
                    <p class="text-medic-800 leading-relaxed text-sm font-medium">
                        Système d'Information Hospitalier - Gestion des Urgences Transfusionnelles.
=======
                        <div class="w-8 h-8 rounded-lg bg-red-600 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">Batement Solidaire</span>
                    </div>
                    <p class="text-gray-500 leading-relaxed text-sm font-medium">
                        Plateforme nationale de gestion et de promotion du Batement Solidaire.
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                    </p>
                </div>
                
                <div>
<<<<<<< HEAD
                     <h4 class="font-black text-medic-900 mb-6 uppercase tracking-widest text-xs">Informations Patientes</h4>
                     <ul class="space-y-4 text-sm font-bold text-medic-800">
                         <li><a href="#about" class="hover:text-blood-600 transition">Protocole Médical</a></li>
                         <li><a href="#process" class="hover:text-blood-600 transition">Directives Cliniques</a></li>
                         <li><a href="#" class="hover:text-blood-600 transition">Contact Hôpital</a></li>
=======
                     <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">Informations</h4>
                     <ul class="space-y-4 text-sm font-medium text-gray-500">
                         <li><a href="#about" class="hover:text-red-600 transition">Pourquoi donner</a></li>
                         <li><a href="#process" class="hover:text-red-600 transition">Le processus</a></li>
                         <li><a href="#" class="hover:text-red-600 transition">FAQ</a></li>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                     </ul>
                </div>

                <div>
<<<<<<< HEAD
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
=======
                     <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">LÃ©gal</h4>
                     <ul class="space-y-4 text-sm font-medium text-gray-500">
                         <li><a href="#" class="hover:text-red-600 transition">Conditions d'utilisation</a></li>
                         <li><a href="#" class="hover:text-red-600 transition">ConfidentialitÃ©</a></li>
                         <li><a href="#" class="hover:text-red-600 transition">Mentions lÃ©gales</a></li>
                     </ul>
                </div>

                 <div>
                     <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">Suivez-nous</h4>
                     <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all">
                             <span class="sr-only">Twitter</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                     </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400 font-medium">
                 <p>Â© 2026 Batement Solidaire. Tous droits rÃ©servÃ©s.</p>
                 <p>ConÃ§u pour sauver des vies.</p>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
            </div>
        </div>
    </footer>

<<<<<<< HEAD
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
=======
    <!-- Mobile Bottom Navigation (Updated for theme) -->
    <div class="md:hidden fixed bottom-0 w-full bg-white border-t border-gray-200 z-50 pb-6 pt-2 safe-area-bottom shadow-[0_-4px_10px_rgba(0,0,0,0.05)]">
        <div class="flex justify-around items-center px-4">
            <a href="#" class="flex flex-col items-center gap-1 text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="text-[10px] font-bold">Accueil</span>
            </a>
            <a href="#about" class="flex flex-col items-center gap-1 text-gray-500 hover:text-gray-900 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-[10px] font-bold">Infos</span>
            </a>
            <router-link to="/inscription" class="relative -top-6">
                <div class="w-14 h-14 rounded-full bg-red-600 flex items-center justify-center shadow-lg shadow-red-600/40 border-4 border-white">
                     <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                </div>
            </router-link>
            <a href="#process" class="flex flex-col items-center gap-1 text-gray-500 hover:text-gray-900 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="text-[10px] font-bold">Ã‰tapes</span>
            </a>
            <router-link to="/login" class="flex flex-col items-center gap-1 text-gray-500 hover:text-gray-900 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="text-[10px] font-bold">Compte</span>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
            </router-link>
        </div>
    </div>
  </div>
</template>

<script>
<<<<<<< HEAD
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
=======
export default {
  name: 'HomeView'
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
}
</script>

<style scoped>
<<<<<<< HEAD
/* Smooth medical style transitions */
html { scroll-behavior: smooth; }
.safe-area-bottom { padding-bottom: env(safe-area-inset-bottom, 24px); }
</style>
=======
.fade-in-up {
    animation: fadeInUp 1s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}
</style>

>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
