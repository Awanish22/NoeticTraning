<template>
    <section
        class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20"
    >
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">
            Update Student Details
        </h1>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="username"
                    >Name</label
                >
                <input
                    v-model="data.name"
                    id="username"
                    type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />

                <span v-if="errors.name" class="text-xs text-red-500 py-1">{{
                    errors.name[0]
                }}</span>
            </div>
            <div>
                <label class="text-white dark:text-gray-200" for="emailAddress"
                    >Class</label
                >
                <input
                    v-model="data.clas"
                    id=""
                    type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="address"
                    >Address</label
                >
                <input
                    v-model="data.address"
                    id="address"
                    type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />
            </div>
            <div>
                <label
                    class="text-white dark:text-gray-200"
                    for="passwordConfirmation"
                    >Country</label
                >
                <select
                    v-model="country"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                >
                    <option
                        v-for="data in countries"
                        :value="data.id"
                        :key="data.id"
                    >
                        {{ data.name }}
                    </option>
                </select>
            </div>
            <div>
                <label
                    class="text-white dark:text-gray-200"
                    for="passwordConfirmation"
                    >State</label
                >
                <select
                    v-model="state"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                >
                    <option
                        v-for="data in states"
                        :value="data.id"
                        :key="data.id"
                    >
                        {{ data.name }}
                    </option>
                </select>
            </div>
            <div>
                <label
                    class="text-white dark:text-gray-200"
                    for="passwordConfirmation"
                    >DOB</label
                >
                <input
                    v-model="data.dob"
                    id="date"
                    type="date"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />
            </div>
            <div>
                <label
                    class="text-white dark:text-gray-200"
                    for="passwordConfirmation"
                    >Language</label
                >
                <Multiselect
                    v-model="language"
                    :options="optionLanguage"
                    mode="tags"
                    placeholder="Select one or more"
                    :searchable="true"
                    :createTag="true"
                />

                <span v-if="errors.language" class="text-l text-red-500 py-1">{{
                    errors.language[0]
                }}</span>
            </div>
            <div>
                <label
                    class="text-white dark:text-gray-200"
                    for="passwordConfirmation"
                    >Text Area</label
                >
                <textarea
                    v-model="data.text"
                    id="textarea"
                    type="textarea"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                ></textarea>
            </div>
        </div>

        <div class="mt-6">
            <button
                type="submit"
                @click="update"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Update
            </button>
        </div>
    </section>
</template>
<script>
import Multiselect from "@vueform/multiselect";
export default {
    props: ["data"],
    name: "Edit",
    components: {
        Multiselect,
    },
    data() {
        return {
            errors: {},
            countries: [],
            states: [],
            language: [],
            optionLanguage: [],
            name: "",
            clas: "",
            address: "",
            country: "",
            state: "",
            dob: "",
            text: "",
            id: "",
        };
    },

    created() {
        this.fetchLanguage();
        this.getCountries(),
            this.id = this.data.id,
            this.name = this.data.name,
            this.clas = this.data.clas,
            this.address = this.data.address,
            this.country = this.data.country_id,
            // console.log(this.data.country_id;
            this.state = this.data.state_id,
            this.dob = this.data.dob,
            //  console.log(this.data.id);
            //    this.language = this.data.language,
            this.text = this.data.text;
        let arr = [];
        if (this.data.language.length) {
            this.data.language.forEach((a) => {
                arr.push(a.id);
            });
            this.language = arr;
        } else this.language = arr;
        //    console.log(this.data.language);
    },
    watch: {
        country: {
            handler: "fetchState",
        },
    },
    methods: {
        getCountries() {
            axios.get("/api/getCountries").then((response) => {
                if (response.status === 200) {
                    this.countries = response.data;
                }
            });
        },

        fetchState() {
            axios.get("/api/state/" + this.country).then((response) => {
                if (response.status === 200) {
                    this.states = response.data.data;
                }
            });
        },

        fetchLanguage() {
            axios.get("/api/languages/").then((response) => {
                if (response.status === 200) {
                    this.optionLanguage = response.data.data.map((a) => ({
                        value: a.id,
                        label: a.name,
                    }));
                }
            });
        },

        update() {
            const payload = {
                id: this.data.id,
                name: this.data.name,
                clas: this.data.clas,
                address: this.data.address,
                country_id: this.data.country_id,
                state_id: this.data.state_id,
                dob: this.data.dob,
                language: this.language,
                text: this.data.text,
            };

            axios
                .put("/api/students/" + this.data.id, payload)
                .then((response) => {
                    if (response.status === 200) {
                    }
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
    },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
