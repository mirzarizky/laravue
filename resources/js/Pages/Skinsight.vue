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
            form: this.$inertia.form({
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
    },

    mounted() {
        this.$inertia.reload({
            preserveState: true,
            only: ["quizzes"],
            onBefore: () => (this.isLoading = true),
            onSuccess: () => (this.isLoading = false),
        });
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
    },
});
</script>

<template>
    <MainLayout title="SkinSight">
        <div class="tw-h-full tw-min-h-screen tw-flex tw-items-center">
            <div class="tw-w-full tw-max-w-xl tw-my-auto tw-mx-auto">
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
