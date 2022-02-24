<script>
import { defineComponent } from "@vue/composition-api";
import AuthLayout from "@/Layouts/Authenticated.vue";
import pickBy from "lodash/pickBy";
import head from "lodash/head";

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
                ...this.query.filter,
                date_filter: "1d",
                from_date: null,
                to_date: null,
            },
        };
    },

    mounted() {
        const dateFilter = this.query?.filter?.created_at;
        if (dateFilter) {
            switch (dateFilter) {
                case "1d":
                case "7d":
                case "30d":
                    this.filter.date_filter = dateFilter;
                    break;
                default:
                    // const [from, to] = dateFilter.split(",");
                    this.filter.date_filter = "custom";
                    // this.filter.from_date = from;
                    // this.filter.to_date = to;
                    break;
            }
        }
    },

    computed: {
        sortBy() {
            const sortBy = head(this.options.sortBy);
            const sortDesc = head(this.options.sortDesc);
            if (!sortBy) {
                return null;
            }

            return `${sortDesc ? "-" : ""}${sortBy}`;
        },
        dateFilterOptions() {
            return [
                {
                    text: `Today (${this.$date().format("D MMM YYYY")})`,
                    value: "1d",
                },
                { text: "Last 7 days", value: "7d" },
                { text: "Last 30 days", value: "30d" },
                // { text: "Custom", value: "custom" },
            ];
        },
        selectedFilterDate() {
            if (this.filter.date_filter === "custom") {
                return { text: "Custom", value: "custom" };
            }

            return this.dateFilterOptions.find(
                (option) => option.value === this.filter.date_filter
            );
        },
        dateFilter() {
            if (this.filter.date_filter === "custom") {
                return `${this.filter.from_date},${this.filter.to_date}`;
            } else {
                return this.filter.date_filter;
            }
        },
    },

    watch: {
        sortBy() {
            this.applyFilter();
        },
        "options.page"() {
            this.applyFilter();
        },
        "options.itemsPerPage"() {
            this.applyFilter();
        },
    },

    methods: {
        applyFilter() {
            this.hideAllDialogs();
            this.$inertia.visit(
                this.route("admin.survey.index", {
                    _query: pickBy({
                        sort: this.sortBy,
                        page: this.options.page,
                        perPage: this.options.itemsPerPage,
                        "filter[created_at]": this.dateFilter,
                    }),
                }),
                {
                    only: ["surveys", "query"],
                    preserveState: true,
                    onBefore: () => (this.isLoading = true),
                    onFinish: () => (this.isLoading = false),
                }
            );
        },
        hideAllDialogs() {
            Object.keys(this.dialogs).forEach(
                (dialogKey) => (this.dialogs[dialogKey] = false)
            );
        },
    },
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
                    <span class="tw-normal-case">
                        Date: {{ selectedFilterDate.text }}
                    </span>
                    <v-icon small class="ml-2">mdi-pencil-outline</v-icon>
                </v-btn>
                <!-- <v-btn outlined class="white" small color="accent" depressed>
                    <span>Add Filter</span>
                    <v-icon small class="ml-2">mdi-plus</v-icon>
                </v-btn> -->
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
                <form @submit.prevent="applyFilter">
                    <v-card-title class="text-h5 grey lighten-2">
                        Filter Date
                    </v-card-title>

                    <v-card-text>
                        <v-radio-group v-model="filter.date_filter" required>
                            <v-radio
                                :key="`radio-key-${i}`"
                                v-for="(radioOption, i) in dateFilterOptions"
                                :label="radioOption.text"
                                :value="radioOption.value"
                            />

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
                                                    :max="$date().toISOString()"
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
                    </v-card-text>

                    <v-divider />

                    <v-card-actions>
                        <v-spacer />
                        <v-btn text color="primary" @click="hideAllDialogs">
                            Cancel
                        </v-btn>

                        <v-btn depressed color="primary" type="submit">
                            Apply Filter
                        </v-btn>
                    </v-card-actions>
                </form>
            </v-card>
        </v-dialog>
    </AuthLayout>
</template>
