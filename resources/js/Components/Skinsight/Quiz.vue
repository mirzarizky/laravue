<script setup>
import { computed, inject, ref } from "@vue/composition-api";

const props = defineProps({
    quizzes: {
        type: Array,
        required: true,
    },
});
const emit = defineEmits("submit");

const currentIndex = ref(0);
const formData = inject("formData");
const question = computed(() => props.quizzes[currentIndex.value]);
const currentQuestionFilled = computed(() =>
    isQuestionFilled(question.value.id)
);

function selectOption(option) {
    if (isQuestionFilled(option.question_id)) {
        clearAnswerByQuestionId(option.question_id);
    }

    formData.answers.push({
        option: option.id,
        question: option.question_id,
    });
}

function isSelected(optionId) {
    return !!formData.answers.find((answer) => answer.option === optionId);
}

function isQuestionFilled(questionId) {
    return !!formData.answers.find((answer) => answer.question === questionId);
}

function clearAnswerByQuestionId(questionId) {
    formData.answers = formData.answers.filter(
        (answer) => answer.question !== questionId
    );
}

function nextQuestion() {
    if (currentQuestionFilled) {
        if (currentIndex.value + 1 >= props.quizzes.length) {
            emit("submit");
            return;
        }

        currentIndex.value++;
    }
}
function prevQuestion() {
    if (currentIndex.value > 0) {
        currentIndex.value--;
    }
}
</script>

<template>
    <div class="tw-space-y-6">
        <h1 class="text-center display-1 font-weight-bold primary--text">
            <span class="tw-font-serif">{{ question.question_text }}</span>
        </h1>

        <form @submit.prevent="">
            <div class="tw-grid tw-grid-cols-1 tw-gap-4">
                <div
                    :class="{
                        'tw-border-2 tw-border-primary': isSelected(option.id),
                    }"
                    class="rounded"
                    v-for="option in question.options"
                    :key="option.id"
                >
                    <v-card flat @click="selectOption(option)">
                        <v-card-text
                            class="grey--text font-weight-normal text--darken-4"
                        >
                            {{ option.option_text }}
                        </v-card-text>
                    </v-card>
                </div>
            </div>
        </form>

        <div class="tw-flex mt-10 tw-justify-between tw-items-center">
            <v-btn
                depressed
                @click="prevQuestion"
                :class="{ 'tw-invisible': currentIndex < 1 }"
                text
                color="primary"
            >
                Sebelum
            </v-btn>
            <v-btn
                depressed
                color="primary"
                @click="nextQuestion"
                :disabled="!currentQuestionFilled"
            >
                Selanjutnya
            </v-btn>
        </div>
    </div>
</template>
