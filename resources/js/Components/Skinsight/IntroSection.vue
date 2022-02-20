<script>
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    props: {
        isLoading: {
            type: Boolean,
            default: false,
        },
    },

    methods: {
        onSubmit() {
            this.$emit("submit");
        },
    },
});
</script>

<template>
    <div class="tw-space-y-6">
        <h1 class="text-center display-1 font-weight-bold primary--text">
            <span class="tw-font-serif"> Selamat datang di SkinSight! </span>
        </h1>
        <p
            class="text-center subtitle-2 tw-w-full tw-max-w-lg tw-mx-auto primary--text"
        >
            Langkah pertamamu menuju kulit sehat akan dimulai. Luangkan waktu
            beberapa menit untuk jawab pertanyaan singkat dari SkinSight agar
            kami bisa menganalisis kondisi kulit wajahmu. Yuk, saatnya kenali
            diri sendiri mulai dari kulit wajahmu.
        </p>
        <div class="pt-1 tw-flex tw-items-center tw-justify-center">
            <v-btn
                color="primary"
                @click="onSubmit"
                depressed
                :loading="isLoading"
                :disabled="isLoading"
            >
                Mulai Skin Test
            </v-btn>
        </div>
    </div>
</template>
