<template>
    <AuthLayout title="Dashboard">
        <v-card outlined>
            <v-card-text>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Maecenas eget velit quis nisl consequat facilisis non sed
                    risus. Donec iaculis ornare aliquam. Cras ligula leo,
                    aliquam non nisi eu, mattis aliquet eros. Vestibulum eu
                    justo convallis, dapibus lorem non, tempor magna. Duis
                    hendrerit, ex nec ornare iaculis, lorem dui dictum sapien,
                    malesuada viverra diam felis non mi.
                </p>

                <p>
                    Suspendisse egestas eget lorem at pharetra. Duis vehicula
                    mollis erat a elementum. Praesent et est urna. Aenean non
                    velit sit amet nibh interdum egestas. Donec finibus
                    malesuada eros, eget interdum leo aliquet quis. Ut bibendum
                    lacinia est, a hendrerit arcu ullamcorper vel. Class aptent
                    taciti sociosqu ad litora torquent per conubia nostra, per
                    inceptos himenaeos. Praesent malesuada euismod tellus, ut
                    lacinia tortor suscipit sed.
                </p>

                <p>
                    Aliquam rutrum id risus eu vehicula. In hendrerit nec turpis
                    nec elementum. Nullam sit amet venenatis diam. Praesent vel
                    auctor ex. Ut sit amet accumsan mi. Vestibulum laoreet at
                    dolor a lobortis. Vestibulum maximus vel mauris quis
                    maximus. Phasellus eros lacus, ullamcorper quis vestibulum
                    nec, ullamcorper vitae purus. Sed efficitur pulvinar felis
                    in porttitor. Praesent vel turpis vitae lacus rutrum
                    sollicitudin. Mauris sollicitudin facilisis purus eget
                    placerat. Fusce dictum aliquet placerat.
                </p>

                <p>
                    Cras vestibulum facilisis orci. Aenean blandit et erat nec
                    dapibus. Pellentesque habitant morbi tristique senectus et
                    netus et malesuada fames ac turpis egestas. Cras lacus mi,
                    mollis eu laoreet eu, condimentum ut dolor. Integer urna
                    quam, faucibus sed dignissim vitae, iaculis vel sapien. Nunc
                    id bibendum ligula. Phasellus aliquet condimentum
                    condimentum. Sed laoreet, mi quis consectetur elementum,
                    nibh tortor laoreet felis, a fringilla enim mi ut neque.
                    Curabitur ac purus euismod, rutrum sapien sit amet, luctus
                    ante. Praesent bibendum, enim et tincidunt vehicula, dolor
                    nunc blandit arcu, et dignissim neque diam a sapien.
                    Maecenas eu arcu et orci egestas finibus.
                </p>

                <p>
                    Nullam nisl turpis, scelerisque rhoncus erat vitae, faucibus
                    posuere lacus. Nam gravida nisi nec mi fermentum, at cursus
                    elit aliquam. Nullam orci enim, ultricies congue gravida a,
                    pulvinar ac velit. Donec leo nibh, semper et ultricies eu,
                    cursus in lacus. In quis arcu consectetur quam convallis
                    semper. Phasellus tristique pulvinar eros, porttitor
                    pulvinar ligula gravida quis. Fusce sed consectetur sem.
                    Etiam interdum, ex a consectetur vehicula, risus purus
                    congue nulla, sit amet iaculis orci diam nec massa. Ut velit
                    felis, tristique in commodo ac, facilisis vitae leo. Duis
                    fermentum massa quam. Donec consequat vehicula luctus. Etiam
                    in dolor vel nulla fermentum congue.
                </p>
            </v-card-text>
        </v-card>
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
