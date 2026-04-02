<template>
<<<<<<< HEAD
  <div class="min-h-screen flex bg-white font-sans text-medic-900 selection:bg-blood-100 selection:text-blood-900">
    
    <!-- Left Side: Informational (Hidden on mobile) -->
    <div class="hidden lg:flex w-5/12 relative bg-medic-900 overflow-hidden flex-col justify-between p-12 text-white">
      <div class="absolute inset-0 z-0">
        <!-- Abstract gradient for modern medical feel -->
        <div class="absolute inset-0 bg-gradient-to-br from-medic-900 via-medic-800 to-blood-900"></div>
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-blood-600 rounded-full blur-[100px] opacity-40"></div>
      </div>
      
      <div class="relative z-10 w-full">
        <div class="flex items-center gap-4 mb-16">
          <div class="bg-white p-2 rounded-2xl shadow-lg">
            <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-10 w-auto object-contain">
          </div>
        </div>
        
        <h1 class="text-4xl lg:text-5xl font-black text-white leading-[1.15] tracking-tight mb-8">
          Mille mercis pour<br>votre engagement.
        </h1>
        
        <div class="space-y-8">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center shrink-0 border border-white/20">
              <svg class="w-6 h-6 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <div>
              <h3 class="text-lg font-bold text-white mb-1">Impact Direct</h3>
              <p class="text-medic-300 font-medium text-sm leading-relaxed">Chaque don de sang peut sauver jusqu'à 3 vies à l'Hôpital Général.</p>
            </div>
          </div>
          
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center shrink-0 border border-white/20">
              <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div>
              <h3 class="text-lg font-bold text-white mb-1">Données Sécurisées</h3>
              <p class="text-medic-300 font-medium text-sm leading-relaxed">Vos informations de santé sont strictement confidentielles et chiffrées.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Side: Clean Form -->
    <div class="w-full lg:w-7/12 flex flex-col justify-center items-center p-6 sm:p-12 lg:p-16 bg-white overflow-y-auto">
      
      <div class="w-full max-w-xl">
        
        <!-- Mobile Logo -->
        <div class="flex lg:hidden items-center justify-center gap-3 mb-8">
          <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-14 w-auto object-contain">
        </div>

        <div class="mb-10 text-center lg:text-left">
          <h2 class="text-3xl sm:text-4xl font-black text-medic-900 tracking-tight mb-2">Ouvrir un dossier patient</h2>
          <p class="text-base text-medic-500 font-medium">Rejoignez le registre des donneurs officiels.</p>
        </div>

        <form @submit.prevent="register" class="space-y-6">
          
          <!-- Ligne 1: Nom et Email -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="block text-sm font-bold text-medic-800">Nom Complet</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-medic-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                </div>
                <input v-model="name" type="text" placeholder="Jean Dupont" class="block w-full pl-11 pr-4 py-3.5 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-300 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-bold" required>
              </div>
            </div>

            <div class="space-y-2">
              <label class="block text-sm font-bold text-medic-800">Email Prêt</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-medic-400" viewBox="0 0 20 20" fill="currentColor"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" /></svg>
                </div>
                <input v-model="email" type="email" placeholder="contact@email.com" class="block w-full pl-11 pr-4 py-3.5 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-300 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-bold" required>
              </div>
            </div>
          </div>

          <!-- Ligne 2: Tel et Groupe -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="block text-sm font-bold text-medic-800">Téléphone (SMS requis)</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-medic-400" viewBox="0 0 20 20" fill="currentColor"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" /></svg>
                </div>
                <input v-model="phone" type="tel" placeholder="6XXXXXXXX" class="block w-full pl-11 pr-4 py-3.5 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-300 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-black tracking-widest" required>
              </div>
            </div>

            <div class="space-y-2">
              <label class="block text-sm font-bold text-medic-800">Groupe Sanguin</label>
              <div class="relative">
                <select v-model="blood_type" class="block w-full pl-5 pr-12 py-3.5 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-black appearance-none cursor-pointer">
                  <option value="">Donnée Inconnue</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-medic-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Ligne 3: Password -->
          <div class="space-y-2">
            <label class="block text-sm font-bold text-medic-800">Pin de sécurité (8+ car.)</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-medic-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" /></svg>
              </div>
              <input v-model="password" :type="showPassword ? 'text' : 'password'" placeholder="••••••••" class="block w-full pl-11 pr-12 py-3.5 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-300 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-black tracking-widest" required>
              <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-medic-400 hover:text-medic-800 transition-colors">
                <svg v-if="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                <svg v-else class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
              </button>
            </div>
          </div>

          <button type="submit" class="w-full flex justify-center items-center gap-3 py-4 px-4 rounded-2xl shadow-xl shadow-blood-600/20 text-base font-bold text-white bg-blood-600 hover:bg-blood-700 transition-all active:scale-[0.98] mt-8">
            <span>Créer mon dossier patient</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </button>
        </form>

        <div class="mt-10 text-center border-t border-medic-100 pt-8">
          <p class="text-sm text-medic-600 font-medium">
            Vous avez déjà un compte ? 
            <router-link to="/login" class="font-black text-blood-600 hover:text-blood-700 transition-colors ml-1 underline underline-offset-4 decoration-blood-200 hover:decoration-blood-600">
              Connexion Sécurisée
