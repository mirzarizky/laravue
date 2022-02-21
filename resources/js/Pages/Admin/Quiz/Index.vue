<script>
import { defineComponent } from "@vue/composition-api";
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";

export default defineComponent({
    components: {
        AuthenticatedLayout,
    },

    props: {
        quizzes: Array,
    },

    data() {
        return {
            //
        };
    },
});
</script>
<template>
    <AuthenticatedLayout title="Quiz">
        <div class="tw-space-y-6">
            <div v-for="(group, i) in quizzes" :key="group.id">
                <h2 class="mb-2 title">{{ group.name }}</h2>
                <div v-for="quiz in group.questions" :key="quiz.id">
                    <v-expansion-panels accordion multiple popout>
                        <v-expansion-panel>
                            <v-expansion-panel-header>
                                {{ quiz.question_text }}
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-radio-group>
                                    <v-radio
                                        v-for="option in quiz.options"
                                        :key="option.id"
                                        :label="option.option_text"
                                        readonly
                                    />
                                </v-radio-group>

                                <div class="tw-flex tw-justify-end">
                                    <v-btn
                                        depressed
                                        class="px-4"
                                        @click="
                                            $inertia.visit(
                                                route(
                                                    'admin.quiz.edit',
                                                    quiz.id
                                                )
                                            )
                                        "
                                    >
                                        Edit
                                    </v-btn>
                                </div>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </v-expansion-panels>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
