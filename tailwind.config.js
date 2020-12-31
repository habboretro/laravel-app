const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  purge: [
    "./vendor/laravel/jetstream/**/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue"
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["'Ubuntu'", "sans-serif"]
      }
    }
  },

  variants: {
    opacity: ["responsive", "hover", "focus", "disabled"]
  },

  plugins: [require("@tailwindcss/ui")]
};
