const colors = require('tailwindcss/colors')

module.exports = {
    darkMode: 'class',
    content: ['./resources/**/*.blade.php', './vendor/filament/**/*.blade.php'],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.yellow,
                secondary: colors.green,
                success: colors.purple,
                warning: colors.red,
                health: colors.green,

            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
