import { ref, reactive } from "@vue/composition-api";

export function useSkinsight() {
    const user = reactive({
        name: "",
        birth_date: "",
        gender: "",
        email: "",
        photo: "",
    });

    function resetState() {
        user.name = "";
        user.birth_date = "";
        user.gender = "";
        user.email = "";
        user.photo = "";

        answers.value = [];
    }

    const answers = ref([]);

    return { user, answers, resetState };
}
