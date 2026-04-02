<template>
<div class="min-h-screen bg-pink-50 flex items-center justify-center p-4">
    <div v-if="loading" class="text-center text-gray-500">Chargement...</div>
    
    <div v-else-if="campaign" class="w-full max-w-4xl bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        <!-- Event Info Side -->
        <div class="md:w-1/2 p-8 md:p-12 bg-gradient-to-br from-[#E8A0BF] to-pink-400 text-white flex flex-col justify-between">
            <div>
                 <span class="bg-white/20 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide backdrop-blur-sm">{{ campaign.type }}</span>
                <h1 class="text-4xl font-bold mt-4 mb-2">{{ campaign.title }}</h1>
                <p class="text-pink-100 text-lg leading-relaxed">{{ campaign.description }}</p>
            </div>
             <div class="mt-8">
                <p class="text-sm opacity-80 mb-1">Code Secret (si applicable)</p>
                <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm font-mono text-center tracking-widest text-xl">
                    {{ campaign.secret_code }}
                </div>
            </div>
        </div>

        <!-- Donation Form Side -->
        <div class="md:w-1/2 p-8 md:p-12 bg-white">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Faire un don</h2>
            
            <form @submit.prevent="makeDonation" class="space-y-4 text-gray-700">
                <div>
                    <label class="block text-sm font-medium mb-1">Votre Nom (Optionnel)</label>
                    <input v-model="donation.donor_name" type="text" placeholder="Anonyme" class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-300 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Montant (FCFA)</label>
                     <div class="grid grid-cols-3 gap-2 mb-2">
                        <button type="button" @click="donation.amount = 1000" class="border py-2 rounded-lg hover:bg-pink-50 text-sm">1.000</button>
                        <button type="button" @click="donation.amount = 5000" class="border py-2 rounded-lg hover:bg-pink-50 text-sm">5.000</button>
                        <button type="button" @click="donation.amount = 10000" class="border py-2 rounded-lg hover:bg-pink-50 text-sm">10.000</button>
                    </div>
                    <input v-model="donation.amount" type="number" required placeholder="Montant libre" class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-300 outline-none font-bold text-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Message de soutien</label>
                    <textarea v-model="donation.message" rows="3" placeholder="Félicitations !..." class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-300 outline-none"></textarea>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border flex items-center gap-3">
                    <div class="bg-white p-2 rounded-lg">
                        <qrcode-vue :value="currentUrl" :size="100" level="H" />
                    </div>
                    <div>
                        <p class="text-sm font-bold">Payer par Mobile Money</p>
                        <p class="text-xs text-gray-500">Orange / MTN / Moov</p>
                         <button type="button" @click="copyLink" class="text-xs text-pink-500 font-bold hover:underline mt-1">
                            Copier le lien
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#E8A0BF] hover:bg-[#D98CAF] text-white font-bold py-4 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                    Envoyer le Don
                </button>
            </form>
        </div>
    </div>
    
    <div v-else class="text-center text-red-500">Événement introuvable 😢</div>
</div>
</template>

<script>
import api from '@/services/api';
import QrcodeVue from 'qrcode.vue';

export default {
    components: {
      QrcodeVue,
    },
    data() {
        return {
            loading: true,
            campaign: null,
            donation: {
                donor_name: '',
                amount: null,
                message: ''
            },
            currentUrl: window.location.href
        }
    },
    async mounted() {
        const slug = this.$route.params.slug;
        try {
            // Use public endpoint
            const response = await api.get(`/public/campaign/${slug}`);
            this.campaign = response.data;
        } catch (error) {
            console.error("Erreur:", error);
        } finally {
            this.loading = false;
        }
    },
    methods: {
        async makeDonation() {
            if (!this.donation.amount || this.donation.amount <= 0) {
                alert("Montant invalide");
                return;
            }
            try {
                await api.post('/public/donate', {
                    campaign_slug: this.campaign.slug,
                    ...this.donation
                });
                alert('Merci pour votre don ! 💖');
                this.donation = { donor_name: '', amount: null, message: '' };
            } catch (error) {
                alert('Erreur lors du don :(');
            }
        },
        copyLink() {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(this.currentUrl).then(() => {
                    alert('Lien copié dans le presse-papier !');
                }).catch(err => {
                    console.error('Erreur de copie (clipboard API): ', err);
                    this.fallbackCopyTextToClipboard(this.currentUrl);
                });
            } else {
                this.fallbackCopyTextToClipboard(this.currentUrl);
            }
        },
        fallbackCopyTextToClipboard(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;
            
            // Avoid scrolling to bottom
            textArea.style.top = "0";
            textArea.style.left = "0";
            textArea.style.position = "fixed";

            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                var successful = document.execCommand('copy');
                if (successful) {
                    alert('Lien copié dans le presse-papier !');
                } else {
                    alert('Impossible de copier le lien automatiquement.');
                }
            } catch (err) {
                console.error('Erreur de copie (fallback): ', err);
                alert('Impossible de copier le lien. Veuillez le faire manuellement.');
            }

            document.body.removeChild(textArea);
        }
    }
}
</script>
