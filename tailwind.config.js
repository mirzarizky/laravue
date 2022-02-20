const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    prefix: "tw-",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["IBM Plex Sans", ...defaultTheme.fontFamily.sans],
                serif: ["Crimson Pro", ...defaultTheme.fontFamily.serif],
            },
            colors: {
                primary: {
                    DEFAULT: "#994629",
                    900: "#5c2a19",
                    800: "#6b311d",
                    700: "#7a3821",
                    600: "#8a3f25",
                    500: "#994629",
                    400: "#a3593e",
                    300: "#b87e69",
                    200: "#cca394",
                    100: "#e0c8bf",
                    50: "#f5edea",
                },
            },
        },
    },

    plugins: [
        // require('@tailwindcss/forms')
    ],
};
