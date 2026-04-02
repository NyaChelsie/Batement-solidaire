<template>
  <div class="min-h-screen flex bg-white font-sans text-medic-900 selection:bg-blood-100 selection:text-blood-900">
    
    <!-- Left Side: Interactive / Visual (Hidden on mobile) -->
    <div class="hidden lg:flex w-1/2 relative bg-medic-50 overflow-hidden flex-col justify-between p-12">
      <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&q=80&w=2000" alt="Hôpital" class="w-full h-full object-cover">
        <!-- Soft, light medical overlay instead of dark mode -->
        <div class="absolute inset-0 bg-gradient-to-b from-white/95 via-white/80 to-blood-50/90 backdrop-blur-[2px]"></div>
      </div>
      
      <div class="relative z-10">
        <div class="flex items-center gap-4 mb-16">
          <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-12 w-auto object-contain">
          <div>
             <span class="text-xl font-black tracking-tight text-medic-900 block leading-none">Battements</span>
             <span class="text-sm font-bold tracking-widest text-blood-600 uppercase">Solidaires</span>
          </div>
        </div>
        
        <h1 class="text-5xl lg:text-6xl font-black text-medic-900 leading-[1.1] tracking-tight mb-6">
          L'urgence n'attend pas.<br>
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-blood-600 to-blood-400">Votre sang sauve.</span>
        </h1>
        <p class="text-xl text-medic-800 font-medium max-w-lg leading-relaxed">
          Accédez à votre dossier médical, signalez votre disponibilité et répondez aux appels d'urgence de l'Hôpital Général.
        </p>
      </div>

      <div class="relative z-10 flex items-center gap-4 bg-white/60 backdrop-blur-xl p-6 rounded-3xl border border-white max-w-md shadow-sm">
        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 shrink-0">
          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        </div>
        <div>
          <p class="text-xs font-black text-medic-500 uppercase tracking-widest mb-1">Connexion Sécurisée</p>
          <p class="text-sm text-medic-900 font-bold leading-snug">Vos données de santé sont chiffrées de bout en bout.</p>
        </div>
      </div>
    </div>

    <!-- Right Side: Form (Ultra clean, High Contrast) -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 sm:p-12 lg:p-24 bg-white relative">
      
      <div class="w-full max-w-md">
        
        <!-- Mobile Logo (Visible only on small screens) -->
        <div class="flex lg:hidden items-center justify-center gap-3 mb-10">
          <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-16 w-auto object-contain drop-shadow-sm">
        </div>

        <div class="mb-10 text-center lg:text-left">
          <h2 class="text-3xl sm:text-4xl font-black text-medic-900 tracking-tight mb-2">Bon retour 👋</h2>
          <p class="text-base text-medic-500 font-medium">Connectez-vous à votre espace patient.</p>
        </div>

        <!-- Login Method Toggle -->
        <div class="flex justify-center mb-6">
          <div class="bg-white/10 p-1 rounded-xl backdrop-blur-md inline-flex border border-white/20">
            <button @click="loginMethod = 'phone'; loginStep = 1" :class="loginMethod === 'phone' ? 'bg-white text-red-600 shadow-md' : 'text-gray-300 hover:text-white'" class="py-2 px-4 rounded-lg text-sm font-bold transition-all">Par SMS</button>
            <button @click="loginMethod = 'email'" :class="loginMethod === 'email' ? 'bg-white text-red-600 shadow-md' : 'text-gray-300 hover:text-white'" class="py-2 px-4 rounded-lg text-sm font-bold transition-all">Email & Mot de passe</button>
          </div>
        </div>

        <!-- METHOD: PHONE / OTP -->
        <template v-if="loginMethod === 'phone'">
          <!-- STEP 1: Phone Number -->
          <form v-if="loginStep === 1" @submit.prevent="requestOtp" class="space-y-6">
          <div class="space-y-2">
            <label class="block text-sm font-bold text-medic-800">Numéro de Téléphone</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-medic-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
              </div>
              <input v-model="phone" type="tel" placeholder="Ex: 6XXXXXXXX" class="block w-full pl-12 pr-4 py-4 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-300 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-black text-lg tracking-wider" required>
            </div>
          </div>

          <button type="submit" :disabled="isLoading" class="w-full flex justify-center items-center gap-3 py-4 px-4 rounded-2xl shadow-xl shadow-blood-600/20 text-base font-bold text-white bg-blood-600 hover:bg-blood-700 transition-all active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed mt-4">
            <span v-if="isLoading" class="flex items-center gap-2">
              <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
              Envoi du SMS sécurisé...
            </span>
            <template v-else>
              <span>Authentification par SMS</span>
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </template>
          </button>
        </form>

        <!-- STEP 2: OTP Verification -->
        <form v-if="loginStep === 2" @submit.prevent="verifyOtp" class="space-y-6 animate-fade-up">
          <div class="space-y-2">
            <div class="flex items-center justify-between">
              <label class="block text-sm font-bold text-medic-800">Code de Validation</label>
              <button type="button" @click="loginStep = 1" class="text-xs font-bold text-blood-600 hover:text-blood-700 transition-colors">Modifier le numéro</button>
            </div>
            <div class="relative group">
              <input v-model="otpCode" type="tel" placeholder="----" class="block w-full text-center py-5 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-200 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 transition-all font-black text-4xl tracking-[0.5em]" maxlength="4" required>
            </div>
            <div class="p-4 bg-medic-50 rounded-xl border border-medic-100 mt-4 flex items-start gap-3">
               <svg class="w-5 h-5 text-medic-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
               <p class="text-xs text-medic-600 font-medium leading-relaxed">Un code à 4 chiffres (1234 pour démo) a été envoyé par SMS au <span class="font-bold text-medic-900">{{ phone }}</span>.</p>
            </div>
          </div>

          <button type="submit" :disabled="isLoading" class="w-full flex justify-center items-center gap-3 py-4 px-4 rounded-2xl shadow-xl shadow-emerald-600/20 text-base font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition-all active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed">
            <span v-if="isLoading" class="flex items-center gap-2">
              <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
              Vérification...
            </span>
            <template v-else>
              <span>Valider et Accéder</span>
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </template>
          </button>
        </form>
        </template>

        <!-- METHOD: EMAIL & PASSWORD -->
        <form v-if="loginMethod === 'email'" @submit.prevent="signInWithEmail" class="space-y-6 animate-fade-up">
          <div class="space-y-4">
            <div class="group">
              <label class="block text-sm font-bold text-medic-800 mb-2">Adresse Email</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-medic-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                </div>
                <input v-model="email" type="email" placeholder="nom@exemple.com" class="block w-full pl-12 pr-4 py-4 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-300 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-bold text-lg" required>
              </div>
            </div>
            
            <div class="group">
              <label class="block text-sm font-bold text-medic-800 mb-2">Mot de passe</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-medic-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <input v-model="password" type="password" placeholder="••••••••" class="block w-full pl-12 pr-4 py-4 bg-medic-50 border-2 border-medic-100 rounded-2xl text-medic-900 placeholder-medic-300 focus:outline-none focus:border-blood-500 focus:bg-white focus:ring-4 focus:ring-blood-500/10 transition-all font-bold text-lg" required>
              </div>
            </div>
          </div>

          <button type="submit" :disabled="isLoading" class="w-full flex justify-center items-center gap-3 py-4 px-4 rounded-2xl shadow-xl shadow-blood-600/20 text-base font-bold text-white bg-blood-600 hover:bg-blood-700 transition-all active:scale-[0.98] disabled:opacity-70 mt-4">
            <span v-if="isLoading" class="flex items-center gap-2">
              <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
              Connexion en cours...
            </span>
            <template v-else>
              <span>Se Connecter avec Email</span>
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </template>
          </button>
        </form>

        <div class="mt-12 text-center">
          <p class="text-sm text-medic-600 font-medium">
            Nouveau donneur ? 
            <router-link to="/inscription" class="font-black text-blood-600 hover:text-blood-700 transition-colors ml-1 underline underline-offset-4 decoration-blood-200 hover:decoration-blood-600">
              Ouvrir un dossier
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
            loginMethod: 'phone', // 'phone' | 'email'
            loginStep: 1, // 1: phone request, 2: verify
            phone: '',
            otpCode: '',
            email: '',
            password: '',
            isLoading: false
        };
    },
    methods: {
        async requestOtp() {
            if (!this.phone) return;
            this.isLoading = true;
            try {
                await axios.post('http://127.0.0.1:8000/api/login/otp/request', { phone: this.phone });
                this.loginStep = 2;
                Swal.fire({ icon: 'success', title: 'Code Envoyé', text: 'Consultez vos SMS.', toast: true, position: 'top', timer: 3000, showConfirmButton: false, background: '#10B981', color: '#ffffff' });
            } catch (error) {
                const msg = error.response?.data?.message || 'Erreur réseau lors de l\'envoi.';
                Swal.fire({ icon: 'error', title: 'Échec', text: msg, confirmButtonColor: '#DC2626' });
            } finally {
                this.isLoading = false;
            }
        },
        async verifyOtp() {
            if (!this.otpCode) return;
            this.isLoading = true;
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/login/otp/verify', {
                    phone: this.phone,
                    code: this.otpCode
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

                Swal.fire({ icon: 'success', title: 'Authentifié', toast: true, position: 'top', showConfirmButton: false, timer: 2000, background: '#10B981', color: '#ffffff' });

            } catch (error) {
                console.error(error);
                let text = 'Code incorrect ou expiré.';
                if (error.response && error.response.status !== 401) {
                     text = error.response.data.message || `Erreur serveur (${error.response.status})`;
                }
                Swal.fire({ icon: 'error', title: 'Accès Refusé', text: text, confirmButtonColor: '#DC2626' });
            } finally {
                this.isLoading = false;
            }
        },
        async signInWithEmail() {
            if (!this.email || !this.password) return;
            this.isLoading = true;
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
                let text = 'Vos identifiants sont incorrects.';
                if (error.response && error.response.data && error.response.data.message) {
                    text = error.response.data.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: text,
                    background: '#ffffff',
                    color: '#111827',
                    confirmButtonColor: '#dc2626'
                });
            } finally {
                this.isLoading = false;
            }
        }
    }
};
</script>