// require("./bootstrap");
import Vue from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";

// Plugins
import "@/plugins/composition-api";
import "@/plugins/ziggy";
import vuetify from "@/plugins/vuetiify";

const appName = process.env.MIX_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin);

        new Vue({
            vuetify,
            render: (h) => h(App, props),
        }).$mount(el);
    },
});

InertiaProgress.init({ color: "#3B82F6" });
