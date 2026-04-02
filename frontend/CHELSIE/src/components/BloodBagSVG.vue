<template>
  <svg viewBox="0 0 200 300" xmlns="http://www.w3.org/2000/svg" class="w-full h-full drop-shadow-2xl">
    <defs>
      <!-- Glossy Gradient for the Blood Bag -->
      <linearGradient id="bagGradient" x1="0%" y1="0%" x2="100%" y2="100%">
        <stop offset="0%" stop-color="#ffffff" stop-opacity="0.9"/>
        <stop offset="50%" stop-color="#fdfdfd" stop-opacity="0.6"/>
        <stop offset="100%" stop-color="#e0e0e0" stop-opacity="0.8"/>
      </linearGradient>

      <!-- Vibrant Deep Blood Gradient -->
      <linearGradient id="bloodGradient" x1="0%" y1="100%" x2="100%" y2="0%">
        <stop offset="0%" stop-color="#7a0000"/>
        <stop offset="50%" stop-color="#cc0000"/>
        <stop offset="100%" stop-color="#ff1a1a"/>
      </linearGradient>

      <!-- Outer Shadow for 3D Effect -->
      <filter id="shadow" x="-10%" y="-10%" width="130%" height="130%">
        <feDropShadow dx="0" dy="15" stdDeviation="15" flood-color="#ef4444" flood-opacity="0.2"/>
      </filter>

      <!-- Glossy Reflection Highlights -->
      <linearGradient id="highlight" x1="0%" y1="0%" x2="100%" y2="100%">
        <stop offset="0%" stop-color="#ffffff" stop-opacity="0.7"/>
        <stop offset="30%" stop-color="#ffffff" stop-opacity="0.1"/>
        <stop offset="100%" stop-color="#ffffff" stop-opacity="0"/>
      </linearGradient>
    </defs>

    <g filter="url(#shadow)">
      <!-- Main Bag Outline -->
      <rect x="30" y="50" width="140" height="200" rx="20" fill="url(#bagGradient)" stroke="#d1d5db" stroke-width="2"/>
      
      <!-- Blood Fill -->
      <path d="M 32 120 Q 100 130 168 120 L 168 230 Q 168 248 150 248 L 50 248 Q 32 248 32 230 Z" fill="url(#bloodGradient)"/>

      <!-- Inner Glossy Reflection (Glass Effect) -->
      <path d="M 35 55 L 75 55 Q 85 75 60 120 Q 35 150 35 55" fill="url(#highlight)"/>
      <rect x="32" y="52" width="136" height="196" rx="18" fill="none" stroke="url(#highlight)" stroke-width="2"/>

      <!-- Bag Top Seam / Hang Loop -->
      <rect x="75" y="35" width="50" height="15" rx="5" fill="#e5e7eb" stroke="#d1d5db" stroke-width="2"/>
      <circle cx="100" cy="42.5" r="4" fill="#ffffff" />

      <!-- Tubes at Bottom -->
      <path d="M 70 250 L 70 280" stroke="#cbd5e1" stroke-width="6" stroke-linecap="round"/>
      <path d="M 100 250 L 100 290" stroke="#cbd5e1" stroke-width="6" stroke-linecap="round"/>
      <path d="M 130 250 L 130 270" stroke="#cbd5e1" stroke-width="6" stroke-linecap="round"/>
      
      <!-- Medical Cross / Label -->
      <rect x="65" y="70" width="70" height="35" rx="4" fill="#ffffff" stroke="#e5e7eb" stroke-width="1"/>
      <!-- Cross red -->
      <rect x="94" y="75" width="12" height="25" fill="#ef4444" rx="2"/>
      <rect x="87.5" y="81.5" width="25" height="12" fill="#ef4444" rx="2"/>
      
      <!-- Liquid Drops / Bubbles for realism -->
      <circle cx="140" cy="150" r="4" fill="#ffffff" fill-opacity="0.3"/>
      <circle cx="150" cy="170" r="2" fill="#ffffff" fill-opacity="0.4"/>
      <circle cx="60" cy="200" r="3.5" fill="#ffffff" fill-opacity="0.2"/>
    </g>
  </svg>
</template>

<script>
export default {
  name: 'BloodBagSVG'
}
</script>
