module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
            spacing: {
                '128': '32rem',
                '144': '36rem',
                '156': '48rem',
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
