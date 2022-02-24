<script>
import { defineComponent } from "@vue/composition-api";

export default defineComponent({
    props: ["value"],

    data() {
        return {
            menu: {
                from_date: false,
                to_date: false,
            },
            filter: {
                from_date: null,
                to_date: null,
            },
        };
    },
});
</script>
<template>
    <v-card flat>
        <v-card-title class="text-h5 grey lighten-2">
            Filter Date
        </v-card-title>

        <v-card-text>
            <form>
                <v-radio-group v-model="value">
                    <v-radio
                        :label="`Today (${$date().format('D MMM YYYY')})`"
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
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="filter.from_date"
                                                label="From"
                                                prepend-icon="mdi-calendar"
                                                readonly
                                                v-bind="attrs"
                                                @focus="value = 'custom'"
                                                v-on="on"
                                            />
                                        </template>
                                        <v-date-picker
                                            no-title
                                            v-model="filter.from_date"
                                            @input="menu.from_date = false"
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
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="filter.to_date"
                                                label="To"
                                                prepend-icon="mdi-calendar"
                                                readonly
                                                v-bind="attrs"
                                                @focus="value = 'custom'"
                                                v-on="on"
                                            />
                                        </template>
                                        <v-date-picker
                                            no-title
                                            :max="$date().toISOString()"
                                            v-model="filter.to_date"
                                            @input="menu.to_date = false"
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
            <v-btn text color="primary" @click="$emit('cancel')">
                Cancel
            </v-btn>

            <v-btn depressed color="primary" @click="$emit('submit')">
                Apply Filter
            </v-btn>
        </v-card-actions>
    </v-card>
</template>
