const mix = require("laravel-mix");
require("laravel-mix-versionhash");
require("vuetifyjs-mix-extension");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/dist/js")
    .vuetify("vuetify-loader")
    .vue({ version: 2 })
    .postCss("resources/css/app.css", "public/dist/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .webpackConfig(require("./webpack.config"))
    .disableSuccessNotifications();

if (mix.inProduction()) {
    mix.versionHash();
}
