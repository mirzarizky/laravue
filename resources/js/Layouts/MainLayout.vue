<script>
import { defineComponent } from "@vue/composition-api";
import { Head, Link } from "@inertiajs/inertia-vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

export default defineComponent({
    components: {
        Head,
        Link,
        ApplicationLogo,
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

        <v-app-bar app :elevation="0" color="white">
            <v-spacer />
            <div class="tw-flex tw-items-center tw-shrink-0">
                <Link href="/">
                    <application-logo
                        class="tw-block tw-w-auto tw-h-9 tw-fill-current tw-text-primary"
                    />
                </Link>
            </div>
            <v-spacer />
        </v-app-bar>

        <v-main class="brown lighten-5">
            <div class="tw-flex tw-flex-col tw-h-full">
                <div class="tw-flex-1 tw-flex tw-items-center">
                    <v-container>
                        <slot />
                    </v-container>
                </div>
            </div>
        </v-main>
    </v-app>
</template>
