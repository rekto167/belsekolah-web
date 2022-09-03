const defafaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', ...defafaultTheme.fontFamily.sans]
      }
    },
  },
  plugins: [],
}
