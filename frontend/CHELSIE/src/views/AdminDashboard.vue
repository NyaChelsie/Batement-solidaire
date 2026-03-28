<template>
  <div class="min-h-screen bg-gray-50 flex font-sans text-gray-800">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-red-700 to-red-600 border-r border-red-800 hidden md:flex flex-col z-20 text-white shadow-xl shadow-red-900/20">
      <div class="p-6 flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-red-700 shadow-md">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
          </div>
          <span class="text-xl font-bold tracking-tight text-white leading-tight">Batement<br>Admin</span>
      </div>
      
      <nav class="flex-1 px-4 py-4 space-y-2">
        <button @click="currentTab = 'dashboard'" :class="currentTab === 'dashboard' ? 'bg-white/20 text-white font-bold shadow-inner' : 'text-red-100 hover:bg-white/10 hover:text-white font-medium'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition text-left">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Tableau de bord
        </button>
        <button @click="currentTab = 'users'" :class="currentTab === 'users' ? 'bg-white/20 text-white font-bold shadow-inner' : 'text-red-100 hover:bg-white/10 hover:text-white font-medium'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition text-left">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            Donneurs
        </button>
        <button @click="currentTab = 'appointments'" :class="currentTab === 'appointments' ? 'bg-white/20 text-white font-bold shadow-inner' : 'text-red-100 hover:bg-white/10 hover:text-white font-medium'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition text-left">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Rendez-vous
        </button>
        <button @click="currentTab = 'campaigns'" :class="currentTab === 'campaigns' ? 'bg-white/20 text-white font-bold shadow-inner' : 'text-red-100 hover:bg-white/10 hover:text-white font-medium'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition text-left">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
            Campagnes
        </button>
        <button @click="currentTab = 'stocks'" :class="currentTab === 'stocks' ? 'bg-white/20 text-white font-bold shadow-inner' : 'text-red-100 hover:bg-white/10 hover:text-white font-medium'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition text-left">
             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            Stocks de sang
        </button>
        <button @click="currentTab = 'settings'" :class="currentTab === 'settings' ? 'bg-white/20 text-white font-bold shadow-inner' : 'text-red-100 hover:bg-white/10 hover:text-white font-medium'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition text-left">
             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Paramètres
        </button>
      </nav>
      
      <div class="p-4 border-t border-red-800 bg-red-800/20">
        <div class="flex items-center gap-3 px-4 py-3 mb-4">
          <img :src="'https://ui-avatars.com/api/?name='+encodeURIComponent(user.name)+'&background=ffffff&color=b91c1c'" alt="Admin Profile" class="w-10 h-10 rounded-full border-2 border-red-400 shadow-sm">
          <div class="flex-1 min-w-0">
            <p class="text-sm font-bold text-white truncate">{{ user.name }}</p>
            <p class="text-xs text-red-200 font-medium truncate capitalize">{{ user.role }}</p>
          </div>
        </div>
        <button @click="logout" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold text-red-700 bg-white hover:bg-gray-100 rounded-xl transition-all duration-200 shadow-md">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
          Déconnexion
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto">
      <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center sticky top-0 z-10">
           <h1 class="text-xl font-bold text-gray-900 hidden md:block capitalize">{{ tabTitles[currentTab] }}</h1>
           
           <!-- Mobile Menu Button -->
           <button class="md:hidden text-gray-500 hover:text-gray-900">
               <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
           </button>
           <h1 class="text-lg font-bold text-gray-900 md:hidden capitalize">{{ tabTitles[currentTab] }}</h1>

           <div class="flex items-center gap-4">
               <div class="relative hidden sm:block">
                   <input type="text" placeholder="Rechercher..." class="bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5">
                   <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                       <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                   </div>
               </div>
               <button class="relative p-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors">
                   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                   <span class="top-1 right-1 absolute w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
               </button>
           </div>
      </header>

      <div class="p-8 max-w-7xl mx-auto">
          
          <!-- DASHBOARD TAB -->
          <div v-if="currentTab === 'dashboard'">
              <!-- Stats Grid -->
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                  <div class="flex justify-between items-start mb-4">
                      <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center text-red-500">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                      </div>
                      <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full">+12%</span>
                  </div>
                  <h3 class="text-gray-500 text-sm font-medium mb-1">Total des dons (ce mois)</h3>
                  <p class="text-3xl font-black text-gray-900">{{ stats.total_donations_month || '1,250' }}</p>
                </div>
                
                <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                  <div class="flex justify-between items-start mb-4">
                      <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                      </div>
                      <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full">+5%</span>
                  </div>
                  <h3 class="text-gray-500 text-sm font-medium mb-1">Nouveaux donneurs</h3>
                  <p class="text-3xl font-black text-gray-900">{{ stats.new_donors || '85' }}</p>
                </div>

                <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                  <div class="flex justify-between items-start mb-4">
                      <div class="w-10 h-10 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-500">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                      </div>
                      <span class="text-xs font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">Aujourd'hui</span>
                  </div>
                  <h3 class="text-gray-500 text-sm font-medium mb-1">Rendez-vous prévus</h3>
                  <p class="text-3xl font-black text-gray-900">{{ stats.appointments_today || '42' }}</p>
                </div>

                <div class="bg-red-50 border border-red-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                  <div class="flex justify-between items-start mb-4">
                      <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                      </div>
                      <span class="text-xs font-bold text-red-700 bg-red-100 px-2 py-1 rounded-full animate-pulse">CRITIQUE</span>
                  </div>
                  <h3 class="text-red-800 text-sm font-medium mb-1">Alertes de stock bas</h3>
                  <p class="text-3xl font-black text-red-700">{{ stats.low_stock_alerts || '3' }}</p>
                </div>
              </div>
              
              <!-- Charts Row -->
              <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                  <!-- Line Chart -->
                  <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm lg:col-span-2">
                      <div class="flex justify-between items-center mb-6">
                          <h3 class="font-bold text-gray-900 text-lg">Tendances des dons (30 derniers jours)</h3>
                          <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2">
                              <option>Mensuel</option>
                              <option>Hebdomadaire</option>
                          </select>
                      </div>
                      <div class="h-64 sm:h-80 w-full relative">
                           <!-- CSS Line Chart Mockup -->
                           <svg viewBox="0 0 100 40" class="w-full h-full preserve-aspect-ratio" preserveAspectRatio="none">
                               <!-- Grid lines -->
                               <path d="M0,10 L100,10 M0,20 L100,20 M0,30 L100,30" stroke="#f3f4f6" stroke-width="0.5" fill="none" />
                               <!-- Path -->
                               <path d="M0,35 C10,35 20,25 30,28 C40,31 50,15 60,30 C70,45 80,5 90,20 L100,25" stroke="#ef4444" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                               <!-- Area Fill -->
                               <path d="M0,35 C10,35 20,25 30,28 C40,31 50,15 60,30 C70,45 80,5 90,20 L100,25 L100,40 L0,40 Z" fill="url(#grad)" opacity="0.1" />
                               <defs>
                                   <linearGradient id="grad" x1="0%" y1="0%" x2="0%" y2="100%">
                                       <stop offset="0%" stop-color="#ef4444" />
                                       <stop offset="100%" stop-color="#ef4444" stop-opacity="0" />
                                   </linearGradient>
                               </defs>
                           </svg>
                           <div class="absolute bottom-[-20px] left-0 w-full flex justify-between text-xs text-gray-400 font-medium px-2">
                               <span>01 Oct</span>
                               <span>07 Oct</span>
                               <span>14 Oct</span>
                               <span>21 Oct</span>
                               <span>28 Oct</span>
                           </div>
                      </div>
                  </div>
                  
                  <!-- Stock Levels Progress Bars -->
                  <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm">
                       <h3 class="font-bold text-gray-900 text-lg mb-6">Niveaux de Stock</h3>
                       
                       <div class="space-y-5">
                           <!-- A+ -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>A+</span>
                                   <span>85%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2">
                                   <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                               </div>
                           </div>
                           <!-- A- -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>A-</span>
                                   <span class="text-red-500">15%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2 relative">
                                   <div class="bg-red-500 h-2 rounded-full" style="width: 15%"></div>
                                   <div class="absolute w-1 h-3 bg-red-600 top-[-2px] left-[20%] z-10"></div> <!-- Critical Threshold Line -->
                               </div>
                           </div>
                           <!-- B+ -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>B+</span>
                                   <span>62%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2">
                                   <div class="bg-yellow-400 h-2 rounded-full" style="width: 62%"></div>
                               </div>
                           </div>
                           <!-- B- -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>B-</span>
                                   <span>40%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2">
                                   <div class="bg-yellow-400 h-2 rounded-full" style="width: 40%"></div>
                               </div>
                           </div>
                           <!-- AB+ -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>AB+</span>
                                   <span class="text-red-500">22%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2">
                                   <div class="bg-red-500 h-2 rounded-full" style="width: 22%"></div>
                               </div>
                           </div>
                            <!-- AB- -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>AB-</span>
                                   <span class="text-red-600">8%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2 relative">
                                   <div class="bg-red-600 h-2 rounded-full" style="width: 8%; animation: pulse 2s infinite;"></div>
                               </div>
                           </div>
                           <!-- O+ -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>O+</span>
                                   <span>94%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2">
                                   <div class="bg-green-500 h-2 rounded-full" style="width: 94%"></div>
                               </div>
                           </div>
                           <!-- O- -->
                           <div>
                               <div class="flex justify-between text-sm font-bold text-gray-700 mb-1">
                                   <span>O-</span>
                                   <span class="text-red-600">5%</span>
                               </div>
                               <div class="w-full bg-gray-100 rounded-full h-2">
                                   <div class="bg-red-600 h-2 rounded-full" style="width: 5%; animation: pulse 2s infinite;"></div>
                               </div>
                           </div>
                       </div>
                       
                       <div class="mt-6 p-3 bg-red-50 rounded-xl border border-red-100 flex items-start gap-3">
                           <svg class="w-5 h-5 text-red-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                           <p class="text-xs text-red-800 font-medium"><strong>Alerte :</strong> Les stocks pour AB- et O- sont sous le seuil critique de 10%. Mobilisez sur les donneurs correspondants.</p>
                       </div>
                  </div>
              </div>

              <!-- Recent Appointments Table -->
              <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden flex-1">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white z-10">
                        <h2 class="text-lg font-bold text-gray-900">Derniers rendez-vous</h2>
                        <a href="#" class="text-sm font-bold text-red-600 hover:text-red-700 transition">Voir tout</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100">
                                    <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Donneur</th>
                                    <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Groupe Sanguin</th>
                                    <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider hidden sm:table-cell">Heure</th>
                                    <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(appt, index) in mockAppointments" :key="index" class="border-b border-gray-50 hover:bg-gray-50 transition">
                                    <td class="py-4 px-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs font-bold overflow-hidden">
                                            <span v-if="!appt.avatar">{{ appt.name.substring(0,2).toUpperCase() }}</span>
                                            <img v-else :src="appt.avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div class="font-bold text-gray-900 text-sm">{{ appt.name }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-gray-100 text-gray-800 border border-gray-200"
                                              :class="{'text-red-700 bg-red-50 border-red-200': appt.bloodType.includes('-')}">
                                            {{ appt.bloodType }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 hidden sm:table-cell">
                                        <p class="text-gray-600 text-sm font-medium">{{ appt.time }}</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full" :class="appt.status === 'Confirmé' ? 'bg-green-500' : (appt.status === 'En attente' ? 'bg-yellow-400' : 'bg-red-500')"></span>
                                            <span class="text-sm font-medium text-gray-700">{{ appt.status }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                         <button class="text-gray-400 hover:text-gray-900 transition-colors">
                                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                         </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
          
          <!-- CAMPAIGNS TAB (Generate Campaign Link) -->
          <div v-if="currentTab === 'campaigns'" class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8 max-w-3xl mx-auto">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Générer un appel au don (Campagne)</h2>
              <form @submit.prevent="createCampaign" class="space-y-6">
                  <div>
                      <label class="block text-sm font-bold text-gray-700 mb-2">Titre de la campagne</label>
                      <input v-model="newCampaign.title" type="text" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 p-3" placeholder="Ex: Urgence Sang O- Accident de la route">
                  </div>
                  <div>
                      <label class="block text-sm font-bold text-gray-700 mb-2">Description / Message</label>
                      <textarea v-model="newCampaign.description" rows="3" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 p-3" placeholder="Texte d'accompagnement pour les réseaux sociaux..."></textarea>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <div>
                          <label class="block text-sm font-bold text-gray-700 mb-2">Niveau d'urgence</label>
                          <select v-model="newCampaign.urgency_level" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 p-3">
                              <option value="normale">Normale</option>
                              <option value="urgente">Urgente</option>
                              <option value="critique">Critique (Vital)</option>
                          </select>
                      </div>
                      <div>
                          <label class="block text-sm font-bold text-gray-700 mb-2">Objectif (Nombre de donneurs)</label>
                          <input v-model.number="newCampaign.expected_donors_count" type="number" min="1" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 p-3" placeholder="Ex: 50">
                      </div>
                  </div>
                  <div>
                      <label class="block text-sm font-bold text-gray-700 mb-2">Groupes sanguins recherchés</label>
                      <div class="flex flex-wrap gap-3">
                          <label v-for="bt in ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']" :key="bt" class="flex items-center gap-2 bg-gray-50 px-3 py-2 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100">
                              <input type="checkbox" :value="bt" v-model="newCampaign.blood_types_needed" class="text-red-600 focus:ring-red-500 rounded">
                              <span class="text-sm font-bold text-gray-700">{{ bt }}</span>
                          </label>
                      </div>
                  </div>
                  
                  <button type="submit" :disabled="isCreatingCampaign" class="w-full bg-red-600 hover:bg-red-700 disabled:opacity-50 text-white font-bold py-3 px-4 rounded-xl transition duration-200 flex items-center justify-center gap-2 shadow-lg shadow-red-600/30">
                      <svg v-if="isCreatingCampaign" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                      {{ isCreatingCampaign ? 'Génération en cours...' : 'Générer le lien de campagne' }}
                  </button>
              </form>
              
              <!-- Result Link -->
              <div v-if="generatedLink" class="mt-8 p-6 bg-green-50 rounded-xl border border-green-200 relative overflow-hidden">
                  <div class="absolute top-0 right-0 p-4">
                      <svg class="w-16 h-16 text-green-500 opacity-20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                  </div>
                  <h3 class="text-green-800 font-bold text-lg mb-2 relative z-10">Campagne générée avec succès !</h3>
                  <p class="text-sm text-green-700 mb-4 relative z-10">Partagez ce lien sur WhatsApp, Facebook ou par SMS pour mobiliser les donneurs :</p>
                  
                  <div class="flex items-center gap-2 relative z-10">
                      <div class="bg-white border border-green-300 rounded-lg p-3 text-sm text-gray-800 font-medium flex-1 truncate select-all">
                          {{ generatedLink }}
                      </div>
                      <button @click="copyLink" class="bg-green-600 hover:bg-green-700 text-white p-3 rounded-lg flex-shrink-0 transition flex items-center gap-2 text-sm font-bold shadow-sm">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                          Copier
                      </button>
                  </div>
              </div>
              
              <!-- External Campaigns List -->
              <div class="mt-12">
                  <h3 class="text-xl font-bold text-gray-900 mb-4">Campagnes actives</h3>
                  <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                      <div class="overflow-x-auto">
                          <table class="w-full text-left">
                              <thead>
                                  <tr class="bg-gray-50 border-b border-gray-100">
                                      <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Titre</th>
                                      <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Objectif</th>
                                      <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Urgence</th>
                                      <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                                      <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="camp in campaigns" :key="camp.id" class="border-b border-gray-50 hover:bg-gray-50 transition">
                                      <td class="py-4 px-6 font-bold text-gray-900 text-sm">{{ camp.title }}</td>
                                      <td class="py-4 px-6 text-sm text-gray-600">{{ camp.expected_donors_count }} donneurs</td>
                                      <td class="py-4 px-6">
                                           <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold"
                                                 :class="{
                                                    'bg-green-100 text-green-800': camp.urgency_level === 'normale',
                                                    'bg-orange-100 text-orange-800': camp.urgency_level === 'urgente',
                                                    'bg-red-100 text-red-800 animate-pulse': camp.urgency_level === 'critique'
                                                 }">
                                               {{ camp.urgency_level }}
                                           </span>
                                      </td>
                                      <td class="py-4 px-6 text-sm text-gray-600">{{ new Date(camp.created_at).toLocaleDateString('fr-FR') }}</td>
                                      <td class="py-4 px-6 text-right space-x-2">
                                           <button @click="copyLinkDirect(camp.slug)" class="text-blue-500 hover:text-blue-700 font-bold text-xs bg-blue-50 px-3 py-1.5 rounded-lg transition-colors">
                                               Copier Lien
                                           </button>
                                           <button @click="deleteExistingCampaign(camp.id)" class="text-red-500 hover:text-red-700 font-bold text-xs bg-red-50 px-3 py-1.5 rounded-lg transition-colors">
                                               Supprimer
                                           </button>
                                      </td>
                                  </tr>
                                  <tr v-if="campaigns.length === 0">
                                      <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Aucune campagne active.</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          
          <!-- USERS TAB -->
          <div v-if="currentTab === 'users'" class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
               <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white">
                   <h2 class="text-xl font-bold text-gray-900">Liste des Donneurs</h2>
               </div>
               <div class="overflow-x-auto">
                   <table class="w-full text-left">
                       <thead>
                           <tr class="bg-gray-50 border-b border-gray-100">
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Nom</th>
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Groupe Sanguin</th>
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Téléphone</th>
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr v-for="user in users" :key="user.id" class="border-b border-gray-50 hover:bg-gray-50 transition">
                               <td class="py-4 px-6 font-bold text-gray-900 text-sm">{{ user.name }}</td>
                               <td class="py-4 px-6 text-sm text-gray-600">{{ user.email }}</td>
                               <td class="py-4 px-6">
                                   <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-red-50 text-red-700 border border-red-200">
                                       {{ user.blood_type || 'N/A' }}
                                   </span>
                               </td>
                               <td class="py-4 px-6 text-sm text-gray-600">{{ user.phone || 'Non renseigné' }}</td>
                               <td class="py-4 px-6 text-right">
                                    <button @click="deleteUser(user.id)" class="text-red-500 hover:text-red-700 font-bold text-xs bg-red-50 px-3 py-1.5 rounded-lg transition-colors">
                                        Bannir
                                    </button>
                               </td>
                           </tr>
                           <tr v-if="users.length === 0">
                               <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Aucun donneur inscrit pour le moment.</td>
                           </tr>
                       </tbody>
                   </table>
               </div>
          </div>

          <!-- APPOINTMENTS TAB -->
          <div v-if="currentTab === 'appointments'" class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
               <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white">
                   <h2 class="text-xl font-bold text-gray-900">Tous les Rendez-vous</h2>
               </div>
               <div class="overflow-x-auto">
                   <table class="w-full text-left">
                       <thead>
                           <tr class="bg-gray-50 border-b border-gray-100">
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Donneur</th>
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Centre</th>
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Date & Heure</th>
                               <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Statut</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr v-for="appt in appointments" :key="appt.id" class="border-b border-gray-50 hover:bg-gray-50 transition">
                               <td class="py-4 px-6 font-bold text-gray-900 text-sm">{{ appt.donor ? appt.donor.name : 'Inconnu' }}</td>
                               <td class="py-4 px-6 text-sm text-gray-600">{{ appt.donation_center ? appt.donation_center.name : 'N/A' }}</td>
                               <td class="py-4 px-6 text-sm text-gray-600 font-medium">
                                    {{ new Date(appt.appointment_date).toLocaleDateString('fr-FR') }} à {{ appt.appointment_time }}
                               </td>
                               <td class="py-4 px-6">
                                   <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold"
                                         :class="{
                                            'bg-yellow-100 text-yellow-800': appt.status === 'scheduled',
                                            'bg-green-100 text-green-800': appt.status === 'completed',
                                            'bg-red-100 text-red-800': appt.status === 'cancelled'
                                         }">
                                       {{ appt.status === 'scheduled' ? 'Prévu' : (appt.status === 'completed' ? 'Complété' : 'Annulé') }}
                                   </span>
                               </td>
                           </tr>
                           <tr v-if="appointments.length === 0">
                               <td colspan="4" class="py-8 text-center text-gray-500 text-sm">Aucun rendez-vous trouvé.</td>
                           </tr>
                       </tbody>
                   </table>
               </div>
          </div>

          <!-- STOCKS TAB -->
          <div v-if="currentTab === 'stocks'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
               <div v-for="stock in bloodStocks" :key="stock.id" class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4">
                        <span class="w-3 h-3 rounded-full inline-block" :class="stock.quantity < stock.critical_threshold ? 'bg-red-600 animate-pulse' : (stock.quantity < stock.ideal_threshold ? 'bg-yellow-400' : 'bg-green-500')"></span>
                    </div>
                    <div class="w-20 h-20 mx-auto rounded-full flex items-center justify-center font-black text-3xl mb-4 border-4"
                         :class="stock.blood_type.includes('-') ? 'bg-red-50 text-red-600 border-red-100' : 'bg-gray-50 text-gray-800 border-gray-100'">
                        {{ stock.blood_type }}
                    </div>
                    <h3 class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-1">Stock Actuel</h3>
                    <p class="text-4xl font-black text-gray-900 mb-6">{{ stock.quantity }} <span class="text-lg font-medium text-gray-400">poches</span></p>
                    
                    <div class="bg-gray-50 p-4 rounded-xl text-sm flex justify-between">
                        <div>
                            <p class="text-gray-400 font-medium">Seuil Critique</p>
                            <p class="font-bold text-red-600">{{ stock.critical_threshold }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 font-medium">Idéal</p>
                            <p class="font-bold text-green-600">{{ stock.ideal_threshold }}</p>
                        </div>
                    </div>
               </div>
          </div>
          
          <!-- SETTINGS (Placeholder) -->
          <div v-if="currentTab === 'settings'" class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8 text-center py-20">
               <div class="inline-flex w-20 h-20 rounded-full bg-gray-100 items-center justify-center text-gray-400 mb-6">
                   <!-- Icon settings -->
                   <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
               </div>
               <h2 class="text-2xl font-bold text-gray-900 mb-2">Paramètres de l'application</h2>
               <p class="text-gray-500 max-w-md mx-auto">Configuration globale, maintenance et gestion des accès prochainement disponibles.</p>
          </div>

      </div>
    </main>
  </div>
</template>

<script>
import axios from 'axios';

// Mock logic specifically tailored for the blood donation administrative view
export default {
    data() {
        return {
            user: { name: 'Admin', role: 'admin' },
            currentTab: 'dashboard',
            tabTitles: {
                dashboard: 'Vue d\'ensemble',
                users: 'Donneurs',
                appointments: 'Rendez-vous',
                campaigns: 'Campagnes d\'Appel au Don',
                stocks: 'Stocks de sang',
                settings: 'Paramètres'
            },
            stats: {
                total_donations_month: '0',
                new_donors: '0',
                appointments_today: '0',
                low_stock_alerts: '0'
            },
            mockAppointments: [],
            newCampaign: {
                title: '',
                description: '',
                urgency_level: 'normale',
                expected_donors_count: 50,
                blood_types_needed: []
            },
            isCreatingCampaign: false,
            generatedLink: null,
            users: [],
            appointments: [],
            bloodStocks: [],
            campaigns: []
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
        }
        this.fetchStats();
        this.fetchUsers();
        this.fetchAppointments();
        this.fetchBloodStocks();
        this.fetchCampaigns();
    },
    methods: {
        async fetchStats() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/admin/dashboard/stats', {
                    headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                });
                if (response.data) {
                    this.stats.total_donations_month = response.data.total_completed_donations;
                    this.stats.new_donors = response.data.total_users;
                    // Mocking appointments and stock alerts for now since backend doesn't return exactly these yet
                    this.stats.appointments_today = '42'; 
                    this.stats.low_stock_alerts = '3';
                }
            } catch (error) {
                console.error('Failed to fetch stats:', error);
            }
        },
        async fetchUsers() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/admin/users?role=donateur', {
                    headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                });
                this.users = response.data.data; // Paginated response
            } catch (error) {
                console.error('Failed to fetch users:', error);
            }
        },
        async deleteUser(id) {
            if (confirm("Êtes-vous sûr de vouloir bannir ce donneur ?")) {
                try {
                    await axios.delete(`http://127.0.0.1:8000/api/admin/users/${id}`, {
                        headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                    });
                    this.fetchUsers();
                } catch (error) {
                     console.error('Failed to ban user:', error);
                }
            }
        },
        async fetchAppointments() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/admin/appointments', {
                    headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                });
                this.appointments = response.data.data; // Paginated response
                
                // Also update the dashboard mock list for recent appointments
                this.mockAppointments = this.appointments.slice(0, 5).map(a => ({
                    name: a.donor ? a.donor.name : 'Inconnu',
                    bloodType: a.donor ? (a.donor.blood_type || '?') : '?',
                    time: `${new Date(a.appointment_date).toLocaleDateString('fr-FR')} ${a.appointment_time}`,
                    status: a.status === 'scheduled' ? 'En attente' : (a.status === 'completed' ? 'Confirmé' : 'Annulé'),
                    avatar: null
                }));
                
            } catch (error) {
                console.error('Failed to fetch appointments:', error);
            }
        },
        async fetchBloodStocks() {
             try {
                const response = await axios.get('http://127.0.0.1:8000/api/admin/blood-stocks', {
                    headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                });
                this.bloodStocks = response.data;
            } catch (error) {
                console.error('Failed to fetch blood stocks:', error);
            }
        },
        async createCampaign() {
            this.isCreatingCampaign = true;
            this.generatedLink = null;
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/admin/campaigns', this.newCampaign, {
                    headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                });
                
                if (response.data.link) {
                    this.generatedLink = response.data.link;
                    // Reset form partially
                    this.newCampaign.title = '';
                    this.newCampaign.description = '';
                    this.fetchCampaigns();
                }
            } catch (error) {
                console.error('Failed to create campaign:', error);
                
                let errorMessage = "Erreur lors de la création de la campagne.";
                if (error.response && error.response.data) {
                    if (error.response.data.errors) {
                        // Gather validation errors
                        const errors = Object.values(error.response.data.errors).flat().join('\n');
                        errorMessage += "\nDétails :\n" + errors;
                    } else if (error.response.data.message) {
                        errorMessage += "\nDétails : " + error.response.data.message;
                    }
                }
                
                alert(errorMessage);
            } finally {
                this.isCreatingCampaign = false;
            }
        },
        async fetchCampaigns() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/admin/campaigns', {
                    headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                });
                this.campaigns = response.data.data;
            } catch (error) {
                console.error('Failed to fetch campaigns:', error);
            }
        },
        async deleteExistingCampaign(id) {
            if (confirm("Voulez-vous vraiment supprimer cette campagne ?")) {
                try {
                    await axios.delete(`http://127.0.0.1:8000/api/admin/campaigns/${id}`, {
                        headers: { 'Authorization': `Bearer ${localStorage.getItem('access_token')}` }
                    });
                    this.fetchCampaigns();
                } catch (error) {
                     console.error('Failed to delete campaign:', error);
                }
            }
        },
        copyLinkDirect(slug) {
            const link = window.location.origin + '/campaign/' + slug;
            navigator.clipboard.writeText(link);
            alert("Lien copié dans le presse-papiers !");
        },
        copyLink() {
            if (this.generatedLink) {
                navigator.clipboard.writeText(this.generatedLink);
                alert("Lien copié dans le presse-papiers !");
            }
        },
        logout() {
            localStorage.clear();
            this.$router.push('/login');
        }
    }
}
</script>

<style scoped>
/* Scoped styles kept minimal, mostly Tailwind driven now */
</style>
