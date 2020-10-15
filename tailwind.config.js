module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [
      './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
      require('@tailwindcss/ui'),
  ],
}
