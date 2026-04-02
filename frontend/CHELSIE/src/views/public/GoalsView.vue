<template>
  <div class="min-h-screen bg-[#0a1128] text-white">
    
    <!-- Navbar (Simplified) -->
    <nav class="fixed w-full z-50 bg-[#0a1128]/80 backdrop-blur-xl border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <router-link to="/" class="flex items-center gap-3">
                <span class="text-3xl">🌍</span>
                <span class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-cyan-400">EventDon</span>
            </router-link>
            <router-link to="/" class="text-gray-400 hover:text-white transition">Retour</router-link>
        </div>
    </nav>

    <div class="pt-32 pb-24 px-6 max-w-7xl mx-auto">
        
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-black mb-6">Nos Objectifs d'Impact</h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">Nous concentrons nos efforts sur 6 causes essentielles pour transformer des vies, un événement à la fois.</p>
        </div>

        <div v-if="loading" class="text-center text-gray-500 py-20">Chargement des objectifs...</div>

        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div v-for="obj in objectives" :key="obj.id" class="group relative bg-white/5 backdrop-blur-md border border-white/10 rounded-3xl overflow-hidden hover:bg-white/10 transition-all duration-300 hover:-translate-y-2">
                <!-- Color Strip -->
                <div class="h-2 w-full" :style="{ backgroundColor: obj.color }"></div>
                
                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-16 h-16 rounded-2xl bg-white/5 flex items-center justify-center text-4xl shadow-inner border border-white/5">
                            {{ obj.icon }}
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Fonds levés</p>
                            <p class="text-lg font-bold" :style="{ color: obj.color }">{{ formatCurrency(obj.total_raised) }}</p>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold mb-3 group-hover:text-white transition-colors">{{ obj.title }}</h3>
                    <p class="text-gray-400 mb-8 leading-relaxed h-12 line-clamp-2">{{ obj.description }}</p>

                    <router-link :to="`/objectives/${obj.id}`" class="inline-flex items-center gap-2 text-sm font-bold hover:gap-3 transition-all" :style="{ color: obj.color }">
                        Voir les projets <span class="text-lg">→</span>
                    </router-link>
                </div>
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
            objectives: [],
            loading: true
        }
    },
    async mounted() {
        try {
            const response = await api.get('/public/objectives');
            this.objectives = response.data;
        } catch (error) {
            console.error("Erreur chargement objectifs:", error);
        } finally {
            this.loading = false;
        }
    },
    methods: {
         formatCurrency(amount) {
            return new Intl.NumberFormat('fr-CM', { style: 'currency', currency: 'XAF', maximumFractionDigits: 0 }).format(amount);
        }
    }
}
</script>
