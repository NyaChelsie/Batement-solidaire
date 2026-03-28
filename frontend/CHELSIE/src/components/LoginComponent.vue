<template>
  <div class="min-h-screen relative flex items-center justify-center p-4 sm:p-8 bg-black overflow-hidden font-sans">
    
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
       <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&q=80&w=2000" alt="Medical Background" class="w-full h-full object-cover opacity-60 mix-blend-overlay">
       <div class="absolute inset-0 bg-gradient-to-br from-red-900/90 to-black/80"></div>
    </div>

    <!-- Decorative abstract background blobs for ambient lighting -->
    <div class="absolute top-[0%] left-[-10%] w-96 h-96 bg-red-500 rounded-full mix-blend-screen filter blur-[100px] opacity-30 animate-blob"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-80 h-80 bg-rose-500 rounded-full mix-blend-screen filter blur-[100px] opacity-30 animate-blob animation-delay-4000"></div>

    <div class="w-full max-w-5xl bg-white/10 backdrop-blur-2xl rounded-3xl shadow-[0_8px_40px_rgb(0,0,0,0.5)] border border-white/20 overflow-hidden flex flex-col md:flex-row relative z-10">
      
      <!-- Left side: Branding -->
      <div class="hidden md:flex md:w-1/2 flex-col items-start justify-center p-12 relative border-r border-white/10 text-white">
         <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>
         <div class="relative z-10 w-full">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white text-red-700 shadow-xl mb-8">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
              </svg>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight mb-4">Batement Solidaire</h1>
            <p class="text-lg text-gray-200 font-medium leading-relaxed">Rejoignez une communauté de héros anonymes. Votre contribution fait la différence au quotidien.</p>
         </div>
      </div>

      <!-- Right side: Form -->
      <div class="w-full md:w-1/2 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white/5 backdrop-blur-md">
        <div class="mb-10 text-center md:text-left">
          <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-white text-red-600 shadow-lg mb-5 md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
          </div>
          <h2 class="text-3xl font-extrabold text-white tracking-tight">Bon retour 👋</h2>
          <p class="text-sm font-medium text-gray-300 mt-2">Connectez-vous pour accéder à votre espace.</p>
        </div>

        <form @submit.prevent="login" class="space-y-6">
          <div class="group">
            <label class="block text-sm font-semibold text-gray-200 mb-2 transition-colors group-focus-within:text-white">Adresse Email</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
              </div>
              <input v-model="email" type="email" placeholder="votre@email.com" class="block w-full pl-11 pr-4 py-3.5 sm:text-sm border border-white/20 rounded-xl bg-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all font-medium backdrop-blur-md" required>
            </div>
          </div>

          <div class="group">
            <div class="flex items-center justify-between mb-2">
              <label class="block text-sm font-semibold text-gray-200 transition-colors group-focus-within:text-white">Mot de passe</label>
              <a href="#" class="text-xs font-semibold text-red-300 hover:text-white transition-colors">Mot de passe oublié ?</a>
            </div>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <input v-model="password" :type="showPassword ? 'text' : 'password'" placeholder="••••••••" class="block w-full pl-11 pr-10 py-3.5 sm:text-sm border border-white/20 rounded-xl bg-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all font-medium backdrop-blur-md" required>
              <div @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer">
                <!-- Eye open -->
                <svg v-if="!showPassword" class="h-5 w-5 text-gray-400 hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <!-- Eye closed -->
                <svg v-else class="h-5 w-5 text-gray-400 hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
              </div>
            </div>
          </div>

          <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-black/30 text-sm font-bold text-red-600 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all transform active:scale-[0.98]">
            <span>Se connecter</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </button>
        </form>

        <div class="mt-8 text-center sm:text-left border-t border-white/20 pt-6">
          <p class="text-sm text-gray-300 font-medium">
            Vous n'avez pas de compte ? 
            <router-link to="/inscription" class="font-bold text-white hover:text-red-200 transition-colors relative inline-block group">
              Créer un compte
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
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
            email: '',
            password: '',
            showPassword: false
        };
    },
    methods: {
        async login() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/login', {
                    email: this.email,
                    password: this.password
                });
                
                const token = response.data.access_token;
                const user = response.data.user;

                localStorage.setItem('access_token', token);
                localStorage.setItem('user', JSON.stringify(user));
                
                const role = user.role;

                if (role === 'admin') {
                     this.$router.push('/admin');
                } else if (role === 'donateur' || role === 'donor') {
                     this.$router.push('/donor-dashboard');
                } else if (role === 'infirmier' || role === 'nurse') {
                     this.$router.push('/nurse');
                } else {
                     this.$router.push('/');
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Connexion réussie',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    background: '#ffffff',
                    color: '#111827',
                    iconColor: '#22c55e'
                });

            } catch (error) {
                console.error(error);
                let title = 'Erreur';
                let text = 'Une erreur est survenue.';

                if (error.response) {
                    if (error.response.status === 401) {
                         title = 'Échec de connexion';
                         text = 'Email ou mot de passe incorrect.';
                    } else {
                         text = error.response.data.message || `Erreur serveur (${error.response.status})`;
                    }
                } else if (error.request) {
                    title = 'Problème de connexion';
                    text = 'Le serveur est inaccessible.';
                } else {
                    text = error.message;
                }

                 Swal.fire({
                    icon: 'error',
                    title: title,
                    text: text,
                    background: '#ffffff',
                    color: '#111827',
                    confirmButtonColor: '#dc2626'
                });
            }
        }
    }
};
</script>