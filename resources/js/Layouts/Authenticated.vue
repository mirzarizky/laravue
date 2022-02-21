<script>
import { useBreakpoints } from "@vueuse/core";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Sidebar from "@/Layouts/Sidebar.vue";
import { Link, Head } from "@inertiajs/inertia-vue";
import { ref, onMounted, defineComponent } from "@vue/composition-api";
import { useSnackbar } from "@/stores/snackbar";

export default defineComponent({
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

    components: {
        ApplicationLogo,
        Sidebar,
        Link,
        Head,
    },

    setup() {
        const breakpoints = useBreakpoints({
            xs: 600,
            sm: 960,
            md: 1264,
            lg: 1904,
            xl: 1905,
        });
        const snackbar = useSnackbar();

        const showNavigationDrawer = ref(false);
        const mdAndLarger = breakpoints.isGreater("md");
        onMounted(() => {
            if (mdAndLarger) showNavigationDrawer.value = true;
        });

        return { showNavigationDrawer, snackbar };
    },

    computed: {
        userAlias() {
            return this.$page.props.auth?.user.name.charAt(0) ?? "";
        },
    },
});
</script>

<template>
    <v-app>
        <Head :title="title" />

        <v-navigation-drawer
            v-model="showNavigationDrawer"
            color="brown lighten-5"
            floating
            app
            :width="288"
            class="pr-lg-8"
        >
            <Sidebar />
        </v-navigation-drawer>

        <v-app-bar app :elevation="0" color="brown lighten-5">
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

            <div class="lg:tw-space-x-4">
                <v-menu offset-y content-class="mt-2">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn icon v-bind="attrs" v-on="on">
                            <v-icon>mdi-bell-outline</v-icon>
                        </v-btn>
                    </template>
                </v-menu>
                <v-menu offset-y content-class="mt-2">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn text v-bind="attrs" v-on="on" icon>
                            <v-avatar color="primary" size="40">
                                <span class="white--text body-1">
                                    {{ userAlias }}
                                </span>
                            </v-avatar>
                        </v-btn>
                    </template>
                    <v-list :elevation="0">
                        <v-list-item
                            link
                            @click="$inertia.post(route('logout'))"
                        >
                            <v-list-item-icon>
                                <v-icon>mdi-exit-to-app</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Logout</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </div>
        </v-app-bar>

        <v-main class="tw-h-full tw-min-h-screen brown lighten-5">
            <div class="brown lighten-5">
                <v-container fluid>
                    <h1 class="tw-text-xl tw-font-medium">{{ title }}</h1>
                </v-container>
                <v-divider class="mt-2 mb-3" />
            </div>

            <v-container class="py-4 brown lighten-5">
                <slot />
            </v-container>

            <v-snackbar v-model="snackbar.isShow" :color="snackbar.color">
                {{ snackbar.text }}
            </v-snackbar>
        </v-main>
        <!-- <v-footer app absolute v-if="!noFooter">Jiah</v-footer> -->
    </v-app>
</template>
