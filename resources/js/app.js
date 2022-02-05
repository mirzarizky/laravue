// require("./bootstrap");
import Vue from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import route from "./mixins/route";

// Plugins
import "@/plugins/composition-api";
import vuetify from "@/plugins/vuetiify";

// Mixins
Vue.mixin(route);

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin);

        new Vue({
            vuetify,
            render: (h) => h(App, props),
        }).$mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });
