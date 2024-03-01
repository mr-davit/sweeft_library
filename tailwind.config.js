/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/views/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./public/js/**/*.js",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

