<template>
  <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgba(220,38,38,0.08)] border border-blood-100 p-6 sm:p-8 relative overflow-hidden group transition-all duration-300 hover:shadow-[0_12px_40px_rgba(220,38,38,0.12)] hover:-translate-y-1">
    
    <!-- Background pulse effect -->
    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-blood-50 rounded-full blur-3xl opacity-50 group-hover:bg-blood-100 transition-colors duration-500"></div>

    <div class="relative z-10">
      <!-- Header Label -->
      <div class="flex items-start justify-between mb-6">
        <div class="flex items-center gap-3">
          <div class="flex items-center justify-center w-8 h-8 rounded-xl bg-blood-100 text-blood-600 animate-pulse-slow">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
          </div>
          <span class="font-black tracking-widest text-xs uppercase text-blood-500 bg-blood-50 px-3 py-1 rounded-md">Urgence Vitale</span>
        </div>
        
        <span v-if="timeLeft" class="text-xs font-bold text-medic-500 flex items-center gap-1.5 bg-medic-50 px-2.5 py-1 rounded-md">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          {{ timeLeft }}
        </span>
      </div>

      <!-- Main Content -->
      <div class="mb-8">
        <h3 class="text-2xl font-black text-medic-900 tracking-tight leading-tight mb-2">
          {{ hospitalName }}
        </h3>
        <p class="text-medic-600 font-medium text-sm flex items-start gap-1.5">
          <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
          {{ location }}
        </p>
      </div>

      <!-- Blood Types Needed -->
      <div class="mb-8 p-4 bg-medic-50 rounded-2xl border border-medic-100 flex items-center justify-between">
        <span class="text-xs font-black uppercase tracking-widest text-medic-500">Groupes Requis</span>
        <div class="flex gap-2 flex-wrap justify-end">
          <span v-for="type in bloodTypes" :key="type" 
                class="w-10 h-10 flex items-center justify-center rounded-xl font-black text-sm bg-white text-blood-600 shadow-sm border border-blood-100 relative overflow-hidden group-hover:border-blood-300 transition-colors">
            <span class="relative z-10">{{ type }}</span>
            <div class="absolute inset-0 bg-blood-50 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
          </span>
        </div>
      </div>

      <!-- Matching & Action -->
      <div class="flex items-center justify-between mt-auto">
        <div class="flex flex-col">
          <span class="text-[10px] font-black uppercase tracking-widest text-emerald-500 mb-0.5">Compatibilité</span>
          <span class="text-sm font-bold text-medic-900 flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            {{ matchPercentage }}% Match
          </span>
        </div>
        
        <button @click="$emit('respond')" class="flex items-center gap-2 bg-blood-600 hover:bg-blood-700 text-white px-6 py-3 rounded-2xl font-bold text-sm transition-all shadow-md shadow-blood-600/20 active:scale-95">
          Intervenir
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </button>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: 'EmergencyCard',
  props: {
    hospitalName: {
      type: String,
      required: true,
      default: "Hôpital Général"
    },
    location: {
      type: String,
      required: true,
      default: "Douala, Cameroun"
    },
    bloodTypes: {
      type: Array,
      required: true,
      default: () => ['O-', 'A-']
    },
    timeLeft: {
      type: String,
      default: "Il y a 2h"
    },
    matchPercentage: {
      type: Number,
      default: 100
    }
  }
}
</script>

<style scoped>
.animate-pulse-slow {
  animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>
