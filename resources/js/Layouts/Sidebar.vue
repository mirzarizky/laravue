<template>
    <div>
        <v-list-item>
            <v-list-item-content>
                <v-list-item-title class="text-h">
                    Application
                </v-list-item-title>
                <v-list-item-subtitle> subtext </v-list-item-subtitle>
            </v-list-item-content>
        </v-list-item>

        <v-list dense nav shaped class="pl-0">
            <v-list-item
                active-class="tw-bg-blue-100 primary--text"
                class="pl-3 tw-font-medium"
                v-for="link in links"
                :key="link.title"
                :href="link.href"
                :input-value="route().current(link.route.name)"
                @click.prevent="$inertia.visit(link.href)"
            >
                <v-list-item-icon>
                    <v-icon v-text="link.icon" />
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>{{ link.title }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </div>
</template>

<script>
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    components: {
        //
    },

    setup() {
        //
    },

    data() {
        return {
            links: [
                {
                    title: "Home",
                    icon: "mdi-home",
                    href: this.route("dashboard"),
                    route: {
                        name: "dashboard",
                    },
                },

                {
                    title: "About",
                    icon: "mdi-help-box",
                    href: this.route("about"),
                    route: {
                        name: "about",
                    },
                },
            ],
        };
    },

    computed: {
        //
    },
});
</script>
