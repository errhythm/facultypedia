/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: ["cupcake", "dark"],
  },
  plugins: [require("@tailwindcss/typography"), require("daisyui")],
}

