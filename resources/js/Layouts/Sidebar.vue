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
                active-class="brown lighten-4 brown--text text--darken-1"
                class="pl-3 tw-font-medium"
                v-for="link in generalLinks"
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

        <v-divider />

        <v-list-group active-class="black--text" :value="true" :ripple="false">
            <template v-slot:activator>
                <v-list-item-title class="text--body">Master</v-list-item-title>
            </template>

            <v-list dense nav shaped class="pl-0">
                <v-list-item
                    active-class="brown lighten-4 brown--text text--darken-1"
                    class="pl-3 tw-font-medium"
                    v-for="link in quizLinks"
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
        </v-list-group>
    </div>
</template>

<script>
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    data() {
        return {
            generalLinks: [
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
                {
                    title: "SkinSight Result",
                    icon: "mdi-help-box",
                    href: this.route("admin.survey.index"),
                    route: {
                        name: "admin.survey.index",
                    },
                },
            ],
            quizLinks: [
                {
                    title: "Skin Test",
                    icon: "mdi-clipboard-text",
                    href: this.route("admin.quiz.index"),
                    route: {
                        name: "admin.quiz.*",
                    },
                },
            ],
        };
    },
});
</script>
