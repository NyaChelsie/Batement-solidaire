<template>
<<<<<<< HEAD
  <div class="min-h-screen bg-medic-50 flex font-sans text-medic-900 selection:bg-blood-100 selection:text-blood-900">
    
    <!-- Sidebar Navigation (Apple Health Style / Clean) -->
    <aside class="w-72 bg-white border-r border-medic-200 hidden md:flex flex-col z-20 shadow-[4px_0_24px_rgba(0,0,0,0.02)]">
      
      <!-- Brand Area -->
      <div class="p-8 pb-4">
        <div class="flex items-center gap-4">
          <img src="@/assets/logo.png" alt="Battements Solidaires" class="w-12 h-12 object-contain" />
          <div class="leading-tight">
             <span class="text-xl font-black tracking-tight text-medic-900 block">Battements</span>
             <span class="text-md font-bold tracking-widest text-blood-600 uppercase">Solidaires</span>
          </div>
        </div>
      </div>
      
      <!-- Nav Links -->
      <nav class="flex-1 px-5 py-6 space-y-2">
        <p class="px-4 text-xs font-black text-medic-400 uppercase tracking-widest mb-4">Espace Donneur</p>
        
        <router-link to="/donor-dashboard" exact-active-class="bg-blood-50 text-blood-700 font-bold" class="flex items-center gap-4 px-4 py-3.5 text-medic-800 hover:bg-medic-50 hover:text-medic-900 rounded-2xl font-semibold transition-all duration-200">
          <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
          Dossier Patient
        </router-link>
        
        <router-link to="/donor-dashboard/appointments" active-class="bg-blood-50 text-blood-700 font-bold" class="flex items-center gap-4 px-4 py-3.5 text-medic-800 hover:bg-medic-50 hover:text-medic-900 rounded-2xl font-semibold transition-all duration-200 relative">
          <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          Rendez-vous
          <span class="absolute right-4 w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.8)]"></span>
        </router-link>
        
        <router-link to="/donor-dashboard/history" active-class="bg-blood-50 text-blood-700 font-bold" class="flex items-center gap-4 px-4 py-3.5 text-medic-800 hover:bg-medic-50 hover:text-medic-900 rounded-2xl font-semibold transition-all duration-200">
          <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Historique Médical
        </router-link>
        
        <router-link to="/donor-dashboard/centers" active-class="bg-blood-50 text-blood-700 font-bold" class="flex items-center gap-4 px-4 py-3.5 text-medic-800 hover:bg-medic-50 hover:text-medic-900 rounded-2xl font-semibold transition-all duration-200">
          <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          Centres HGD
        </router-link>
        
        <hr class="border-t border-medic-100 my-4" />
        
        <router-link to="/donor-dashboard/settings" active-class="bg-blood-50 text-blood-700 font-bold" class="flex items-center gap-4 px-4 py-3.5 text-medic-800 hover:bg-medic-50 hover:text-medic-900 rounded-2xl font-semibold transition-all duration-200">
          <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          Réglages
        </router-link>
      </nav>
      
      <!-- User Profile Minimal Area -->
      <div class="p-6">
        <div class="bg-medic-50 p-4 rounded-3xl border border-medic-100 flex items-center gap-4 mb-4 shadow-sm hover:shadow-md transition">
          <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=fee2e2&color=dc2626&bold=true" alt="User Profile" class="w-12 h-12 rounded-xl">
          <div class="flex-1 min-w-0">
            <p class="text-sm font-black text-medic-900 truncate">{{ user?.name || 'Jean Dupont' }}</p>
            <p class="text-xs text-blood-600 font-black tracking-widest uppercase mt-0.5 truncate">Groupe : {{ user?.blood_type || 'O+' }}</p>
          </div>
        </div>
        <button @click="logout" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-bold text-medic-600 border border-medic-200 hover:border-medic-300 hover:bg-medic-50 hover:text-medic-900 rounded-2xl transition-all duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
