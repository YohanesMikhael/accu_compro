import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                accu: {
                    primary: '#0755A5',
                    dark: '#0B2D59',
                    green: '#16A34A',
                    light: '#F3F7FC',
                },
            },
        },
    },

    plugins: [forms],
};