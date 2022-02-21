<script>
import { defineComponent } from "@vue/composition-api";
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { mapActions } from "pinia";
import { useSnackbar } from "@/stores/snackbar";

export default defineComponent({
    components: {
        AuthenticatedLayout,
    },

    props: {
        question: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                question_text: this.question.question_text,
                question_image: null,
                options: this.question.options.map((option) => ({
                    id: option.id,
                    option_text: option.option_text,
                })),
            }),
        };
    },

    computed: {
        imagePreview() {
            return this.form.question_image
                ? URL.createObjectURL(this.form.question_image)
                : null;
        },
    },

    methods: {
        ...mapActions(useSnackbar, { showSnackbar: "show" }),
        saveChanges() {
            this.form
                .transform((data) => ({
                    ...data,
                    _method: "PUT",
                }))
                .post(this.route("admin.quiz.update", this.question.id), {
                    forceFormData: true,
                    onSuccess: () => {
                        this.$inertia.reload();
                        this.form.reset("question_image");
                        this.showSnackbar({
                            text: "Successfully save changes.",
                            color: "success",
                        });
                    },
                    onError: (_error) =>
                        this.showSnackbar({
                            text: "Ooops. The given data was invalid.",
                            color: "error",
                        }),
                });
        },
        deleteImage() {
            this.$http
                .post(this.route("admin.quiz.delete_image", this.question.id))
                .then(() =>
                    this.showSnackbar({
                        text: "Successfully delete image.",
                        color: "success",
                    })
                )
                .then(() => this.$inertia.reload());
        },
    },
});
</script>

<template>
    <AuthenticatedLayout title="Edit Quiz">
        <v-card outline flat class="tw-p-4">
            <form @submit.prevent="saveChanges">
                <v-row>
                    <v-col cols="12" md="3">
                        <v-subheader>Question</v-subheader>
                    </v-col>
                    <v-col cols="12" md="9">
                        <v-textarea
                            :hide-details="!!!form.errors.question_text"
                            id="question"
                            v-model="form.question_text"
                            required
                            outlined
                            :error="!!form.errors.question_text"
                            :error-messages="form.errors.question_text"
                        />
                    </v-col>

                    <v-col cols="12" md="3">
                        <v-subheader>Image</v-subheader>
                    </v-col>
                    <v-col cols="12" md="9">
                        <v-row>
                            <v-col cols="12">
                                <div v-if="question.question_image_url">
                                    <v-img
                                        contain
                                        max-height="128"
                                        :src="question.question_image_url"
                                    />
                                    <div
                                        class="tw-flex tw-items-center tw-justify-center tw-mt-2"
                                    >
                                        <v-btn
                                            @click="deleteImage"
                                            color="primary"
                                            depressed
                                            outlined
                                            small
                                        >
                                            Delete Image
                                        </v-btn>
                                    </div>
                                </div>
                                <v-img
                                    contain
                                    max-height="128"
                                    v-if="imagePreview"
                                    :src="imagePreview"
                                />
                            </v-col>
                            <v-col cols="12">
                                <v-file-input
                                    chips
                                    :hide-details="
                                        !!!form.errors.question_image
                                    "
                                    accept="image/png, image/jpeg, image/bmp"
                                    label="Browse file (Max. 1MB)"
                                    outlined
                                    v-model="form.question_image"
                                    :prepend-icon="null"
                                    show-size
                                    :error="!!form.errors.question_image"
                                    :error-messages="form.errors.question_image"
                                >
                                    <v-icon slot="prepend-inner" class="pr-1">
                                        mdi-image
                                    </v-icon>
                                </v-file-input>
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col cols="12" md="3">
                        <v-subheader>Answers</v-subheader>
                    </v-col>
                    <v-col cols="12" md="9">
                        <v-row>
                            <v-col
                                cols="12"
                                v-for="(option, i) in form.options"
                                :key="option.id"
                            >
                                <v-text-field
                                    :hide-details="
                                        !!!form.errors[
                                            `options.${i}.option_text`
                                        ]
                                    "
                                    v-model="option.option_text"
                                    outlined
                                    required
                                    :error="
                                        !!form.errors[
                                            `options.${i}.option_text`
                                        ]
                                    "
                                    :error-messages="
                                        form.errors[`options.${i}.option_text`]
                                    "
                                />
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col class="mt-4 tw-flex tw-justify-end">
                        <v-btn
                            :disabled="form.processing"
                            :loading="form.processing"
                            type="submit"
                            color="primary"
                            depressed
                        >
                            Save changes
                        </v-btn>
                    </v-col>
                </v-row>
            </form>
        </v-card>
    </AuthenticatedLayout>
</template>
