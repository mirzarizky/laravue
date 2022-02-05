<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="tw-py-10">
            <h1 class="headline tw-text-center">Verify your email</h1>
            <p class="body-1 tw-text-center tw-mt-2">
                You will need to verify your email to complete registration
            </p>
            <div class="tw-max-w-xs tw-py-8 tw-mx-auto">
                <v-img src="/img/undraw_mailbox.svg" alt="Mailbox" />
            </div>
            <div
                class="tw-w-full tw-max-w-lg tw-mx-auto"
                v-if="verificationLinkSent"
            >
                <v-alert type="success" outlined text>
                    A new verification link has been sent to the email address
                    you provided during registration.
                </v-alert>
            </div>
        </div>

        <div class="tw-w-full tw-max-w-2xl tw-mx-auto">
            <form @submit.prevent="submit">
                <p class="body-2 tw-text-center">
                    An email has been sent to
                    <span class="tw-font-bold">{{ email }}</span> with a link to
                    verify your account. If you have not received the email
                    after a few minutes, please check your spam folder
                </p>
                <div
                    class="tw-flex tw-flex-col tw-space-y-2 sm:tw-space-y-0 sm:tw-flex-row tw-items-center sm:tw-justify-between tw-mt-8"
                >
                    <v-btn
                        type="submit"
                        color="primary"
                        depressed
                        :disabled="form.processing"
                        :loading="form.processing"
                    >
                        Resend Verification Email
                    </v-btn>

                    <v-btn
                        type="button"
                        color="secondary"
                        depressed
                        outlined
                        @click="$inertia.post(route('logout'))"
                        :disabled="form.processing"
                    >
                        Log Out
                    </v-btn>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/Guest.vue";
import { Head, Link } from "@inertiajs/inertia-vue";
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    components: {
        GuestLayout,
        Head,
        Link,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form(),
        };
    },

    computed: {
        verificationLinkSent() {
            return this.status === "verification-link-sent";
        },
        email() {
            return this.$page.props.auth.user.email;
        },
    },

    methods: {
        submit() {
            this.form.post(this.route("verification.send"));
        },
    },
});
</script>
