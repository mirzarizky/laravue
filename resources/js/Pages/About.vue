<template>
    <AuthLayout title="About">
        <p>yeah this is about page</p>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    components: {
        AuthLayout,
    },
});
</script>
