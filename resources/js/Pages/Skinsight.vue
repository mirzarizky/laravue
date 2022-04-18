<script>
import { defineComponent } from "@vue/composition-api";
import MainLayout from "@/Layouts/MainLayout.vue";
import {
    ProfileNameSection,
    IntroSection,
    BirthDateSection,
    ProfileGenderSection,
    IntroFeedback,
    Quiz,
    PhotoUploadSection,
} from "@/Components/Skinsight";
import { Inertia } from "@inertiajs/inertia";

export default defineComponent({
    provide() {
        return {
            formData: this.form,
        };
    },

    components: {
        MainLayout,
        ProfileNameSection,
        IntroSection,
        BirthDateSection,
        ProfileGenderSection,
        IntroFeedback,
        Quiz,
        PhotoUploadSection,
    },

    props: {
        quizzes: Object,
    },

    data() {
        return {
            isLoading: false,
            step: 1,
            sections: [
                { step: 1, component: "IntroSection" },
                { step: 2, component: "ProfileNameSection" },
                { step: 3, component: "BirthDateSection" },
                { step: 4, component: "ProfileGenderSection" },
                { step: 5, component: "IntroFeedback" },
                { step: 6, component: "Quiz" },
                { step: 7, component: "PhotoUploadSection" },
            ],
            form: this.$inertia.form("skinsight-form", {
                answers: [],
                name: "",
                birth_date: "",
                gender: "",
                email: "",
                photo: "",
            }),
        };
    },

    computed: {
        currentSection() {
            return this.sections.find((section) => section.step === this.step);
        },
        currentSectionProps() {
            if (this.currentSection.step === 1) {
                return {
                    isLoading: this.isLoading,
                };
            }

            if (this.currentSection.step === 6) {
                return {
                    quizzes: this.quizzes.data,
                };
            }
        },
        isFormFilled() {
            return !!this.form.answers
        }
    },

    mounted() {
        this.$inertia.reload({
            preserveState: true,
            only: ["quizzes"],
            onBefore: () => (this.isLoading = true),
            onSuccess: () => (this.isLoading = false),
        });

        this.checkPreviousState();
    },

    beforeUnmount() {
        Inertia.reset('skinsight-form')
    },

    methods: {
        nextStep() {
            this.step++;
        },
        onSubmit(e) {
            if (this.step === this.sections.length) {
                console.log("this is the last");
                return;
            }
            this.nextStep();
        },
        checkPreviousState() {
            let skinsightForm = Inertia.restore("skinsight-form");
            console.log(skinsightForm);

            if (skinsightForm.answers) {
                console.log("answers");
                return;
            }

            if (skinsightForm.name) {
                console.log("name");
                return;
            }
        },
    },
});
</script>

<template>
    <MainLayout title="SkinSight">
        <div
            class="tw-flex tw-justify-between tw-flex-col tw-h-full tw-space-y-44"
        >
            <div
                class="tw-w-full tw-max-w-xl tw-mx-auto tw-flex tw-flex-col tw-justify-between"
            >
                <transition mode="out-in" name="fade" appear>
                    <component
                        @submit="onSubmit"
                        v-bind="currentSectionProps"
                        :is="currentSection.component"
                    />
                </transition>
            </div>
        </div>
    </MainLayout>
</template>

<style lang="css">
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