=======
  <div class="min-h-screen relative flex items-center justify-center p-4 sm:p-8 bg-black overflow-hidden font-sans">
    
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
       <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&q=80&w=2000" alt="Medical Background" class="w-full h-full object-cover opacity-60 mix-blend-overlay">
       <div class="absolute inset-0 bg-gradient-to-br from-red-900/90 to-black/80"></div>
    </div>

    <!-- Decorative abstract background blobs -->
    <div class="absolute top-[0%] left-[-10%] w-96 h-96 bg-red-500 rounded-full mix-blend-screen filter blur-[100px] opacity-30 animate-blob"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-80 h-80 bg-rose-500 rounded-full mix-blend-screen filter blur-[100px] opacity-30 animate-blob animation-delay-4000"></div>

    <div class="w-full max-w-5xl bg-white/10 backdrop-blur-2xl rounded-3xl shadow-[0_8px_40px_rgb(0,0,0,0.5)] border border-white/20 overflow-hidden flex flex-col md:flex-row relative z-10 transition-shadow duration-500">
      
      <!-- Left side: Branding -->
      <div class="hidden md:flex md:w-1/2 flex-col items-start justify-center p-12 relative border-r border-white/10 text-white">
         <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>
         <div class="relative z-10 w-full px-4">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white text-red-700 shadow-xl mb-8">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
              </svg>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight mb-4">Devenez un Héros.</h1>
            <p class="text-lg text-gray-200 font-medium leading-relaxed">1 geste peut sauver jusqu'à 3 vies. Créez votre profil Batement Solidaire et commencez l'aventure.</p>
         </div>
      </div>

      <!-- Right side: Form -->
      <div class="w-full md:w-1/2 p-8 sm:p-12 lg:p-14 flex flex-col justify-center bg-white/5 backdrop-blur-md">
        <div class="mb-8 text-center md:text-left">
          <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-white text-red-600 shadow-lg mb-4 md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
          </div>
          <h2 class="text-3xl font-extrabold text-white tracking-tight">Rejoignez-nous</h2>
          <p class="text-sm font-medium text-gray-300 mt-2">Créez un compte sécurisé en quelques secondes.</p>
        </div>

        <form @submit.prevent="register" class="space-y-4">
          
          <div class="group">
            <label class="block text-sm font-semibold text-gray-200 mb-1 transition-colors group-focus-within:text-white">Nom complet</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 text-gray-400 group-focus-within:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
              </div>
              <input v-model="name" type="text" placeholder="Jean Dupont" class="block w-full pl-9 pr-4 py-2.5 sm:text-sm border border-white/20 rounded-xl bg-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all font-medium backdrop-blur-md" required>
            </div>
          </div>

          <div class="group">
            <label class="block text-sm font-semibold text-gray-200 mb-1 transition-colors group-focus-within:text-white">Email</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 text-gray-400 group-focus-within:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
              </div>
              <input v-model="email" type="email" placeholder="exemple@email.com" class="block w-full pl-9 pr-4 py-2.5 sm:text-sm border border-white/20 rounded-xl bg-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all font-medium backdrop-blur-md" required>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="group">
              <label class="block text-sm font-semibold text-gray-200 mb-1 transition-colors group-focus-within:text-white">Téléphone</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-4 w-4 text-gray-400 group-focus-within:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                  </svg>
                </div>
                <input v-model="phone" type="tel" placeholder="+33 6..." class="block w-full pl-9 pr-4 py-2.5 sm:text-sm border border-white/20 rounded-xl bg-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all font-medium backdrop-blur-md" required>
              </div>
            </div>

            <div class="group">
              <label class="block text-sm font-semibold text-gray-200 mb-1 transition-colors group-focus-within:text-white">Groupe sanguin</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-4 w-4 text-gray-400 group-focus-within:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                </div>
                <select v-model="blood_type" class="block w-full pl-9 pr-10 py-2.5 sm:text-sm border border-white/20 rounded-xl bg-white/10 text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all font-medium appearance-none backdrop-blur-md cursor-pointer">
                  <option value="" class="text-gray-900">Inconnu</option>
                  <option value="A+" class="text-gray-900">A+</option>
                  <option value="A-" class="text-gray-900">A-</option>
                  <option value="B+" class="text-gray-900">B+</option>
                  <option value="B-" class="text-gray-900">B-</option>
                  <option value="AB+" class="text-gray-900">AB+</option>
                  <option value="AB-" class="text-gray-900">AB-</option>
                  <option value="O+" class="text-gray-900">O+</option>
                  <option value="O-" class="text-gray-900">O-</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
              </div>
            </div>
          </div>

          <div class="group">
            <label class="block text-sm font-semibold text-gray-200 mb-1 transition-colors group-focus-within:text-white">Mot de passe</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 text-gray-400 group-focus-within:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <input v-model="password" :type="showPassword ? 'text' : 'password'" placeholder="••••••••" class="block w-full pl-9 pr-10 py-2.5 sm:text-sm border border-white/20 rounded-xl bg-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all font-medium backdrop-blur-md" required>
              <div @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                <!-- Eye open -->
                <svg v-if="!showPassword" class="h-4 w-4 text-gray-400 hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <!-- Eye closed -->
                <svg v-else class="h-4 w-4 text-gray-400 hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
              </div>
            </div>
            <p class="text-xs text-gray-400 mt-1.5 font-medium ml-1">Au moins 8 caractères.</p>
          </div>

          <button type="submit" class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-xl shadow-lg shadow-black/30 text-sm font-bold text-red-600 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all transform active:scale-[0.98] mt-4">
            <span>Créer mon compte</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </button>
        </form>

        <div class="mt-6 text-center sm:text-left border-t border-white/20 pt-5">
          <p class="text-sm text-gray-300 font-medium">
            Déjà inscrit ? 
            <router-link to="/login" class="font-bold text-white hover:text-red-200 transition-colors relative inline-block group">
              Se connecter
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
            </router-link>
          </p>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            name: '',
            email: '',
            phone: '',
            role: 'donateur',
            password: '',
            blood_type: '',
            showPassword: false
        };
    },
    methods: {
        async register() {
            try {
                const baseUrl = 'http://127.0.0.1:8000/api'; 
                
                await axios.post(`${baseUrl}/register`, {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    role: this.role,
                    password: this.password,
                    password_confirmation: this.password,
                    blood_type: this.blood_type
                });
                
                Swal.fire({
                    icon: 'success',
<<<<<<< HEAD
                    title: 'Dossier Créé !',
                    text: 'Connectez-vous pour commencer à sauver des vies.',
                    background: '#ffffff',
                    color: '#111827',
                    confirmButtonColor: '#DC2626'
=======
                    title: 'Compte créé !',
                    text: 'Connectez-vous pour continuer.',
                    background: '#ffffff',
                    color: '#111827',
                    iconColor: '#22c55e',
                    confirmButtonColor: '#dc2626'
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                });

                this.$router.push('/login');
            } catch (error) {
                console.error(error);
<<<<<<< HEAD
                let title = 'Problème Pédagogique';
                let htmlMsg = 'Vérifiez vos informations.';

                if (error.response?.data?.errors) {
                    title = 'Données Incomplètes';
                    htmlMsg = '<ul class="text-left mt-2 space-y-1">';
                    Object.values(error.response.data.errors).forEach(errArray => {
                        errArray.forEach(err => {
                            htmlMsg += `<li class="text-blood-600 text-sm font-medium">• ${err}</li>`;
                        });
                    });
                    htmlMsg += '</ul>';
                } else if (error.response?.data?.message) {
                    htmlMsg = `<p class="text-sm text-medic-800">${error.response.data.message}</p>`;
=======
                let title = 'Erreur';
                let htmlMsg = 'Vérifiez vos informations.';

                if (error.response && error.response.data) {
                    if (error.response.data.errors) {
                        title = 'Erreur de validation';
                        htmlMsg = '<ul style="text-align: left; margin-top: 10px;">';
                        Object.values(error.response.data.errors).forEach(errArray => {
                            errArray.forEach(err => {
                                htmlMsg += `<li style="color: #ef4444; font-size: 14px; margin-bottom: 5px;">• ${err}</li>`;
                            });
                        });
                        htmlMsg += '</ul>';
                    } else if (error.response.data.message) {
                        htmlMsg = error.response.data.message;
                    }
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                }

                Swal.fire({
                    icon: 'error',
                    title: title,
                    html: htmlMsg,
                    background: '#ffffff',
                    color: '#111827',
<<<<<<< HEAD
                    confirmButtonColor: '#DC2626'
=======
                    confirmButtonColor: '#dc2626'
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
                });
            }
        }
    }
};
</script>