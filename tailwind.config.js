/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
],
theme: {
    extend: {
      keyframes: {
        'fade-in-up': {
          '0%': { opacity: 0, transform: 'translateY(20px)' },
          '100%': { opacity: 1, transform: 'translateY(0)' },
        },
        'text-glow': {
          '0%, 100%': { textShadow: '0 0 10px #3b82f6, 0 0 20px #3b82f6' },
          '50%': { textShadow: '0 0 20px #6366f1, 0 0 30px #6366f1' },
        },
        'pulse-slow': {
          '0%, 100%': { transform: 'scale(1)' },
          '50%': { transform: 'scale(1.05)' },
        },
      },
      animation: {
        'fade-in-up': 'fade-in-up 1s ease-out',
        'text-glow': 'text-glow 2s infinite alternate',
        'pulse-slow': 'pulse-slow 3s infinite',
      },
    },
  },
plugins: [],
}

// tailwind.config.js

