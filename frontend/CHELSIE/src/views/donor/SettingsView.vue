<template>
  <div class="p-6 md:p-8 lg:p-10 max-w-3xl mx-auto w-full">
    <div class="mb-8">
      <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Paramètres du compte</h1>
      <p class="text-gray-500 mt-1 font-medium">Mettez à jour vos informations personnelles.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <form @submit.prevent="updateProfile" class="space-y-6">
           
           <div class="flex items-center gap-6 mb-8 pb-8 border-b border-gray-100">
              <img src="https://ui-avatars.com/api/?name=User&background=fee2e2&color=dc2626&size=128" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-md">
              <div>
                 <h2 class="text-xl font-bold text-gray-900">{{ form.name || 'Votre Nom' }}</h2>
                 <p class="text-gray-500 font-medium">{{ form.email }}</p>
                 <span class="inline-block mt-2 px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full border border-red-200">
                    Groupe Sanguin: {{ form.blood_type || 'Non renseigné' }}
                 </span>
              </div>
           </div>

           <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Name -->
              <div>
                 <label class="block text-sm font-bold text-gray-700 mb-2">Nom complet</label>
                 <input v-model="form.name" type="text" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
              </div>

              <!-- Email -->
              <div>
                 <label class="block text-sm font-bold text-gray-700 mb-2">Adresse email</label>
                 <input v-model="form.email" type="email" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
              </div>

              <!-- Phone -->
              <div>
                 <label class="block text-sm font-bold text-gray-700 mb-2">Téléphone</label>
                 <input v-model="form.phone" type="text" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors" placeholder="Ex: +33 6 12 34 56 78">
              </div>

              <!-- Blood Type -->
              <div>
                 <label class="block text-sm font-bold text-gray-700 mb-2">Groupe sanguin</label>
                 <select v-model="form.blood_type" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
                    <option value="">Je ne sais pas</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                 </select>
              </div>

              <!-- Password -->
              <div class="md:col-span-2 pt-6 border-t border-gray-100">
                 <h3 class="text-lg font-bold text-gray-900 mb-4">Changer de mot de passe (Optionnel)</h3>
              </div>

              <div>
                 <label class="block text-sm font-bold text-gray-700 mb-2">Nouveau mot de passe</label>
                 <input v-model="form.password" type="password" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
              </div>
              
              <div>
                 <label class="block text-sm font-bold text-gray-700 mb-2">Confirmer le mot de passe</label>
                 <input v-model="form.password_confirmation" type="password" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
              </div>
           </div>

           <div class="mt-8 flex justify-end">
              <button type="submit" :disabled="isLoading" class="px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-md shadow-red-600/20 transition-all active:scale-95 flex items-center gap-2">
                 <svg v-if="isLoading" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                 Enregistrer les modifications
              </button>
           </div>
        </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                blood_type: '',
                password: '',
                password_confirmation: ''
            },
            isLoading: false
        }
    },
    mounted() {
        const userData = localStorage.getItem('user');
        if (userData) {
            try {
                const user = JSON.parse(userData);
                this.form.name = user.name || '';
                this.form.email = user.email || '';
                this.form.phone = user.phone || '';
                this.form.blood_type = user.blood_type || '';
            } catch(e) {
                console.error("User parsing error", e);
            }
        }
    },
    methods: {
        async updateProfile() {
            if(this.form.password && this.form.password !== this.form.password_confirmation) {
                Swal.fire('Erreur', 'Les mots de passe ne correspondent pas.', 'error');
                return;
            }

            this.isLoading = true;
            try {
                const token = localStorage.getItem('access_token');
                const response = await axios.put('http://127.0.0.1:8000/api/user', this.form, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                // Update local storage
                localStorage.setItem('user', JSON.stringify(response.data.user));
                
                // Clear password fields
                this.form.password = '';
                this.form.password_confirmation = '';

                Swal.fire('Succès', 'Votre profil a été mis à jour.', 'success');
                
                // Trigger a generic event or direct update for the layout to know (e.g. reload for simplicity or emit)
                window.location.reload();
            } catch(error) {
                let msg = 'Une erreur est survenue.';
                if(error.response?.data?.message) {
                    msg = error.response.data.message;
                }
                Swal.fire('Erreur', msg, 'error');
            } finally {
                this.isLoading = false;
            }
        }
    }
}
</script>
