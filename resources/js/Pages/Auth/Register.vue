<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="tw-w-full tw-max-w-md tw-mx-auto">
            <v-card outlined flat class="tw-px-6 tw-py-6 lg:tw-py-8">
                <div class="tw-flex tw-flex-col tw-items-center">
                    <Link href="/">
                        <ApplicationLogo
                            class="tw-w-12 tw-h-12 tw-fill-current lg:tw-w-14 lg:tw-h-14 text-primary"
                        />
                    </Link>
                    <h1 class="tw-my-4 tw-text-center headline">Register</h1>
                </div>

                <form @submit.prevent="submit">
                    <v-row>
                        <v-col cols="12">
                            <v-text-field
                                :hide-details="!!!form.errors.name"
                                id="name"
                                label="Name"
                                type="text"
                                v-model="form.name"
                                required
                                autofocus
                                outlined
                                dense
                                :error="!!form.errors.name"
                                :error-messages="form.errors.name"
                                autocomplete="name"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-text-field
                                :hide-details="!!!form.errors.email"
                                id="email"
                                label="Email"
                                type="email"
                                v-model="form.email"
                                required
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
                                autocomplete="current-password"
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
                                autocomplete="current-password"
                            />
                        </v-col>
                        <v-col cols="12">
                            <p class="tw-text-sm tw-text-gray-500">
                                By signing up, you agree to the
                                <a href="#">Term of Service</a> and
                                <a href="a">Privacy Policy</a>.
                            </p>
                        </v-col>
                        <v-col cols="12" class="lg:tw-mt-2">
                            <div
                                class="tw-flex tw-items-center tw-justify-between"
                            >
                                <Link :href="route('login')" class="body-2">
                                    Already registered?</Link
                                >
                                <v-btn
                                    type="submit"
                                    color="primary"
                                    depressed
                                    class="px-5"
                                    :disabled="form.processing"
                                    :loading="form.processing"
                                >
                                    Register
                                </v-btn>
                            </div>
                        </v-col>
                    </v-row>
                </form>
            </v-card>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head, Link } from "@inertiajs/inertia-vue";
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    components: {
        Head,
        Link,
        GuestLayout,
        ApplicationLogo,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
});
</script>
