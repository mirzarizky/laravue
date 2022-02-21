import { defineStore } from "pinia";

const SNACKBAR_STATE_KEY = "snackbar";

export const useSnackbar = defineStore(SNACKBAR_STATE_KEY, {
    state: () => {
        return {
            isShow: false,
            text: "",
            color: undefined,
        };
    },

    actions: {
        show({ text, color }) {
            this.text = text;
            this.color = color;
            this.isShow = true;
        },
        hide() {
            this.$reset();
        },
    },
});
