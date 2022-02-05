<template>
    <Link
        :href="href"
        :method="method"
        :as="as"
        class="block w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
    >
        <slot />
    </Link>
</template>

<script>
import { defineComponent } from "@vue/composition-api";
import { Link } from "@inertiajs/inertia-vue";

export default defineComponent({
    props: {
        href: {
            type: String,
            required: true,
        },
        method: {
            type: String,
            required: false,
            default: () => "get",
        },
        as: String,
    },

    components: {
        Link,
    },
});
</script>
