<<<<<<< HEAD
const colors = require('tailwindcss/colors');

=======
/** @type {import('tailwindcss').Config} */
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
<<<<<<< HEAD
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
      colors: {
        blood: colors.red,
        medic: colors.slate,
      },
      animation: {
        'heartbeat': 'heartbeat 2s ease-in-out infinite',
        'fade-up': 'fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards',
      },
      keyframes: {
        heartbeat: {
          '0%, 100%': { transform: 'scale(1)' },
          '15%': { transform: 'scale(1.03)' },
          '30%': { transform: 'scale(1)' },
          '45%': { transform: 'scale(1.03)' },
          '60%': { transform: 'scale(1)' },
        },
        fadeUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        }
      }
    },
=======
    extend: {},
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
  },
  plugins: [],
}

