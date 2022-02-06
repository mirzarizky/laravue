const path = require("path");
const mix = require("laravel-mix");
const webpackNodeExternals = require("webpack-node-externals");
require("vuetifyjs-mix-extension");

mix.options({ manifest: false })
    .js("resources/js/ssr.js", "public/dist/js")
    .vuetify("vuetify-loader")
    .vue({ version: 2, options: { optimizeSSR: true } })
    .alias({
        "@": path.resolve("resources/js"),
        ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue"),
    })
    .webpackConfig({
        target: "node",
        externals: [
            webpackNodeExternals({
                allowlist: [/^vuetify/],
            }),
        ],
    });
