<template>
    <v-app>
        <Head :title="title" />

        <v-navigation-drawer
            v-model="showNavigationDrawer"
            color="grey lighten-5"
            floating
            app
            :width="288"
            class="pr-lg-8"
        >
            <Sidebar />
        </v-navigation-drawer>

        <v-app-bar app :elevation="0" color="grey lighten-5">
            <v-app-bar-nav-icon
                @click.stop="showNavigationDrawer = !showNavigationDrawer"
            />
            <v-spacer />
            <div class="tw-flex tw-items-center tw-shrink-0">
                <Link :href="route('dashboard')">
                    <application-logo class="tw-block tw-w-auto tw-h-9" />
                </Link>
            </div>
            <v-spacer />

            <v-menu offset-y content-class="mt-2">
                <template v-slot:activator="{ on, attrs }">
                    <v-avatar
                        color="primary"
                        size="40"
                        v-bind="attrs"
                        v-on="on"
                    >
                        <span class="white--text body-1">CJ</span>
                    </v-avatar>
                </template>
                <v-list :elevation="0">
                    <v-list-item link @click="$inertia.post(route('logout'))">
                        <v-list-item-icon>
                            <v-icon>mdi-exit-to-app</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>Logout</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>

        <v-main class="tw-h-full tw-min-h-screen grey lighten-5">
            <div class="grey lighten-5">
                <v-container fluid>
                    <h1 class="tw-text-xl tw-font-medium">{{ title }}</h1>
                </v-container>
                <v-divider class="mt-4" />
            </div>
            <v-container class="py-4 grey lighten-5" fluid>
                <slot />
            </v-container>
        </v-main>
        <!-- <v-footer app absolute v-if="!noFooter">Jiah</v-footer> -->
    </v-app>
</template>

<script>
import { useBreakpoints } from "@vueuse/core";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Sidebar from "@/Layouts/Sidebar.vue";
import { Link, Head } from "@inertiajs/inertia-vue";
import { defineComponent, ref, onMounted } from "@vue/composition-api";

export default defineComponent({
    components: {
        ApplicationLogo,
        Sidebar,
        Link,
        Head,
    },

    props: {
        noFooter: {
            type: Boolean,
            default: false,
        },
        title: {
            type: String,
            default: "Untitled",
        },
    },

    setup() {
        const breakpoints = useBreakpoints({
            xs: 600,
            sm: 960,
            md: 1264,
            lg: 1904,
            xl: 1905,
        });
        const showNavigationDrawer = ref(false);
        const mdAndLarger = breakpoints.isGreater("md");
        onMounted(() => {
            if (mdAndLarger) showNavigationDrawer.value = true;
        });

        return {
            mdAndLarger,
            showNavigationDrawer,
        };
    },

    data: () => ({
        //
    }),
});
</script>
