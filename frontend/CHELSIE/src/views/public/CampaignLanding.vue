<template>
<<<<<<< HEAD
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
=======
  <div class="min-h-screen bg-gray-50 font-sans text-gray-900 pb-20">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            </div>
            <span class="font-bold text-xl tracking-tight text-gray-900">Batement Solidaire HGD</span>
        </div>
      </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 pt-8">
        
        <!-- Loading State -->
        <div v-if="isLoading" class="flex flex-col items-center justify-center py-20">
            <svg class="animate-spin h-10 w-10 text-red-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            <p class="text-gray-500 font-medium">Chargement de la campagne...</p>
        </div>

        <!-- Error State -->
        <div v-else-if="error" class="bg-red-50 border border-red-200 text-red-700 p-6 rounded-2xl text-center">
            <p class="font-bold text-lg mb-2">Impossible de charger la campagne</p>
            <p>{{ error }}</p>
        </div>

        <div v-else class="space-y-8">
            
            <!-- Step Navigation Indicator -->
            <div class="flex items-center justify-center mb-8">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold transition-colors" :class="step >= 1 ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500'">1</div>
                    <div class="w-12 h-1 rounded-full transition-colors" :class="step >= 2 ? 'bg-red-600' : 'bg-gray-200'"></div>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold transition-colors" :class="step >= 2 ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500'">2</div>
                    <div class="w-12 h-1 rounded-full transition-colors" :class="step >= 3 ? 'bg-red-600' : 'bg-gray-200'"></div>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold transition-colors" :class="step >= 3 ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500'">3</div>
                    <div class="w-12 h-1 rounded-full transition-colors" :class="step >= 4 ? 'bg-red-600' : 'bg-gray-200'"></div>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold transition-colors" :class="step >= 4 ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500'">4</div>
                </div>
            </div>

            <!-- STEP 1: Campaign Details Overview -->
            <div v-if="step === 1" class="animate-fade-in text-center">
                
                <!-- Image Accrocheuse et Motivation -->
                <div class="mb-8 overflow-hidden rounded-3xl shadow-lg border border-gray-100 transform transition duration-500 hover:scale-[1.02]">
                    <img src="https://images.unsplash.com/photo-1615461066841-6116e61058f4?auto=format&fit=crop&q=80&w=1200" alt="Batement Solidaire" class="w-full h-64 sm:h-80 object-cover">
                    <div class="bg-red-600 text-white p-6 sm:p-8">
                        <h2 class="text-2xl sm:text-3xl font-black mb-2 animate-pulse">Sauvez une vie humaine aujourd'hui !</h2>
                        <p class="text-red-100 font-medium text-lg max-w-2xl mx-auto">Votre don est un acte héroïque. Un seul Batement Solidaire peut sauver jusqu'à 3 vies. Rejoignez le mouvement.</p>
                    </div>
                </div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-bold mb-6" 
                    :class="campaign.urgency_level === 'critique' ? 'bg-red-100 text-red-700 animate-pulse' : (campaign.urgency_level === 'urgente' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700')">
                    <span class="w-2 h-2 rounded-full" :class="campaign.urgency_level === 'critique' ? 'bg-red-500' : (campaign.urgency_level === 'urgente' ? 'bg-orange-500' : 'bg-blue-500')"></span>
                    Urgence {{ campaign.urgency_level }}
                </div>
                
                <h1 class="text-3xl sm:text-4xl font-black text-gray-900 mb-4">{{ campaign.title }}</h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed max-w-2xl mx-auto">{{ campaign.description }}</p>
                
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 mb-8 text-left">
                    <h3 class="font-bold text-gray-900 mb-4">Groupes sanguins recherchÃ©s :</h3>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span v-for="bt in campaign.blood_types_needed" :key="bt" class="px-4 py-2 bg-red-50 text-red-700 font-black rounded-lg border border-red-100 text-lg">
                            {{ bt }}
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm italic">MÃªme si votre groupe n'est pas dans la liste, votre don est toujours prÃ©cieux pour l'hÃ´pital.</p>
                </div>

                <button @click="nextStep" class="w-full sm:w-auto px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-2xl text-lg shadow-lg shadow-red-600/30 transition transform hover:-translate-y-1">
                    Je souhaite donner mon sang
                </button>
            </div>

            <!-- STEP 2: Eligibility Quiz -->
            <div v-if="step === 2" class="animate-fade-in">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-red-50 p-6 border-b border-red-100">
                        <h2 class="text-2xl font-black text-gray-900">VÃ©rification d'Ã©ligibilitÃ©</h2>
                        <p class="text-red-700 text-sm mt-1">Pour votre sÃ©curitÃ© et celle du receveur, veuillez rÃ©pondre avec exactitude.</p>
                    </div>
                    <div class="p-6 md:p-8 space-y-6">
                        <!-- Quiz Form -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Quel est votre Ã¢ge ?</label>
                            <input v-model.number="quiz.age" type="number" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-red-500 focus:border-red-500 p-3" placeholder="Ex: 25">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Quel est votre poids (en kg) ?</label>
                            <input v-model.number="quiz.weight" type="number" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-red-500 focus:border-red-500 p-3" placeholder="Ex: 65">
                        </div>
                        <div class="pt-4 space-y-4">
                            <label class="flex items-start gap-3 cursor-pointer p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition" :class="{'bg-red-50 border-red-200': quiz.q1 === true}">
                                <input v-model="quiz.q1" type="radio" :value="true" class="mt-1 text-red-600 focus:ring-red-500">
                                <div>
                                    <span class="block font-bold text-gray-900">Avez-vous eu de la fiÃ¨vre ou une infection dans les 14 derniers jours ?</span>
                                </div>
                            </label>
                            <label class="flex items-start gap-3 cursor-pointer p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition" :class="{'bg-red-50 border-red-200': quiz.q1 === false}">
                                <input v-model="quiz.q1" type="radio" :value="false" class="mt-1 text-red-600 focus:ring-red-500">
                                <div>
                                    <span class="block font-bold text-gray-900">Non, je me sens en parfaite santÃ©.</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50 border-t border-gray-100 flex justify-between">
                        <button @click="step = 1" class="px-6 py-3 font-bold text-gray-600 hover:text-gray-900">Retour</button>
                        <button @click="checkEligibility" class="px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-md cursor-pointer transition disabled:opacity-50">
                            VÃ©rifier mon Ã©ligibilitÃ©
                        </button>
                    </div>
                </div>

                <!-- Eligibility Error -->
                <div v-if="eligibilityError" class="mt-6 bg-red-50 border border-red-200 p-6 rounded-2xl flex gap-4 items-start animate-shake">
                    <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <h4 class="font-bold text-red-900 text-lg mb-1">Vous n'Ãªtes pas Ã©ligible aujourd'hui</h4>
                        <p class="text-red-700 text-sm">{{ eligibilityError }}</p>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Appointment Scheduling -->
            <div v-if="step === 3" class="animate-fade-in">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8">
                     <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h2 class="text-2xl font-black text-gray-900">Vous Ãªtes Ã©ligible !</h2>
                    </div>
                    <p class="text-gray-600 mb-8">Choisissez une date et une heure pour votre don à l'Hôpital Général de Douala.</p>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">SÃ©lectionnez le jour</label>
                            <div class="grid grid-cols-3 gap-3">
                                <button v-for="d in availableDates" :key="d.raw" @click="appointment.date = d.raw" 
                                    class="p-4 border rounded-xl text-center transition"
                                    :class="appointment.date === d.raw ? 'border-red-500 bg-red-50 ring-2 ring-red-200' : 'border-gray-200 hover:border-red-300 bg-white'">
                                    <span class="block text-xs font-bold text-gray-500 uppercase">{{ d.day }}</span>
                                    <span class="block text-xl font-black text-gray-900">{{ d.num }}</span>
                                    <span class="block text-xs text-gray-600">{{ d.month }}</span>
                                </button>
                            </div>
                        </div>

                        <div v-if="appointment.date" class="animate-fade-in">
                            <label class="block text-sm font-bold text-gray-700 mb-2">SÃ©lectionnez l'heure</label>
                            <div class="grid grid-cols-4 gap-3">
                                <button v-for="time in availableTimes" :key="time" @click="appointment.time = time"
                                    class="py-3 px-2 border rounded-xl text-center font-bold text-sm transition"
                                    :class="appointment.time === time ? 'border-red-500 bg-red-600 text-white' : 'border-gray-200 hover:bg-gray-50 text-gray-700 bg-white'">
                                    {{ time }}
                                </button>
                            </div>
                        </div>

                        <!-- Login Request if not authenticated -->
                        <div v-if="appointment.time && !isAuthenticated" class="p-6 bg-blue-50 border border-blue-100 rounded-xl mt-6 animate-fade-in text-center">
                            <p class="text-blue-800 font-bold mb-4">Pour confirmer votre rendez-vous, vous devez vous connecter ou crÃ©er un compte donneur.</p>
                            <div class="flex gap-4 justify-center">
                                <router-link to="/login" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg shadow-sm hover:bg-blue-700">Connexion</router-link>
                                <router-link to="/inscription" class="px-6 py-2 bg-white text-blue-600 border border-blue-200 font-bold rounded-lg shadow-sm hover:bg-gray-50">S'inscrire</router-link>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between">
                        <button @click="step = 2" class="px-6 py-3 font-bold text-gray-600 hover:text-gray-900">Retour</button>
                        <button v-if="isAuthenticated && appointment.time" @click="confirmAppointment" :disabled="isConfirming" class="px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-lg transition flex items-center gap-2">
                             <svg v-if="isConfirming" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Confirmer le RDV
                        </button>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Confirmation & QR Code -->
            <div v-if="step === 4" class="animate-fade-in">
                 <div class="bg-white rounded-3xl shadow-sm border border-green-200 p-8 text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4">
                        <svg class="w-32 h-32 text-green-500 opacity-10" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                    
                    <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center text-green-500 mx-auto mb-6 relative z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    
                    <h2 class="text-3xl font-black text-gray-900 mb-2 relative z-10">Rendez-vous ConfirmÃ© !</h2>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto relative z-10">Merci de vous mobiliser. Présentez ce code QR à l'accueil de l'Hôpital Général de Douala lors de votre arrivée.</p>

                    <!-- QR Code Display Mockup -->
                    <div class="bg-white p-4 border-2 border-dashed border-gray-300 rounded-2xl w-64 h-64 mx-auto mb-6 flex flex-col items-center justify-center relative z-10 shadow-sm relative group overflow-hidden">
                        <img :src="'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' + qrData" alt="QR Code" class="rounded opacity-90 transition group-hover:opacity-100">
                        <div class="absolute inset-0 bg-red-600/90 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                            <span class="text-white font-bold flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                TÃ©lÃ©charger
                            </span>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-xl inline-block text-left mb-8 border border-gray-200 relative z-10">
                        <div class="flex items-center gap-3 text-gray-700 mb-2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="font-bold">{{ formattedAppointmentDate }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="font-medium">HÃ´pital GÃ©nÃ©ral de Douala</span>
                        </div>
                    </div>

                    <div>
                        <router-link to="/donor-dashboard" class="inline-block font-bold text-red-600 hover:text-red-700 hover:underline relative z-10">
                            Voir mon tableau de bord donneur
                        </router-link>
                    </div>
                 </div>
            </div>

        </div>
    </main>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
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
<<<<<<< HEAD
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
=======
            quiz: {
                age: null,
                weight: null,
                q1: null // Fever
            },
            eligibilityError: '',
            appointment: {
                date: null,
                time: null
            },
            availableDates: [],
            availableTimes: ['08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00'],
            isConfirming: false,
            qrData: ''
        }
    },
    computed: {
        isAuthenticated() {
            return !!localStorage.getItem('access_token');
        },
        formattedAppointmentDate() {
            if (!this.appointment.date || !this.appointment.time) return '';
            const d = new Date(this.appointment.date);
            return `${d.toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long' })} à ${this.appointment.time}`;
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
        }
    },
    mounted() {
        this.fetchCampaignDetails();
<<<<<<< HEAD
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
=======
        this.generateAvailableDates();
    },
    methods: {
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
        async fetchCampaignDetails() {
            try {
                const slug = this.$route.params.slug;
                const response = await axios.get(`http://127.0.0.1:8000/api/public/campaign/${slug}`);
                this.campaign = response.data;
<<<<<<< HEAD
                // Parse blood types logic
=======
                // Since blood_types_needed might be stored as JSON string or array, parse it if needed
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                if (typeof this.campaign.blood_types_needed === 'string') {
                    try {
                        this.campaign.blood_types_needed = JSON.parse(this.campaign.blood_types_needed);
                    } catch (e) {
                         this.campaign.blood_types_needed = [];
                    }
                }
<<<<<<< HEAD
                
                // Pré-sélection du groupe sanguin
                if (this.campaign.blood_types_needed && this.campaign.blood_types_needed.length > 0) {
                    this.guest.blood_type = this.campaign.blood_types_needed[0];
                }
                
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
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
<<<<<<< HEAD
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
=======
        checkEligibility() {
            this.eligibilityError = '';
            
            if (!this.quiz.age || !this.quiz.weight || this.quiz.q1 === null) {
                this.eligibilityError = "Veuillez remplir tous les champs.";
                return;
            }
            if (this.quiz.age < 18 || this.quiz.age > 65) {
                this.eligibilityError = "L'Ã¢ge requis pour donner son sang est entre 18 et 65 ans.";
                return;
            }
            if (this.quiz.weight < 50) {
                this.eligibilityError = "Le poids minimum pour un Batement Solidaire sÃ©curisÃ© est de 50 kg.";
                return;
            }
            if (this.quiz.q1 === true) {
                this.eligibilityError = "Vous ne pouvez pas donner votre sang si vous avez eu de la fiÃ¨vre rÃ©cemment. Veuillez attendre 14 jours.";
                return;
            }
            
            // Success
            this.nextStep();
        },
        generateAvailableDates() {
            const dates = [];
            const days = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
            const months = ['Jan', 'FÃ©v', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'AoÃ»', 'Sep', 'Oct', 'Nov', 'DÃ©c'];
            
            for(let i=1; i<=6; i++) {
                let d = new Date();
                d.setDate(d.getDate() + i);
                if (d.getDay() !== 0) { // Skip Sunday
                    dates.push({
                        raw: d.toISOString().split('T')[0],
                        day: days[d.getDay()],
                        num: d.getDate(),
                        month: months[d.getMonth()]
                    });
                }
                if(dates.length >= 3) break;
            }
            this.availableDates = dates;
        },
        async confirmAppointment() {
            this.isConfirming = true;
            try {
                const token = localStorage.getItem('access_token');
                const headers = token ? { 'Authorization': `Bearer ${token}` } : {};

                // Find center (using 1 as default/HGD)
                const payload = {
                    campaign_id: this.campaign.id,
                    datetime: `${this.appointment.date}T${this.appointment.time}:00`,
                    donation_center_id: 1 
                };

                const response = await axios.post('http://127.0.0.1:8000/api/public/donate', payload, { headers });

                this.qrData = response.data.qr_data;
                this.isConfirming = false;
                this.nextStep();
                
            } catch(e) {
                console.error(e);
                alert("Erreur lors de la confirmation du rendez-vous.");
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                this.isConfirming = false;
            }
        }
    }
}
</script>

<style scoped>
.animate-fade-in {
<<<<<<< HEAD
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
=======
    animation: fadeIn 0.4s ease-out forwards;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-shake {
    animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
}
@keyframes shake {
    10%, 90% { transform: translate3d(-1px, 0, 0); }
    20%, 80% { transform: translate3d(2px, 0, 0); }
    30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
    40%, 60% { transform: translate3d(4px, 0, 0); }
}
</style>

>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
