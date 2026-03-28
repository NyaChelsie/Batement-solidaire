<template>
  <div class="min-h-screen bg-gradient-to-br from-red-50 to-gray-50 text-gray-800 font-sans relative overflow-hidden">
    
    <!-- Background Elements -->
    <div class="absolute top-[0%] left-[-10%] w-96 h-96 bg-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
    <div class="absolute top-[20%] right-[-5%] w-72 h-72 bg-rose-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
    
    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-white/70 backdrop-blur-xl border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <router-link to="/" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-600 text-white flex items-center justify-center shadow-md shadow-red-600/30">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" /></svg>
                </div>
                <span class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-rose-500">Batement Solidaire</span>
            </router-link>
            <div class="flex gap-6">
                <router-link to="/" class="text-gray-600 hover:text-red-600 transition font-bold">Accueil</router-link>
                <router-link to="/objectives" class="text-gray-600 hover:text-red-600 transition font-bold">Objectifs</router-link>
            </div>
        </div>
    </nav>

    <div class="pt-32 pb-24 px-6 max-w-4xl mx-auto relative z-10">
        
        <div class="text-center mb-12">
            <span class="text-red-600 font-bold uppercase tracking-widest text-xs mb-2 block">Témoignages & Impact</span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 text-gray-900 tracking-tight">L'Impact en Temps Réel</h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto font-medium">Suivez l'avancée des campagnes de don que vous avez soutenues. Des nouvelles fraîches, directement pour vous.</p>
        </div>

        <div v-if="loading" class="text-center py-20 flex flex-col items-center justify-center">
             <div class="w-12 h-12 border-4 border-red-500 border-t-transparent rounded-full animate-spin mb-4 shadow-lg shadow-red-500/20"></div>
             <p class="text-gray-500 font-medium">Chargement des témoignages...</p>
        </div>

        <div v-else class="space-y-8">
            <div v-for="update in updates" :key="update.id" class="bg-white/70 backdrop-blur-md border border-white/80 rounded-3xl overflow-hidden hover:shadow-[0_8px_30px_rgb(220,38,38,0.1)] hover:-translate-y-1 transition-all duration-300 shadow-[0_8px_20px_rgb(0,0,0,0.04)]">
                
                <!-- Header -->
                <div class="p-6 md:p-8 flex items-start gap-4 border-b border-gray-100 bg-white/50">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-500 to-rose-400 flex items-center justify-center font-bold text-xl text-white shadow-md shadow-red-500/30">
                        {{ update.campaign.title.charAt(0).toUpperCase() }}
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 hover:text-red-600 transition">
                            <router-link :to="`/p/${update.campaign.slug}`">{{ update.campaign.title }}</router-link>
                        </h3>
                        <p class="text-sm text-gray-500 font-medium">{{ formatDate(update.created_at) }}</p>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 md:p-8">
                    <h2 class="text-2xl font-bold mb-4 text-gray-900 tracking-tight">{{ update.title }}</h2>
                    <p class="text-gray-600 leading-relaxed whitespace-pre-line mb-6 text-lg">{{ update.content }}</p>

                    <div v-if="update.image_url" class="rounded-2xl overflow-hidden mb-6 border border-gray-100 shadow-sm">
                        <img :src="update.image_url" alt="Update Image" class="w-full object-cover max-h-[400px]">
                    </div>

                    <div class="flex justify-end">
                        <router-link :to="`/p/${update.campaign.slug}`" class="inline-flex items-center gap-2 text-red-600 font-bold hover:text-red-700 transition group bg-red-50 px-4 py-2 rounded-lg">
                            Voir le détail complet
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </router-link>
                    </div>
                </div>
            </div>
            
             <!-- Load More -->
            <div v-if="nextPageUrl" class="text-center pt-8">
                <button @click="loadMore" class="px-8 py-3 rounded-xl border border-red-200 hover:bg-red-50 hover:border-red-300 text-red-600 font-bold transition-all shadow-sm">
                    Charger plus de témoignages
                </button>
            </div>
            
            <div v-if="updates.length === 0" class="text-center py-20">
                <div class="inline-flex w-20 h-20 rounded-full bg-red-50 text-red-300 items-center justify-center mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <p class="text-gray-500 font-medium text-lg">Aucun témoignage pour le moment.</p>
                <p class="text-gray-400 text-sm mt-1">Revenez bientôt pour voir l'impact des campagnes.</p>
            </div>

        </div>
    </div>
  </div>
</template>

<script>
import api from '@/services/api';

export default {
    data() {
        return {
            updates: [],
            loading: true,
            nextPageUrl: null
        }
    },
    async mounted() {
        await this.fetchUpdates();
    },
    methods: {
        async fetchUpdates(url = '/public/updates') {
            try {
                this.loading = true;
                const response = await api.get(url);
                if (url === '/public/updates') {
                    this.updates = response.data.data;
                } else {
                    this.updates = [...this.updates, ...response.data.data];
                }
                this.nextPageUrl = response.data.next_page_url;
            } catch (error) {
                console.error("Erreur updates:", error);
            } finally {
                this.loading = false;
            }
        },
        loadMore() {
            if (this.nextPageUrl) {
                this.fetchUpdates(this.nextPageUrl);
            }
        },
        formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('fr-FR', options);
        }
    }
}
</script>
<style scoped>
@keyframes blob {
  0% { transform: translate(0px, 0px) scale(1); }
  33% { transform: translate(30px, -50px) scale(1.1); }
  66% { transform: translate(-20px, 20px) scale(0.9); }
  100% { transform: translate(0px, 0px) scale(1); }
}
.animate-blob {
  animation: blob 7s infinite;
}
.animation-delay-2000 {
  animation-delay: 2s;
}
.animation-delay-4000 {
  animation-delay: 4s;
}
</style>
