<template>
    <input
        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        :value="value"
        @input="$emit('input', $event.target.value)"
        ref="input"
    />
</template>

<script>
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    props: ["value"],

    // emits: ["update:value"],

    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
});
</script>
