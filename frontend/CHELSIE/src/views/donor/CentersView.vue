<template>
  <div class="p-6 md:p-8 lg:p-10 max-w-7xl mx-auto w-full">
    <div class="mb-8">
      <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Centres de collecte</h1>
      <p class="text-gray-500 mt-1 font-medium">Trouvez le centre de don le plus proche de chez vous.</p>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-8 flex gap-4">
       <div class="flex-1">
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Rechercher par ville</label>
           <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              </span>
              <input v-model="searchCity" @input="fetchCenters" type="text" placeholder="Entrez une ville..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
           </div>
       </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="center in centers" :key="center.id" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow flex flex-col">
            <div class="h-32 bg-gray-100 relative">
               <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=400&h=200" class="w-full h-full object-cover">
               <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
               <h3 class="absolute bottom-4 left-4 text-white font-bold text-lg max-w-[80%] leading-tight">{{ center.name }}</h3>
            </div>
            <div class="p-6 flex-1 flex flex-col">
                <p class="text-gray-600 mb-4 flex items-start gap-2 text-sm">
                   <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                   <span>{{ center.address }}<br><span class="font-bold border-b border-gray-300">{{ center.city }}</span></span>
                </p>
            </div>
        </div>
        
        <div v-if="centers.length === 0" class="col-span-full py-12 text-center text-gray-500 bg-white rounded-2xl border border-dashed border-gray-300">
           Aucun centre trouvé pour cette recherche.
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            centers: [],
            searchCity: ''
        }
    },
    mounted() {
        this.fetchCenters();
    },
    methods: {
        async fetchCenters() {
            try {
                const token = localStorage.getItem('access_token');
                let url = 'http://127.0.0.1:8000/api/donation-centers';
                if(this.searchCity) {
                    url += `?city=${this.searchCity}`;
                }
                const response = await axios.get(url, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });
                this.centers = response.data;
            } catch (error) {
                console.error('Failed to fetch centers:', error);
            }
        }
    }
}
</script>
