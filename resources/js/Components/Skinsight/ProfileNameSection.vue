<script setup>
import { inject } from "@vue/composition-api";

const formData = inject("formData");
const emit = defineEmits(["submit"]);

function onSubmit() {
    if (!formData.name) return null;

    emit("submit", formData.name);
}
</script>

<template>
    <div class="tw-space-y-6">
        <h1 class="text-center display-1 font-weight-bold primary--text">
            <span class="tw-font-serif">Kami akan memanggilmu...</span>
        </h1>
        <form @submit.prevent="onSubmit">
            <v-text-field
                :hide-details="true"
                id="name"
                type="text"
                placeholder="Nama kamu..."
                required
                class="white"
                outlined
                v-model="formData.name"
                autofocus
                autocomplete="name"
            >
                <v-icon
                    slot="append"
                    v-ripple
                    class="hover:tw-cursor-pointer"
                    @click="onSubmit"
                    color="primary"
                >
                    mdi-arrow-right
                </v-icon>
            </v-text-field>
        </form>
        <p
            class="text-center subtitle-2 tw-w-full tw-max-w-lg tw-mx-auto primary--text"
        >
            Hai, para pejuang kulit wajah sehat. Yuk, kenalan dulu agar Skin of
            My Life bisa mengenalmu lebih baik. Begitu juga dengan dirimu,
            saatnya #BeYourTrueSelf as you
        </p>
    </div>
</template>
