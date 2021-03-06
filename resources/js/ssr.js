import Vue from "vue";

// Plugins
import "@/plugins/composition-api";
import "@/plugins/ziggy";
import vuetify from "@/plugins/vuetiify";

import { createRenderer } from "vue-server-renderer";
import { createInertiaApp } from "@inertiajs/inertia-vue";
import createServer from "@inertiajs/server";

createServer((page) =>
    createInertiaApp({
        page,
        render: createRenderer().renderToString,
        resolve: (name) => require(`./Pages/${name}`),
        setup({ app, props, plugin }) {
            Vue.use(plugin);
            return new Vue({
                vuetify,
                render: (h) => h(app, props),
            });
        },
    })
);
