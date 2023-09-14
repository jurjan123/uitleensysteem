/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundColor: {
        "dark-blue-rgb": "rgb(057,118,179)",
        "light-green-rgb": "rgb(161,192,033)",
        "light-yellow-rgb": "rgb(255,203,000)",
        "light-blue-rgb": "rgb(000-152-190)",
        "purple-rgb": "rgb(187,054,139)"
      },
    },
  },
 
  plugins: [],
}

