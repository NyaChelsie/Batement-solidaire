<template>
  <div class="min-h-screen bg-[#0a1128] text-white">
    
    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-[#0a1128]/80 backdrop-blur-xl border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <router-link to="/" class="flex items-center gap-3">
                <span class="text-3xl">🌍</span>
                <span class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-cyan-400">EventDon</span>
            </router-link>
             <router-link to="/" class="text-gray-400 hover:text-white transition font-bold">Retour</router-link>
        </div>
    </nav>

    <div class="pt-32 pb-24 px-6 max-w-7xl mx-auto">
        
        <div class="text-center mb-16">
            <span class="text-pink-500 font-bold uppercase tracking-widest text-xs mb-2 block">Devenez un Héros du Quotidien</span>
            <h1 class="text-4xl md:text-6xl font-black mb-6">Abonnements Impact 🚀</h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">Soutenez la plateforme et vos causes préférées chaque mois. Gagnez des points, débloquez des badges exclusifs et recevez des rapports d'impact détaillés.</p>
        </div>

        <!-- Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            
            <!-- Bronze Plan -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-8 relative hover:-translate-y-2 transition-transform duration-300">
                <h3 class="text-xl font-bold text-gray-300 mb-2">Petit Impact</h3>
                <div class="text-4xl font-black mb-6 text-white">1,000 <span class="text-base text-gray-500 font-normal">FCFA / mois</span></div>
                <ul class="space-y-4 mb-8 text-gray-300 text-sm">
                    <li class="flex items-center gap-2"><span class="text-green-400">✓</span> Soutien aux frais de plateforme</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✓</span> Badge "Supporter" sur votre profil</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✓</span> 100 Points Impact / mois</li>
                </ul>
                <button @click="subscribe(1000)" class="w-full py-3 rounded-xl border border-white/20 hover:bg-white/10 transition font-bold text-white">Choisir</button>
            </div>

            <!-- Silver Plan (Featured) -->
            <div class="bg-gradient-to-br from-pink-600/20 to-purple-600/20 border border-pink-500/50 rounded-3xl p-8 relative transform scale-105 shadow-2xl shadow-pink-900/40">
                <div class="absolute top-0 right-0 bg-pink-500 text-white text-[10px] font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider">Populaire</div>
                <h3 class="text-xl font-bold text-pink-400 mb-2">Impact Majeur</h3>
                <div class="text-5xl font-black mb-6 text-white">5,000 <span class="text-base text-gray-500 font-normal">FCFA / mois</span></div>
                <ul class="space-y-4 mb-8 text-white text-sm">
                    <li class="flex items-center gap-2"><span class="text-pink-400">✓</span> Tout du pack précédent</li>
                    <li class="flex items-center gap-2"><span class="text-pink-400">✓</span> Rapports d'impact mensuels</li>
                    <li class="flex items-center gap-2"><span class="text-pink-400">✓</span> Badge "Héros" Animé</li>
                    <li class="flex items-center gap-2"><span class="text-pink-400">✓</span> <strong>600 Points Impact</strong> / mois</li>
                </ul>
                <button @click="subscribe(5000)" class="w-full py-3 rounded-xl bg-gradient-to-r from-pink-500 to-purple-600 hover:shadow-lg hover:shadow-pink-500/40 transition font-bold text-white relative overflow-hidden">
                    S'abonner Maintenant
                </button>
            </div>

            <!-- Gold Plan -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-8 relative hover:-translate-y-2 transition-transform duration-300">
                <h3 class="text-xl font-bold text-yellow-400 mb-2">Légende</h3>
                <div class="text-4xl font-black mb-6 text-white">10,000 <span class="text-base text-gray-500 font-normal">FCFA / mois</span></div>
                <ul class="space-y-4 mb-8 text-gray-300 text-sm">
                    <li class="flex items-center gap-2"><span class="text-yellow-400">✓</span> Statut VIP & Support Prioritaire</li>
                    <li class="flex items-center gap-2"><span class="text-yellow-400">✓</span> Accès aux événements exclusifs</li>
                    <li class="flex items-center gap-2"><span class="text-yellow-400">✓</span> <strong>1500 Points Impact</strong> / mois</li>
                    <li class="flex items-center gap-2"><span class="text-yellow-400">✓</span> Cadeau annuel physique</li>
                </ul>
                <button @click="subscribe(10000)" class="w-full py-3 rounded-xl border border-white/20 hover:bg-white/10 transition font-bold text-white">Devenir une Légende</button>
            </div>

        </div>

    </div>

  </div>
</template>

<script>
import api from '@/services/api';

export default {
    methods: {
        async subscribe(amount) {
            const user = localStorage.getItem('user');
            if (!user) {
                this.$router.push('/login');
                return;
            }

            if (!confirm(`Confirmer l'abonnement à ${amount} FCFA / mois ?`)) return;

            try {
                await api.post('/subscribe', {
                    amount: amount,
                    frequency: 'monthly'
                });
                alert(`Merci ! Votre abonnement de ${amount} FCFA est activé ! 🎉`);
                this.$router.push('/donor-dashboard');
            } catch (error) {
                alert('Erreur: ' + (error.response?.data?.message || 'Erreur abonnement'));
            }
        }
    }
}
</script>
