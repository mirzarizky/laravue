<script>
import { defineComponent } from "@vue/composition-api";
import { Head } from "@inertiajs/inertia-vue";

export default defineComponent({
    components: {
        Head,
    },

    props: {
        title: {
            type: String,
            default: "Untitled",
        },
    },
});
</script>

<template>
    <v-app>
        <Head :title="title" />
        <v-main class="brown lighten-5">
            <v-container class="">
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>