=======
  <div class="min-h-screen bg-gray-50 flex font-sans text-gray-800">
    
    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-gradient-to-b from-red-700 to-red-600 border-r border-red-800 hidden md:flex flex-col text-white shadow-xl shadow-red-900/20 z-20 relative">
      <div class="p-6">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-white text-red-700 flex items-center justify-center shadow-md">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
          </div>
          <span class="text-xl font-bold tracking-tight text-white leading-tight">Batement<br>Solidaire</span>
        </div>
      </div>
      
      <nav class="flex-1 px-4 py-4 space-y-2">
        <router-link to="/donor-dashboard" exact-active-class="bg-white/20 text-white font-bold shadow-inner" class="flex items-center gap-3 px-4 py-3 text-red-100 hover:bg-white/10 hover:text-white rounded-xl font-medium transition-all duration-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
          Tableau de bord
        </router-link>
        <router-link to="/donor-dashboard/appointments" active-class="bg-white/20 text-white font-bold shadow-inner" class="flex items-center gap-3 px-4 py-3 text-red-100 hover:bg-white/10 hover:text-white rounded-xl font-medium transition-all duration-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          Mes rendez-vous
        </router-link>
        <router-link to="/donor-dashboard/history" active-class="bg-white/20 text-white font-bold shadow-inner" class="flex items-center gap-3 px-4 py-3 text-red-100 hover:bg-white/10 hover:text-white rounded-xl font-medium transition-all duration-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Historique des dons
        </router-link>
        <router-link to="/donor-dashboard/centers" active-class="bg-white/20 text-white font-bold shadow-inner" class="flex items-center gap-3 px-4 py-3 text-red-100 hover:bg-white/10 hover:text-white rounded-xl font-medium transition-all duration-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          Centres de collecte
        </router-link>
        <router-link to="/donor-dashboard/settings" active-class="bg-white/20 text-white font-bold shadow-inner" class="flex items-center gap-3 px-4 py-3 text-red-100 hover:bg-white/10 hover:text-white rounded-xl font-medium transition-all duration-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          Paramètres
        </router-link>
      </nav>
      
      <div class="p-4 border-t border-red-800 bg-red-800/20">
        <div class="flex items-center gap-3 px-4 py-3 mb-4">
          <img src="https://ui-avatars.com/api/?name=User&background=ffffff&color=b91c1c" alt="User Profile" class="w-10 h-10 rounded-full border-2 border-red-400 shadow-sm">
          <div class="flex-1 min-w-0">
            <p class="text-sm font-bold text-white truncate">{{ user?.name || 'Utilisateur' }}</p>
            <p class="text-xs text-red-200 font-medium truncate">Groupe : {{ user?.blood_type || 'N/A' }}</p>
          </div>
        </div>
        <button @click="logout" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold text-red-700 bg-white hover:bg-gray-100 rounded-xl transition-all duration-200 shadow-md">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
          Déconnexion
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto w-full transition-all">
      
<<<<<<< HEAD
      <!-- Mobile Header iOS Style -->
       <header class="md:hidden sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-white/80 backdrop-blur-xl border-b border-medic-200 shadow-sm">
          <div class="flex items-center gap-3">
             <img src="@/assets/logo.png" alt="Battements Solidaires" class="h-9 w-auto object-contain" />
          </div>
          <button @click="logout" class="w-10 h-10 rounded-full bg-medic-50 text-medic-800 flex items-center justify-center active:bg-medic-100 transition-colors">
             <img src="https://ui-avatars.com/api/?name=J+D&background=fee2e2&color=dc2626&bold=true" alt="Profile" class="w-full h-full rounded-full">
=======
      <!-- Mobile Header -->
       <header class="md:hidden flex items-center justify-between p-4 bg-gradient-to-r from-red-700 to-red-600 border-b border-red-800 text-white shadow-md">
          <div class="flex items-center gap-2">
             <div class="w-8 h-8 rounded-lg bg-white text-red-700 flex items-center justify-center">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            </div>
            <span class="font-bold text-sm leading-none">Batement<br>Solidaire</span>
          </div>
          <p class="font-bold text-sm text-red-100 hidden sm:block">Tableau de bord</p>
          <button @click="logout" class="text-red-100 hover:text-white p-2 transition-colors">
             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
          </button>
       </header>

      <router-view></router-view>
      
    </main>
  </div>
</template>

<script>
export default {
    data() {
        return {
            user: null
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
    },
    methods: {
        logout() {
            localStorage.removeItem('access_token');
            localStorage.removeItem('user');
            this.$router.push('/login');
        }
    }
}
</script>
<<<<<<< HEAD

<style scoped>
/* Scroller discret */
::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-track {
  background: transparent;
}
::-webkit-scrollbar-thumb {
  background-color: #e5e7eb;
  border-radius: 10px;
}
</style>
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
