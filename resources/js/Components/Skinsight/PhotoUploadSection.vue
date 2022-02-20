<script setup>
import { inject, watch, ref, computed } from "@vue/composition-api";

const emit = defineEmits(["submit"]);

const photo = ref(null);
const formData = inject("formData");
const aliasName = computed(() => formData.name.charAt(0));
const imagePreview = computed(() =>
    photo.value ? URL.createObjectURL(photo.value) : null
);
watch(photo, (value) => (formData.photo = value));

function onSubmit() {
    if (photo.value) {
        emit("submit");
    }
}

function onSkip() {
    if (photo.value) {
        photo.value = null;
    }

    emit("submit");
}
</script>

<template>
    <div class="tw-space-y-6">
        <div class="tw-flex tw-justify-center tw-items-center">
            <v-avatar :color="imagePreview ? 'white' : 'primary'" size="96">
                <v-img :src="imagePreview" v-if="imagePreview" />
                <span v-else class="white--text text-h5">{{ aliasName }}</span>
            </v-avatar>
        </div>

        <h1 class="text-center display-1 font-weight-bold primary--text">
            <span class="tw-font-serif">
                Upload fotomu! Kami akan mempelajari kulit wajahmu untuk
                mengembangkan SkinSight agar lebih baik lagi!
            </span>
        </h1>

        <v-file-input
            chips
            hide-details
            accept="image/png, image/jpeg, image/bmp"
            label="Klik untuk memilih foto (Maks. 5MB)"
            outlined
            v-model="photo"
            class="white"
            :prepend-icon="null"
            show-size
        >
            <v-icon slot="prepend-inner" class="pr-1">mdi-camera</v-icon>
        </v-file-input>

        <div class="tw-flex tw-items-center tw-justify-center tw-space-x-4">
            <v-btn @click="onSkip" depressed outlined color="primary">
                Nanti Dulu
            </v-btn>
            <v-btn @click="onSubmit" depressed v-if="photo" color="primary">
                Lanjut
            </v-btn>
        </div>
    </div>
</template>
