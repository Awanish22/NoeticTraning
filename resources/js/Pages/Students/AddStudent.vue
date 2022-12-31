
    <template>
  <div class="container">
    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="grid-first-name"
          >
            First Name
          </label>
          <input
            v-model="fname"
            class="
              appearance-none
              block
              w-full
              bg-gray-200
              text-gray-700
              border border-red-500
              rounded
              py-3
              px-4
              mb-3
              leading-tight
              focus:outline-none focus:bg-white
            "
            id="grid-first-name"
            type="text"
            placeholder="Jane"
          />
          <span v-if="errors.fname" class="text-xs text-red-500 py-1">{{
            errors.fname[0]
          }}</span>
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="grid-last-name"
          >
            Last Name
          </label>
          <input
            v-model="lname"
            class="
              appearance-none
              block
              w-full
              bg-gray-200
              text-gray-700
              border border-gray-200
              rounded
              py-3
              px-4
              leading-tight
              focus:outline-none focus:bg-white focus:border-gray-500
            "
            id="grid-last-name"
            type="text"
            placeholder="Doe"
          />

          <span v-if="errors.lname" class="text-xs text-red-500 py-1">{{
            errors.lname[0]
          }}</span>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="grid-password"
          >
            Class
          </label>
          <input
            v-model="clas"
            class="
              appearance-none
              block
              w-full
              bg-gray-200
              text-gray-700
              border border-gray-200
              rounded
              py-3
              px-4
              mb-3
              leading-tight
              focus:outline-none focus:bg-white focus:border-gray-500
            "
            id="grid-password"
            type="text"
            placeholder="Class"
          />
          <span v-if="errors.clas" class="text-xs text-red-500 py-1">{{
            errors.clas[0]
          }}</span>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="grid-state"
          >
            Country
          </label>
          <div class="relative">
            <select
              v-model="country"
              class="
                block
                appearance-none
                w-full
                bg-gray-200
                border border-gray-200
                text-gray-700
                py-3
                px-4
                pr-8
                rounded
                leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500
              "
              id="grid-state"
            >
              <option v-for="data in countries" :value="data.id" :key="data.id">
                {{ data.name }}
              </option>

              <span
                v-if="errors.country_id"
                class="text-xs text-red-500 py-1"
                >{{ errors.country_id[0] }}</span
              >
            </select>
            <div
              class="
                pointer-events-none
                absolute
                inset-y-0
                right-0
                flex
                items-center
                px-2
                text-gray-700
              "
            ></div>
          </div>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="grid-state"
          >
            State
          </label>
          <div class="relative">
            <select
              v-model="state"
              class="
                block
                appearance-none
                w-full
                bg-gray-200
                border border-gray-200
                text-gray-700
                py-3
                px-4
                pr-8
                rounded
                leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500
              "
              id="grid-state"
            >
              <option v-for="data in states" :value="data.id" :key="data.id">
                {{ data.name }}
              </option>
              <span v-if="errors.state_id" class="text-xs text-red-500 py-1">{{
                errors.state_id[0]
              }}</span>
            </select>
            <div
              class="
                pointer-events-none
                absolute
                inset-y-0
                right-0
                flex
                items-center
                px-2
                text-gray-700
              "
            ></div>
          </div>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="grid-zip"
          >
            Zip
          </label>
          <input
            v-model="zip"
            class="
              appearance-none
              block
              w-full
              bg-gray-200
              text-gray-700
              border border-gray-200
              rounded
              py-3
              px-4
              leading-tight
              focus:outline-none focus:bg-white focus:border-gray-500
            "
            id="grid-zip"
            type="text"
            placeholder="90210"
          />

          <span v-if="errors.zip" class="text-xs text-red-500 py-1">{{
            errors.zip[0]
          }}</span>
        </div>
      </div>
      <button type="submit" @click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
 Submit
</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "student",
  data() {
    return {
      errors: {},
      countries: [],

      states: [],
      fname: "",
      lname: "",
      clas: "",
      country: "",
      state: "",
      zip: "",
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

    create() {
      const payload = {
        fname: this.fname,
        lname: this.lname,
        clas: this.clas,
        country_id: this.country,
        state_id: this.state,
        zip: this.zip,
      };
      axios
        .post("/api/add-students", payload)
        .then((response) => {
          if (responce.status === 200) {
            this.data = response.data;
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },

  created() {
    this.getCountries();
    // this.getStates()
  },
  watch: {
    country: {
      handler: "fetchState",
    },
  },
};
</script>