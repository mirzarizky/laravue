const path = require("path");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
// const { VuetifyLoaderPlugin } = require("vuetify-loader");
const caseSensitivePathsPlugin = require("case-sensitive-paths-webpack-plugin");

module.exports = {
    resolve: {
        alias: {
            "@": path.resolve("resources/js"),
            ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue"),
        },
    },
    plugins: [
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                "dist/*",
                "!dist/.gitignore",
                "!index.php",
                "!robots.txt",
                "!favicon.ico",
            ],
        }),
        // new VuetifyLoaderPlugin(),
        new caseSensitivePathsPlugin(),
    ],
    output: {
        chunkFilename: "dist/js/[name].js?id=[chunkhash]",
    },
};
