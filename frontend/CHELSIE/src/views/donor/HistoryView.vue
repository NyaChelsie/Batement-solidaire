<template>
  <div class="p-6 md:p-8 lg:p-10 max-w-7xl mx-auto w-full">
    <div class="mb-8">
      <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Historique des dons</h1>
      <p class="text-gray-500 mt-1 font-medium">Retrouvez la liste de tous vos actes de générosité passés.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50">
                        <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Date</th>
                        <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Centre de don</th>
                        <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="donations.length === 0">
                       <td colspan="3" class="py-8 px-6 text-center text-gray-500">Aucun don enregistré pour le moment.</td>
                    </tr>
                    <tr v-for="donation in donations" :key="donation.id" class="border-b border-gray-50 hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <p class="font-bold text-gray-900">{{ formatDate(donation.appointment_date) }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <p class="font-bold text-gray-800">{{ donation.donation_center?.name || 'Indéfini' }}</p>
                            <p class="text-sm text-gray-500">{{ donation.donation_center?.city }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold" 
                                  :class="donation.status === 'completed' ? 'bg-green-100 text-green-800' : (donation.status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')">
                                {{ donation.status === 'completed' ? 'Complété' : (donation.status === 'cancelled' ? 'Annulé' : donation.status) }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            donations: []
        }
    },
    mounted() {
        this.fetchHistory();
    },
    methods: {
        async fetchHistory() {
            try {
                const token = localStorage.getItem('access_token');
                if(!token) return;
                const response = await axios.get('http://127.0.0.1:8000/api/appointments/my', {
                    headers: { 'Authorization': `Bearer ${token}` }
                });
                // We show completed and cancelled in history
                this.donations = response.data.filter(a => a.status !== 'scheduled');
            } catch (error) {
                console.error('Failed to fetch history:', error);
            }
        },
        formatDate(dateStr) {
            if (!dateStr) return '';
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(dateStr).toLocaleDateString('fr-FR', options);
        }
    }
}
</script>
