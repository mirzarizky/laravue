<script setup>
import { onMounted } from "@vue/composition-api";

const emit = defineEmits(["submit"]);

onMounted(() => setTimeout(() => emit("submit"), 2000));
</script>

<template>
    <h1 class="text-center display-1 font-weight-bold primary--text">
        <span class="tw-font-serif">
            Terima kasih, saatnya kamu bercerita soal kesehatan kulitmu kepada
            kami.
        </span>
    </h1>
</template>
