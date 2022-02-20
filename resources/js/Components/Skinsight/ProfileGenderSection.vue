<script setup>
import { inject } from "@vue/composition-api";

const formData = inject("formData");
const emit = defineEmits(["submit"]);
const genders = [
    { text: "Pria", value: "male" },
    { text: "Wanita", value: "female" },
    { text: "Aku tidak ingin menyebutkannya", value: "none" },
];

function onSubmit(gender) {
    formData.gender = gender;

    emit("submit", gender);
}
</script>

<template>
    <div class="tw-space-y-6">
        <h1 class="text-center display-1 font-weight-bold primary--text">
            <span class="tw-font-serif">Kamu adalah...</span>
        </h1>
        <form @submit.prevent="onSubmit">
            <div class="tw-grid tw-grid-cols-1 tw-gap-4">
                <v-btn
                    depressed
                    outlined
                    large
                    color="primary"
                    class="white"
                    v-for="gender in genders"
                    @click="onSubmit(gender)"
                    :key="gender.value"
                >
                    {{ gender.text }}
                </v-btn>
            </div>
        </form>
        <!-- <p
            class="text-center subtitle-2 tw-w-full tw-max-w-lg tw-mx-auto primary--text"
        >
            Hai, para pejuang kulit wajah sehat. Yuk, kenalan dulu agar Skin of
            My Life bisa mengenalmu lebih baik. Begitu juga dengan dirimu,
            saatnya #BeYourTrueSelf as you
        </p> -->
    </div>
</template>
