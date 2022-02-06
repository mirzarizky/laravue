import Vue from "vue";
import Vuetify from "vuetify/lib/framework";
import colors from "vuetify/lib/util/colors";

const opts = {
    theme: {
        themes: {
            light: {
                primary: "#3B82F6",
                // secondary: colors.red.lighten4, // #FFCDD2
                // accent: colors.indigo.base, // #3F51B5
            },
        },
    },
};
Vue.use(Vuetify);

export default new Vuetify(opts);
