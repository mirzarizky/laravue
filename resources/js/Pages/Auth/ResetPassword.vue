<template>
    <GuestLayout>
        <Head title="Reset Password" />

        <div class="tw-pt-10">
            <div
                class="tw-w-full tw-max-w-md tw-px-6 tw-py-6 tw-border tw-border-gray-100 tw-mx-auto tw-bg-white tw-rounded tw-shadow-sm lg:tw-py-8"
            >
                <div class="tw-flex tw-flex-col tw-items-center">
                    <h1 class="tw-mb-4 tw-text-center headline">
                        Reset Password
                    </h1>
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
                                disabled
                                outlined
                                dense
                                :error="!!form.errors.email"
                                :error-messages="form.errors.email"
                                autocomplete="username"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-text-field
                                dense
                                :hide-details="!!!form.errors.password"
                                id="password"
                                label="Password"
                                type="password"
                                v-model="form.password"
                                required
                                outlined
                                :error="!!form.errors.password"
                                :error-messages="form.errors.password"
                                autocomplete="new-password"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-text-field
                                dense
                                :hide-details="
                                    !!!form.errors.password_confirmation
                                "
                                id="password_confirmation"
                                label="Confirm Password"
                                type="password"
                                v-model="form.password_confirmation"
                                required
                                outlined
                                :error="!!form.errors.password_confirmation"
                                :error-messages="
                                    form.errors.password_confirmation
                                "
                                autocomplete="new-password"
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
                                Reset Password
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
        Head,
        GuestLayout,
    },

    props: {
        email: String,
        token: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: "",
                password_confirmation: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.update"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
});
</script>
