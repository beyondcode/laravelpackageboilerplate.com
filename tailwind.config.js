module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontSize: {
                '4.5xl': '2.5rem',
                '5.5xl': '3.5rem',
            },
            colors: {
                'red-100': '#FFBABA',
                'gun-grey-10': 'rgba(10, 33, 76, 0.05);',
                'gun-grey-20': 'rgba(10, 33, 76, 0.1);',
                'gun-grey-30': 'rgba(10, 33, 76, 0.3);',
                'gun-grey-50': '#EBEDF4',
                'gun-grey-100': '#CDD1DE',
                'gun-grey-400': '#7E859D',
                'gun-grey-500': '#495977',
                'gun-grey-600': '#4D556F',
                'midnight-800': '#1F3A7D',
                'midnight-600': '#35549F',
                'midnight-400': '#5372BC',
                'midnight-10': '#F2F4F8',
                'dark-blue-800': '#0A214C',
                'hulk-700': '#5A5FFF',
                'hulk-800': '#3D42F5',
                'hulk-10': 'rgba(205, 209, 222, 0.1)',
                'hulk-50': '#F0F1FF',
                'hulk-100': '#DFE0FF',
                'hulk-hover': 'rgba(255, 255, 255, 0.12);',
                'hulk-200': '#5B5FFE',
            },
            fontFamily: {
                sans: [
                    'Inter',
                    '-apple-system',
                    'BlinkMacSystemFont',
                    '"Segoe UI"',
                    'Roboto',
                    '"Helvetica Neue"',
                    'Arial',
                    '"Noto Sans"',
                    'sans-serif',
                    '"Apple Color Emoji"',
                    '"Segoe UI Emoji"',
                    '"Segoe UI Symbol"',
                    '"Noto Color Emoji"',
                ],
                headline: [
                    '"Euclid Square"',
                    'Georgia',
                    'Cambria',
                    '"Times New Roman"',
                    'Times',
                    'serif',
                ]
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/forms'),
    ]
}
