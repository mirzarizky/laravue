<template>
    <v-app>
        <v-main color="grey lighten-5">
            <v-container>
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import { defineComponent } from "@vue/composition-api";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue";

export default defineComponent({
    components: {
        ApplicationLogo,
        Link,
    },
});
</script>
