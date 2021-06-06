const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ['Poppins'],
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gray: colors.trueGray,
                yellow: {
                    dark: '#bf9b30',
                },
                red: {
                    view: '#FF0000',
                }
            },
            borderRadius:{
                'sm': '12px',
                'banner': '16px',
            },
            maxWidth:{
                xxs: '14rem',
            },
            minWidth:{
                nav: '265px',
            },
            width:{
                nav: '265px',
                '86': '22rem',
            },
            height:{
                sm: '52px'
            },
            rotate: {
                '360': '360deg',
            },
            fontSize:{
                'xxs': '13px',
            }
        },
    },

    variants: {
        extend: {
            fill: ['hover', 'focus'],
            rotate: ['active', 'group-hover'],
            opacity: ['disabled'],
            display: ['hover', 'focus', 'dark'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
