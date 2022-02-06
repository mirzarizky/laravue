<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="tw-pt-10">
            <div class="tw-w-full tw-max-w-md tw-mx-auto" v-if="status">
                <v-alert type="success" outlined text>
                    {{ status }}
                </v-alert>
            </div>

            <div
                class="tw-w-full tw-max-w-md tw-px-6 tw-py-6 tw-border tw-border-gray-100 tw-mx-auto tw-bg-white tw-rounded tw-shadow-sm lg:tw-py-8"
            >
                <div class="tw-flex tw-flex-col tw-items-center">
                    <h1 class="tw-mb-4 tw-text-center headline">
                        Reset Password
                    </h1>
                    <p class="body-2">
                        Forgot your password? No problem. Just let us know your
                        email address and we will email you a password reset
                        link that will allow you to choose a new one.
                    </p>
                </div>
                <form @submit.prevent="submit">
                    <v-row>
                        <v-col cols="12">
                            <v-text-field
                                :hide-details="!!!form.errors.email"
                                id="email"
                                label="Email"
                                type="email"
                                v-model="form.email"
                                required
                                placeholder="Your email"
                                autofocus
                                outlined
                                dense
                                :error="!!form.errors.email"
                                :error-messages="form.errors.email"
                                autocomplete="username"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-btn
                                type="submit"
                                color="primary"
                                depressed
                                block
                                :disabled="form.processing"
                                :loading="form.processing"
                            >
                                Email Password Reset Link
                            </v-btn>
                        </v-col>
                    </v-row>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import { defineComponent } from "@vue/composition-api";
import GuestLayout from "@/Layouts/Guest.vue";
import { Head } from "@inertiajs/inertia-vue";

export default defineComponent({
    components: {
        GuestLayout,
        Head,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.email"));
        },
    },
});
</script>
