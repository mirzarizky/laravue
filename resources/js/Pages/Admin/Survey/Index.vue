<script>
import { defineComponent } from "@vue/composition-api";
import AuthLayout from "@/Layouts/Authenticated.vue";

export default defineComponent({
    components: {
        AuthLayout,
    },

    props: {
        surveys: Object,
        query: Object | Array,
    },

    data() {
        return {
            isLoading: false,
            options: {
                page: this.surveys.meta.current_page,
                itemsPerPage: parseInt(this.surveys.meta.per_page),
            },
            headers: [
                {
                    text: "Skin Type",
                    align: "start",
                    value: "result",
                },
                { text: "User", value: "user_name" },
                { text: "Created At", value: "created_at" },
                {
                    text: "",
                    value: "actions",
                    align: "end",
                    sortable: false,
                },
            ],
            menu: {
                from_date: false,
                to_date: false,
            },

            dialogs: {
                date_filter: false,
            },
            filter: {
                date_filter: "1d",
                from_date: null,
                to_date: null,
            },
        };
    },

    methods: {},
});
</script>

<template>
    <AuthLayout title="SkinSight Result">
        <div class="tw-space-y-6">
            <div class="tw-space-x-4">
                <v-btn
                    small
                    color="accent"
                    @click="dialogs.date_filter = true"
                    depressed
                >
                    <span class="tw-normal-case">Tanggal: Last 7 days</span>
                    <v-icon small class="ml-2">mdi-pencil-outline</v-icon>
                </v-btn>
                <v-btn outlined class="white" small color="accent" depressed>
                    <span>Add Filter</span>
                    <v-icon small class="ml-2">mdi-plus</v-icon>
                </v-btn>
            </div>
            <v-card outline>
                <v-data-table
                    :loading="isLoading"
                    :options.sync="options"
                    :headers="headers"
                    :items="surveys.data"
                    :server-items-length="surveys.meta.total"
                    :footer-props="{
                        showCurrentPage: true,
                        itemsPerPageOptions: [10, 25, 50],
                    }"
                >
                    <template v-slot:item.user_name="{ item }">
                        <div class="tw-flex tw-space-x-4 tw-items-center">
                            <v-avatar color="primary" size="32">
                                <span class="white--text body-1">
                                    {{ item.user.name.charAt(0) }}
                                </span>
                            </v-avatar>
                            <div>
                                <div>{{ item.user.name }}</div>
                                <div class="body-2">{{ item.user.email }}</div>
                            </div>
                        </div>
                    </template>
                    <template v-slot:item.actions="{ item }">
                        <v-btn icon depressed>
                            <v-icon small> mdi-chevron-right </v-icon>
                        </v-btn>
                    </template>
                </v-data-table>
            </v-card>
        </div>

        <v-dialog max-width="500" v-model="dialogs.date_filter">
            <v-card flat>
                <v-card-title class="text-h5 grey lighten-2">
                    Filter Date
                </v-card-title>

                <v-card-text>
                    <form>
                        <v-radio-group v-model="filter.date_filter">
                            <v-radio
                                :label="`Today (${$date().format(
                                    'D MMM YYYY'
                                )})`"
                                value="1d"
                            />
                            <v-radio label="Last 7 days" value="7d" />
                            <v-radio label="Last 30 days" value="30d" />
                            <v-radio value="custom" class="tw-flex align-start">
                                <template v-slot:label>
                                    <v-row>
                                        <v-col cols="12">
                                            <span>Custom</span>
                                        </v-col>
                                        <v-col cols="6">
                                            <v-menu
                                                v-model="menu.from_date"
                                                :close-on-content-click="false"
                                                transition="scale-transition"
                                                offset-y
                                                min-width="auto"
                                            >
                                                <template
                                                    v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }"
                                                >
                                                    <v-text-field
                                                        v-model="
                                                            filter.from_date
                                                        "
                                                        label="From"
                                                        prepend-icon="mdi-calendar"
                                                        readonly
                                                        v-bind="attrs"
                                                        @focus="
                                                            filter.date_filter =
                                                                'custom'
                                                        "
                                                        v-on="on"
                                                    />
                                                </template>
                                                <v-date-picker
                                                    no-title
                                                    v-model="filter.from_date"
                                                    @input="
                                                        menu.from_date = false
                                                    "
                                                />
                                            </v-menu>
                                        </v-col>
                                        <v-col cols="6">
                                            <v-menu
                                                v-model="menu.to_date"
                                                :close-on-content-click="false"
                                                transition="scale-transition"
                                                offset-y
                                                min-width="auto"
                                            >
                                                <template
                                                    v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }"
                                                >
                                                    <v-text-field
                                                        v-model="filter.to_date"
                                                        label="To"
                                                        prepend-icon="mdi-calendar"
                                                        readonly
                                                        v-bind="attrs"
                                                        @focus="
                                                            filter.date_filter =
                                                                'custom'
                                                        "
                                                        v-on="on"
                                                    />
                                                </template>
                                                <v-date-picker
                                                    no-title
                                                    :max="$date().toISOString()"
                                                    v-model="filter.to_date"
                                                    @input="
                                                        menu.to_date = false
                                                    "
                                                />
                                            </v-menu>
                                        </v-col>
                                    </v-row>
                                    <div></div>
                                </template>
                            </v-radio>
                        </v-radio-group>
                    </form>
                </v-card-text>

                <v-divider />

                <v-card-actions>
                    <v-spacer />
                    <v-btn
                        text
                        color="primary"
                        @click="dialogs.date_filter = false"
                    >
                        Cancel
                    </v-btn>

                    <v-btn
                        depressed
                        color="primary"
                        @click="dialogs.date_filter = false"
                    >
                        Apply Filter
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </AuthLayout>
</template>
