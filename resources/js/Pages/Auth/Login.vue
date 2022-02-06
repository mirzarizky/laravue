<template>
    <GuestLayout>
        <Head title="Login" />

        <div class="tw-py-10">
            <div class="tw-w-full tw-max-w-md tw-mx-auto" v-if="status">
                <v-alert type="success" outlined text>
                    {{ status }}
                </v-alert>
            </div>

            <div
                class="tw-w-full tw-max-w-md tw-px-6 tw-py-6 tw-border tw-border-gray-100 tw-mx-auto tw-bg-white tw-rounded tw-shadow-sm lg:tw-py-8"
            >
                <div class="tw-flex tw-flex-col tw-items-center">
                    <Link href="/">
                        <ApplicationLogo
                            class="tw-w-12 tw-h-12 tw-fill-current lg:tw-w-14 lg:tw-h-14 text-primary"
                        />
                    </Link>
                    <h1 class="tw-my-4 tw-text-center headline">Login</h1>
                </div>
                <form @submit.prevent="login">
                    <v-row>
                        <v-col cols="12">
                            <v-text-field
                                :hide-details="!!!form.errors.email"
                                id="email"
                                label="Email"
                                type="email"
                                v-model="form.email"
                                required
                                autofocus
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
                            <v-checkbox
                                class="py-0 mt-0"
                                hide-details
                                name="remember"
                                v-model="form.remember"
                                label="Remember me"
                            />
                        </v-col>
                        <v-col cols="12" class="lg:tw-mt-2">
                            <v-btn
                                type="submit"
                                color="primary"
                                depressed
                                block
                                :disabled="form.processing"
                                :loading="form.processing"
                            >
                                Login
                            </v-btn>
                        </v-col>
                        <v-col cols="12" v-if="canRegister || canResetPassword">
                            <div
                                class="tw-space-y-3 sm:tw-space-y-0 sm:tw-space-x-4 tw-flex tw-flex-col sm:tw-flex-row"
                            >
                                <div class="tw-w-full">
                                    <v-btn
                                        v-if="canRegister"
                                        type="button"
                                        color="secondary"
                                        depressed
                                        outlined
                                        block
                                        @click="
                                            $inertia.visit(route('register'))
                                        "
                                        :disabled="form.processing"
                                    >
                                        Register
                                    </v-btn>
                                </div>
                                <div class="tw-w-full">
                                    <v-btn
                                        type="button"
                                        color="secondary"
                                        depressed
                                        outlined
                                        block
                                        @click="
                                            $inertia.visit(
                                                route('password.request')
                                            )
                                        "
                                        :disabled="form.processing"
                                    >
                                        Forgot Password
                                    </v-btn>
                                </div>
                            </div>
                        </v-col>
                        <!-- <v-col cols="12">
                            <v-divider />
                        </v-col>
                        <v-col>
                            <v-btn block>Login with Google</v-btn>
                        </v-col>
                        <v-col>
                            <v-btn color="facebook" block>
                                Login with Facebook
                            </v-btn>
                        </v-col> -->
                    </v-row>
                </form>
            </div>

            <v-row justify="center">
                <v-col cols="12" sm="8" md="6" lg="5"> </v-col>
            </v-row>
        </div>
    </GuestLayout>
</template>

<script>
import { defineComponent } from "@vue/composition-api";
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head, Link } from "@inertiajs/inertia-vue";

export default defineComponent({
    components: {
        GuestLayout,
        Head,
        Link,
        ApplicationLogo,
    },

    props: {
        canResetPassword: Boolean,
        canRegister: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        login() {
            this.form.post(this.route("login"), {
                onFinish: () => this.form.reset("password"),
            });
        },
    },
});
</script>
