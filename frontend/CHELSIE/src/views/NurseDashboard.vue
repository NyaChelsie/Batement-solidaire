<template>
<<<<<<< HEAD
  <div class="min-h-screen bg-gray-100 flex flex-col font-sans text-gray-800 touch-manipulation">
    
    <!-- Topbar (Sticky) -->
    <header class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center shadow-lg sticky top-0 z-50">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center shadow-inner p-1 overflow-hidden">
                <img src="@/assets/logo.png" alt="Batement Solidaire" class="w-full h-full object-contain" />
            </div>
            <div>
                <h1 class="text-xl font-black tracking-wider">HGD CLINIC</h1>
                <p class="text-xs text-blue-400 font-bold uppercase tracking-widest">Interface Infirmier</p>
            </div>
        </div>
        <button @click="logout" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg font-bold text-sm transition">
            Déconnexion
        </button>
    </header>

    <main class="flex-1 overflow-y-auto w-full max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
        
        <!-- ÉCRAN 1 : SCANNER LE PASS -->
        <div v-if="flowStep === 1" class="bg-white rounded-3xl shadow-xl overflow-hidden mt-6 animate-fade-in border-4 border-dashed border-gray-300">
            <div class="p-8 sm:p-12 text-center">
                <div class="w-32 h-32 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 mx-auto mb-8 relative">
                    <svg class="w-16 h-16 absolute animate-pulse opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                    <svg class="w-16 h-16 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                
                <h2 class="text-4xl font-black text-gray-900 mb-4">Scanner le Pass</h2>
                <p class="text-xl text-gray-500 font-medium mb-12">Scannez le QR Code ou saisissez le code patient au clavier.</p>

                <div class="max-w-xl mx-auto flex flex-col items-center justify-center gap-4">
                     <form @submit.prevent="lookupAppointment" class="w-full relative">
                        <input v-model="manualQrCode" type="text" placeholder="EX: HGD-O-948" class="w-full text-center text-3xl font-black tracking-widest uppercase bg-gray-100 border-4 border-transparent focus:border-blue-500 rounded-2xl py-6 focus:ring-0 transition placeholder:text-gray-300 placeholder:font-bold">
                        <button type="submit" :disabled="isLoading" class="absolute right-3 top-3 bottom-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-8 font-black text-xl transition disabled:opacity-50">
                            GO
                        </button>
                    </form>
                    
                    <button @click="toggleCamera" type="button" class="mt-4 flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold bg-blue-50 px-6 py-3 rounded-xl transition active:scale-95">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span v-if="!isCameraOpen">Scanner avec la Caméra</span>
                        <span v-else>Fermer la Caméra</span>
                    </button>
                    
                    <div v-show="isCameraOpen" class="w-full max-w-sm mt-4 overflow-hidden rounded-3xl border-4 border-blue-500 shadow-2xl relative bg-black">
                        <div id="qr-reader" class="w-full h-48 md:h-64 object-cover"></div>
                        <div class="absolute inset-0 border-b-4 border-red-500 shadow-[0_4px_15px_rgba(239,68,68,0.5)] animate-scan pointer-events-none z-10"></div>
                    </div>
                </div>
                <div v-if="errorMsg" class="mt-8 text-red-600 text-xl font-bold p-4 bg-red-50 rounded-xl max-w-xl mx-auto border-2 border-red-200 animate-shake">
                    {{ errorMsg }}
                </div>
            </div>
        </div>

        <!-- ÉCRANS ACTIFS (2, 3, 4) -->
        <div v-else class="grid xl:grid-cols-12 gap-6 animate-fade-in">
            
            <!-- Colonne Gauche : Profil Donneur -->
            <div class="xl:col-span-4 flex flex-col gap-6">
                <!-- Fiche Donneur -->
                <div class="bg-gray-900 text-white p-8 rounded-3xl shadow-xl relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 opacity-10">
                        <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/></svg>
                    </div>
                    <div class="flex items-center gap-6 mb-8 relative z-10">
                        <div class="w-24 h-24 bg-red-600 rounded-2xl flex items-center justify-center text-4xl font-black border-4 border-gray-800 shadow-inner rotate-3">
                            {{ appointment.donor ? appointment.donor.blood_type || '?' : '?' }}
                        </div>
                        <div>
                            <p class="text-gray-400 font-bold uppercase tracking-widest text-sm mb-1">Donneur</p>
                            <h2 class="text-2xl sm:text-3xl font-black leading-none">{{ appointment.donor ? appointment.donor.name : 'Inconnu' }}</h2>
                        </div>
                    </div>
                    <div class="space-y-4 relative z-10 text-lg">
                        <div class="flex justify-between border-b border-gray-800 pb-2">
                            <span class="text-gray-500 font-bold">Code</span>
                            <span class="font-black">{{ appointment.qr_code_path.split('-').slice(0, 3).join('-') }}</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-800 pb-2">
                             <span class="text-gray-500 font-bold">Contact</span>
                            <span class="font-black">{{ appointment.donor ? appointment.donor.phone : 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between pb-2">
                             <span class="text-gray-500 font-bold">Consentement</span>
                            <span class="font-black text-green-400">Validé</span>
                        </div>
                    </div>
                    <button v-if="flowStep < 4" @click="resetFlow" class="w-full mt-6 bg-gray-800 hover:bg-gray-700 py-4 rounded-xl font-bold transition text-gray-300">Annuler / Retour</button>
                </div>
            </div>

            <!-- Colonne Droite : Formulaires Dynamiques -->
            <div class="xl:col-span-8 flex flex-col gap-6">
                
                <!-- ÉCRAN 2 : ENTRETIEN MÉDICAL -->
                <div v-if="flowStep === 2" class="bg-white p-8 rounded-3xl shadow-xl animate-fade-in">
                    <h3 class="text-2xl font-black text-gray-900 mb-8 border-b-4 border-red-600 inline-block pb-2">Examen Clinique</h3>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                             <!-- Segmented Controls: Poids & Tension -->
                             <div class="space-y-6">
                                <!-- Poids -->
                                <div>
                                    <label class="block text-gray-500 font-bold uppercase text-sm mb-3 tracking-widest">Poids (kg)</label>
                                    <div class="flex rounded-2xl p-1 bg-gray-100 border-2 border-gray-200" @click="activeInput = 'weight'">
                                         <input v-model="vitals.weight" type="text" readonly class="w-full text-center font-black text-3xl bg-transparent border-none py-3 focus:ring-0 text-gray-900 cursor-pointer" placeholder="--">
                                         <button class="bg-white rounded-xl px-6 shadow-sm font-bold border border-gray-200 text-gray-800 hover:bg-gray-50" :class="{'ring-2 ring-blue-500 text-blue-600': activeInput === 'weight'}">Éditer</button>
                                    </div>
                                </div>
                                <!-- Tension -->
                                <div>
                                    <label class="block text-gray-500 font-bold uppercase text-sm mb-3 tracking-widest">Tension (mmHg)</label>
                                    <div class="flex rounded-2xl p-1 bg-gray-100 border-2 border-gray-200" @click="activeInput = 'blood_pressure'">
                                         <input v-model="vitals.blood_pressure" type="text" readonly class="w-full text-center font-black text-3xl bg-transparent border-none py-3 focus:ring-0 text-gray-900 cursor-pointer" placeholder="120/80">
                                         <button class="bg-white rounded-xl px-6 shadow-sm font-bold border border-gray-200 text-gray-800 hover:bg-gray-50" :class="{'ring-2 ring-blue-500 text-blue-600': activeInput === 'blood_pressure'}">Éditer</button>
                                    </div>
                                </div>
                             </div>
                             
                             <div class="mt-10">
                                <label class="block text-gray-500 font-bold uppercase text-sm mb-3 tracking-widest">Aptitude au Don</label>
                                <!-- Segmented Controls -->
                                <div class="grid grid-cols-2 gap-4">
                                     <button @click="medicalDecision = 'completed'" class="py-5 sm:py-8 rounded-2xl font-black text-xl sm:text-2xl transition border-4 border-transparent shadow-lg text-white" 
                                        :class="medicalDecision === 'completed' ? 'bg-green-600 border-green-800 scale-105' : 'bg-gray-300 hover:bg-green-400 opacity-50 hover:opacity-100'">
                                        APTE
                                     </button>
                                     <button @click="medicalDecision = 'rejected'" class="py-5 sm:py-8 rounded-2xl font-black text-xl sm:text-2xl transition border-4 border-transparent shadow-lg text-white" 
                                        :class="medicalDecision === 'rejected' ? 'bg-red-600 border-red-800 scale-105' : 'bg-gray-300 hover:bg-red-500 opacity-50 hover:opacity-100'">
                                        INAPTE
                                     </button>
                                </div>
                             </div>
                        </div>

                        <!-- Virtual Numpad -->
                        <div class="bg-gray-50 rounded-3xl p-6 border-2 border-gray-200">
                             <div class="text-center mb-4">
                                 <p class="text-sm font-bold text-gray-400 tracking-widest uppercase">Clavier Virtuel</p>
                             </div>
                             <div class="grid grid-cols-3 gap-3">
                                 <button v-for="n in 9" :key="n" @click="appendNumpad(n)" class="bg-white rounded-2xl aspect-square flex items-center justify-center font-black text-3xl shadow-sm border border-gray-200 text-gray-700 hover:bg-blue-50 hover:text-blue-600 active:scale-95 transition touch-manipulation">
                                     {{ n }}
                                 </button>
                                 <button @click="appendNumpad('/')" class="bg-gray-200 rounded-2xl text-xl font-black shadow-sm text-gray-700 hover:bg-gray-300 active:scale-95 transition touch-manipulation flex items-center justify-center">/</button>
                                 <button @click="appendNumpad(0)" class="bg-white rounded-2xl aspect-square flex items-center justify-center font-black text-3xl shadow-sm border border-gray-200 text-gray-700 hover:bg-blue-50 hover:text-blue-600 active:scale-95 transition touch-manipulation">0</button>
                                 <button @click="backspaceNumpad" class="bg-red-100 rounded-2xl text-red-600 shadow-sm hover:bg-red-200 active:scale-95 transition touch-manipulation flex items-center justify-center">
                                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z"></path></svg>
                                 </button>
                             </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8">
                        <button v-if="medicalDecision === 'completed'" @click="flowStep = 3" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-3xl font-black rounded-3xl py-8 shadow-2xl transition transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-4">
                             Suivant: Type de Don
                             <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                        <button v-if="medicalDecision === 'rejected'" @click="submitMedicalData" :disabled="isSubmitting" class="w-full bg-red-600 hover:bg-red-700 text-white text-2xl font-black rounded-3xl py-6 shadow-xl transition transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-4 disabled:opacity-50">
                             <svg v-if="isSubmitting" class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                             Valider le Refus Médical
                        </button>
                    </div>
                </div>

                <!-- ÉCRAN 3 : TYPE DE DON ET CLÔTURE -->
                <div v-if="flowStep === 3" class="bg-white p-8 rounded-3xl shadow-xl animate-fade-in flex flex-col items-center">
                    <h3 class="text-2xl font-black text-gray-900 mb-8 w-full border-b-4 border-blue-600 pb-2">Catégorie du Don</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mb-12">
                        <button @click="donationType = 'benevole'" class="p-8 border-4 rounded-3xl text-center transition" :class="donationType === 'benevole' ? 'border-blue-600 bg-blue-50 transform scale-105 shadow-xl' : 'border-gray-200 hover:border-blue-300 bg-white'">
                            <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <span class="block font-black text-xl text-gray-900 mb-2">Bénévole</span>
                            <span class="text-gray-500 text-sm font-medium">Volontaire altruiste</span>
                        </button>
                        <button @click="donationType = 'familial'" class="p-8 border-4 rounded-3xl text-center transition" :class="donationType === 'familial' ? 'border-orange-500 bg-orange-50 transform scale-105 shadow-xl' : 'border-gray-200 hover:border-orange-300 bg-white'">
                            <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                 <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <span class="block font-black text-xl text-gray-900 mb-2">Familial</span>
                            <span class="text-gray-500 text-sm font-medium">Pour un proche</span>
                        </button>
                        <button @click="donationType = 'remunere'" class="p-8 border-4 rounded-3xl text-center transition" :class="donationType === 'remunere' ? 'border-purple-600 bg-purple-50 transform scale-105 shadow-xl' : 'border-gray-200 hover:border-purple-300 bg-white'">
                             <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                 <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="block font-black text-xl text-gray-900 mb-2">Rémunéré</span>
                            <span class="text-gray-500 text-sm font-medium">Compensé</span>
                        </button>
                    </div>

                    <!-- Slide to confirm -->
                    <div class="w-full max-w-md bg-gray-100 rounded-full h-20 flex items-center relative overflow-hidden shadow-inner border border-gray-200" :class="{'opacity-50 pointer-events-none': !donationType || isSubmitting}">
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none z-0">
                            <span class="text-gray-400 font-bold tracking-widest uppercase text-sm">Glisser pour Valider</span>
                        </div>
                        <input type="range" min="0" max="100" v-model="sliderValue" @change="checkSlider" @input="updateSlider"
                            class="absolute top-0 w-full h-full opacity-0 cursor-pointer z-20">
                        <div class="h-full bg-green-500 transition-all rounded-l-full z-10 pointer-events-none" :style="`width: ${sliderValue}%`"></div>
                        <div class="absolute left-1 top-1 w-18 h-18 bg-white rounded-full shadow-lg flex items-center justify-center z-10 pointer-events-none transition-transform" :style="`transform: translateX(calc(${sliderValue} * 3.3px))`">
                             <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>

                </div>

                <!-- ÉCRAN 4 : SUCCÈS & ÉTIQUETAGE -->
                <div v-if="flowStep === 4" class="bg-gray-900 p-8 rounded-3xl shadow-xl animate-fade-in text-center text-white border-8 border-green-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-green-500 opacity-10 animate-pulse"></div>
                    <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6 text-white relative z-10 shadow-lg shadow-green-500/50">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    
                    <h2 class="text-3xl font-black mb-2 relative z-10">Prélèvement Validé</h2>
                    <p class="text-green-400 font-bold mb-8 relative z-10">Stock augmenté de +1 poche ({{ appointment?.donor?.blood_type }})</p>

                    <div class="bg-white p-6 rounded-2xl relative z-10">
                        <p class="text-gray-500 font-bold uppercase tracking-widest text-sm mb-2">ORDRE D'ÉTIQUETAGE</p>
                        <p class="text-6xl font-black text-gray-900 tracking-tighter">{{ orderNumber }}</p>
                    </div>
                    
                    <div class="mt-8 bg-gray-800 p-4 rounded-xl flex items-center justify-center gap-3 relative z-10">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        <span class="font-bold text-gray-300">Un SMS de remerciement a été envoyé au donneur.</span>
                    </div>

                    <button @click="resetFlow" class="mt-8 bg-gray-700 hover:bg-gray-600 w-full py-5 rounded-2xl font-black text-xl transition relative z-10">
                        Poche Suivante / Nouveau Donneur
                    </button>
                </div>

            </div>
        </div>

=======
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
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
    </main>
  </div>
</template>

<script>
import axios from 'axios';
<<<<<<< HEAD
import { Html5Qrcode } from 'html5-qrcode';
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960

export default {
    data() {
        return {
<<<<<<< HEAD
            flowStep: 1, // 1: Scan, 2: Examen, 3: Type Don, 4: Numéro
            manualQrCode: '',
            isCameraOpen: false,
            html5QrCode: null,
            isLoading: false,
            errorMsg: null,
            appointment: null,
            activeInput: 'weight',
            vitals: {
                weight: '',
                blood_pressure: ''
            },
            medicalDecision: null, // 'completed' or 'rejected'
            donationType: null, // 'benevole', 'familial', 'remunere'
            sliderValue: 0,
            isSubmitting: false,
            orderNumber: null
=======
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
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
        }
    },
    methods: {
        async lookupAppointment() {
            if (!this.manualQrCode) return;
            this.isLoading = true;
            this.errorMsg = null;
            
<<<<<<< HEAD
            if (this.isCameraOpen) {
                this.toggleCamera();
            }

            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/nurse/appointments/qr/${this.manualQrCode}`);
                this.appointment = response.data;
                if (this.appointment.donor && this.appointment.donor.weight) {
                     this.vitals.weight = this.appointment.donor.weight;
                }
                this.flowStep = 2; // Move to Examen
            } catch (err) {
                if (err.response && err.response.status === 404) {
                    this.errorMsg = "Code invalide. Essayez HGD-O-XXX";
                } else {
                    this.errorMsg = "Erreur de connexion serveur.";
=======
            try {
                // Fetch appointment by QR code
                const response = await axios.get(`http://127.0.0.1:8000/api/nurse/appointments/qr/${this.manualQrCode}`);
                this.appointment = response.data;
            } catch (err) {
                if (err.response && err.response.status === 404) {
                    this.errorMsg = "Aucun rendez-vous trouvé pour ce code.";
                } else {
                    this.errorMsg = "Erreur de connexion.";
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                }
            } finally {
                this.isLoading = false;
            }
        },
<<<<<<< HEAD
        appendNumpad(val) {
            if (this.vitals[this.activeInput] !== undefined) {
                this.vitals[this.activeInput] = this.vitals[this.activeInput].toString() + val;
            }
        },
        backspaceNumpad() {
            if (this.vitals[this.activeInput] && this.vitals[this.activeInput].length > 0) {
                 this.vitals[this.activeInput] = this.vitals[this.activeInput].slice(0, -1);
            }
        },
        async toggleCamera() {
            this.isCameraOpen = !this.isCameraOpen;
            if (this.isCameraOpen) {
                this.errorMsg = null;
                this.$nextTick(() => {
                    this.html5QrCode = new Html5Qrcode("qr-reader");
                    this.html5QrCode.start(
                        { facingMode: "environment" },
                        { fps: 10, qrbox: { width: 250, height: 250 } },
                        (decodedText) => {
                            this.manualQrCode = decodedText;
                            this.toggleCamera(); // turn off
                            this.lookupAppointment(); // submit automatically
                        },
                        () => {} // ignores parsing errors on empty frames
                    ).catch((err) => {
                        console.error(err);
                        this.errorMsg = "Impossible d'accéder à la caméra.";
                        this.isCameraOpen = false;
                    });
                });
            } else {
                if (this.html5QrCode && this.html5QrCode.isScanning) {
                    await this.html5QrCode.stop();
                    this.html5QrCode.clear();
                    this.html5QrCode = null;
                }
            }
        },
        updateSlider() {
            // Optional visually logic if native range input needs styles
        },
        checkSlider() {
            if (this.sliderValue > 95) {
                this.sliderValue = 100;
                this.submitMedicalData();
            } else {
                this.sliderValue = 0; // reset if not fully slided
            }
        },
        async submitMedicalData() {
            if (!this.appointment || !this.medicalDecision) return;
            this.isSubmitting = true;

            try {
                const payload = {
                    status: this.medicalDecision,
                    blood_pressure: this.vitals.blood_pressure,
                    weight: this.vitals.weight,
                    donation_type: this.donationType
                };
                
                const response = await axios.post(`http://127.0.0.1:8000/api/nurse/appointments/${this.appointment.id}/complete`, payload);
                
                if (this.medicalDecision === 'completed') {
                    this.orderNumber = response.data.order_number;
                    this.flowStep = 4; // Show tagging screen
                    window.scrollTo(0,0);
                } else {
                    // Rejected
                    alert("Refus médical enregistré !");
                    this.resetFlow();
                }
            } catch (err) {
                console.error(err);
                if (err.response && err.response.data && err.response.data.message) {
                    alert("Erreur: " + err.response.data.message);
                } else {
                    alert("Erreur système.");
                }
                this.sliderValue = 0;
=======
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
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
            } finally {
                this.isSubmitting = false;
            }
        },
        resetFlow() {
<<<<<<< HEAD
            this.flowStep = 1;
            this.appointment = null;
            this.manualQrCode = '';
            this.vitals.weight = '';
            this.vitals.blood_pressure = '';
            this.medicalDecision = null;
            this.donationType = null;
            this.sliderValue = 0;
            this.orderNumber = null;
            this.errorMsg = null;
            this.activeInput = 'weight';
=======
            this.appointment = null;
            this.manualQrCode = '';
            this.vitals.blood_pressure = '';
            this.vitals.hemoglobin_level = '';
            this.errorMsg = null;
        },
        formatDate(dateStr) {
            const d = new Date(dateStr);
            return d.toLocaleDateString('fr-FR');
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
        },
        logout() {
            localStorage.clear();
            this.$router.push('/login');
        }
<<<<<<< HEAD
    },
    async beforeUnmount() {
        if (this.html5QrCode && this.html5QrCode.isScanning) {
            await this.html5QrCode.stop();
            this.html5QrCode.clear();
        }
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
    }
}
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.4s ease-out forwards;
}
@keyframes fadeIn {
<<<<<<< HEAD
    from { opacity: 0; transform: translateY(20px); }
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

.animate-scan {
    animation: scan 2.5s cubic-bezier(0.53, 0.21, 0.29, 0.67) infinite;
    height: 15%;
}
@keyframes scan {
    0% { transform: translateY(-100%); }
    50% { transform: translateY(600%); }
    100% { transform: translateY(-100%); }
}

/* Restyle slider to be invisible natively */
input[type=range] {
    -webkit-appearance: none;
    width: 100%;
    background: transparent;
}
input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    height: 80px;
    width: 80px;
    background: transparent;
    cursor: pointer;
}
=======
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
</style>
