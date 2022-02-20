<script setup>
import { ref, inject } from "@vue/composition-api";

const formData = inject("formData");
const modal = ref(false);
const emit = defineEmits(["submit"]);
function onSubmit() {
    if (!formData.birth_date) return null;

    const formattedDate = formatDate(formData.birth_date);
    formData.birth_date = formattedDate;
    return emit("submit", formattedDate);
}

function formatDate(date) {
    if (!date) return null;

    const [year, month, day] = date.split("-");
    return `${year}/${month}/${day}`;
}
</script>

<template>
    <div class="tw-space-y-6">
        <h1 class="text-center display-1 font-weight-bold primary--text">
            <span class="tw-font-serif">Kamu lahir tanggal berapa?</span>
        </h1>
        <form @submit.prevent="onSubmit">
            <v-dialog
                ref="dialog"
                v-model="modal"
                :return-value.sync="formData.birth_date"
                persistent
                width="290px"
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        hide-details
                        v-model="formData.birth_date"
                        placeholder="YYYY-MM-DD"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        outlined
                        class="white"
                        autocomplete="birth_date"
                    >
                        <v-icon
                            slot="append"
                            v-ripple
                            @click="onSubmit"
                            color="primary"
                        >
                            mdi-arrow-right
                        </v-icon>
                    </v-text-field>
                </template>
                <v-date-picker
                    required
                    v-model="formData.birth_date"
                    scrollable
                >
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal = false">
                        Cancel
                    </v-btn>
                    <v-btn
                        text
                        color="primary"
                        @click="$refs.dialog.save(formData.birth_date)"
                    >
                        OK
                    </v-btn>
                </v-date-picker>
            </v-dialog>
        </form>
        <!-- <p
            class="text-center subtitle-2 tw-w-full tw-max-w-lg tw-mx-auto primary--text"
        >
            Hai, para pejuang kulit wajah sehat. Yuk, kenalan dulu agar Skin of
            My Life bisa mengenalmu lebih baik. Begitu juga dengan dirimu,
            saatnya #BeYourTrueSelf as you
        </p> -->
    </div>
</template>
