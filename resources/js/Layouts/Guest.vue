<template>
    <v-app>
        <v-main class="tw-bg-gray-50">
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
