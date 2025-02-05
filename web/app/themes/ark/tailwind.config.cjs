/** @type {import('tailwindcss').Config} */
const colors = require('./custom-colors.cjs');
module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    screens: {
      sm: '450px',
      md: '768px',
      lg: '1524px',
      xl: '2300px',
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '15px',
        md: '10%',
        lg: '10%',
        xl: '13%',
        '2xl': '256px',
      },
    },

    extend: {
      colors: {
        primary: {
          lighter: colors.red[300],
          DEFAULT: colors.red[700],
          darker: colors.red[950],
        },
        grey: colors.grey,
      },
      textColor: {
        normal: colors.grey,
        dark: colors.black,
        highlight: colors.red[700],
        light: colors.white,
      },
      backgroundColor: {
        transparent: 'transparent',
        light: colors.white,
        mid: '#F2F2F2',
        dark: '#151515',
        primary: {
          lighter: colors.red[300],
          DEFAULT: colors.red[700],
          darker: colors.red[950],
        },
      },
      fontFamily: {
        title: ['Playfair Display', 'serif'],
        body: ['Poppins', 'serif'],
      },
      fontSize: {
        8: ['0.5rem'],
        11: ['0.6875rem'],
        12: ['0.75rem'],
        14: ['0.875rem'],
        16: ['1rem'],
        18: ['1.125rem'],
        40: ['2.5rem'],
        48: ['3rem'],
        56: ['3.5rem'],
        64: ['4rem'],
      },
    },
  },
  plugins: [],
};
