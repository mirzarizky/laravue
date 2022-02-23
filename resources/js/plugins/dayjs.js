import Vue from "vue";
import dayjs from "dayjs";
import advancedFormat from "dayjs/plugin/advancedFormat"; // load on demand
dayjs.extend(advancedFormat);

Object.defineProperties(Vue.prototype, {
    $date: {
        get() {
            return dayjs;
        },
    },
});
