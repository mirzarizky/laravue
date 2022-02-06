<template>
    <GuestLayout>
        <Head title="Confirm Password" />

        <div class="tw-py-10">
            <div
                class="tw-w-full tw-max-w-md tw-px-6 tw-py-6 tw-border tw-border-gray-200 tw-mx-auto tw-bg-white tw-rounded tw-shadow-sm lg:tw-py-8"
            >
                <div class="tw-flex tw-flex-col tw-items-center">
                    <Link href="/">
                        <ApplicationLogo
                            class="tw-w-12 tw-h-12 tw-fill-current lg:tw-w-14 lg:tw-h-14 text-primary"
                        />
                    </Link>
                    <p class="tw-my-4 tw-text-center body-2">
                        This is a secure area of the application. Please confirm
                        your password before continuing.
                    </p>
                </div>

                <form @submit.prevent="submit">
                    <v-row>
                        <v-col cols="12">
                            <v-text-field
                                dense
                                :hide-details="!!!form.errors.password"
                                id="password"
                                label="Password"
                                type="password"
                                v-model="form.password"
                                required
                                autofocus
                                outlined
                                :error="!!form.errors.password"
                                :error-messages="form.errors.password"
                                autocomplete="current-password"
                            />
                        </v-col>

                        <v-col cols="12" class="lg:tw-mt-2">
                            <v-btn
                                type="submit"
                                color="primary"
                                block
                                depressed
                                :disabled="form.processing"
                                :loading="form.processing"
                            >
                                Confirm
                            </v-btn>
                        </v-col>
                    </v-row>
                </form>
            </div>
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
        GuestLayout,
        Head,
        ApplicationLogo,
        Link,
    },

    data() {
        return {
            form: this.$inertia.form({
                password: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.confirm"), {
                onFinish: () => this.form.reset(),
            });
        },
    },
});
</script>
