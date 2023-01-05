<template>
    <section
        class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20"
    >
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">
            Student Details
        </h1>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="username"
                    >Name</label
                >
                <input
                    v-model="name"
                    id="username"
                    type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />

                <span v-if="errors.name" class="text-l text-red-500 py-1">{{
                    errors.name[0]
                }}</span>
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="emailAddress"
                    >Class</label
                >
                <input
                    v-model="clas"
                    id=""
                    type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />

                <span v-if="errors.clas" class="text-l text-red-500 py-1">{{
                    errors.clas[0]
                }}</span>
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="address"
                    >Address</label
                >
                <input
                    v-model="address"
                    id="address"
                    type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />

                <span v-if="errors.address" class="text-l text-red-500 py-1">{{
                    errors.address[0]
                }}</span>
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
                 <span
                        v-if="errors.country_id"
                        class="text-l text-red-500 py-1"
                        >{{ errors.country_id[0] }}</span
                    >
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
                <span
                        v-if="errors.state_id"
                        class="text-l text-red-500 py-1"
                        >{{ errors.state_id[0] }}</span
                    >
            </div>
            <div>
                <label
                    class="text-white dark:text-gray-200"
                    for="passwordConfirmation"
                    >DOB</label
                >
                <input
                    v-model="dob"
                    id="date"
                    type="date"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                />
                <span v-if="errors.dob" class="text-l text-red-500 py-1">{{
                    errors.dob[0]
                }}</span>
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
                    >Gender</label
                >

                <div class="form-check">
                    <input
                        v-model="gender"
                        value="male"
                        class="form-check-input"
                        type="radio"
                        name="flexRadioDefault"
                        id="flexRadioDefault1"
                    />
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input
                        v-model="gender"
                        value="female"
                        class="form-check-input"
                        type="radio"
                        name="flexRadioDefault"
                        id="flexRadioDefault2"
                    />
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                    
                </div>
                <span
                        v-if="errors.gender"
                        class="text-l text-red-500 py-1"
                        >{{ errors.gender[0] }}</span
                    >
            </div>
            <div>
                <label
                    class="text-white dark:text-gray-200"
                    for="passwordConfirmation"
                    >Text Area</label
                >
                <textarea
                    v-model="text"
                    id="textarea"
                    type="textarea"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                ></textarea>

                <span
                        v-if="errors.text"
                        class="text-l text-red-500 py-1"
                        >{{ errors.text[0] }}</span
                    >
            </div>
        </div>

        <div class="mt-6">
            <button
                type="submit"
                @click="create"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Submit
            </button>
        </div>
    </section>
</template>
<script>
  import Multiselect from '@vueform/multiselect'

export default {
    name: "Add",
    components: {
      Multiselect,
    },
    data() {
        return {
            errors: {},
            countries: [],
            states: [],
            language: [],
            tags:'tags',
            language:[],
            optionLanguage:[],
            name: "",
            clas: "",
            address: "",
            country: "",
            state: "",
            dob: "",
            gender: "",
            text: "",
        };
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
                    this.optionLanguage = response.data.data.map(a => ({
                     value: a.id,
                     label: a.name
                 }));
                }
            });
        },

        create() {
            const payload = {
                name: this.name,
                clas: this.clas,
                address: this.address,
                country_id: this.country,
                state_id: this.state,
                dob: this.dob,
                language: this.language,
                gender: this.gender,
                text: this.text,
                // image:this.image
            };
            axios
                .post("/api/students", payload)
                .then((response) => {
                    if (responce.status === 200) {
                        this.data = response.data;
                        //  window.location.href = "/list";
                        // this.$inertia.get('/list');
                        // this.$router.push('/list');
                    }
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
    created() {
        this.getCountries();
        this.fetchLanguage();
        // this.getStates()
    },
    watch: {
        country: {
            handler: "fetchState",
        },
    },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>


