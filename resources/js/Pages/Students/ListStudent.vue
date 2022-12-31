<template>
<!-- component -->
<div class="container mx-auto">
<div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          <thead class="bg-white border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                First Name
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Last Name
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Class
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Country
              </th> 
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                State
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Zip
              </th>

              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Action
              </th>

            </tr>
          </thead>
          <tbody  v-for="row in data"  :key="row.id">
            <tr class="bg-gray-100 border-b">
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ data.id }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.fname }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.lname }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.clas }}
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.country.name }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.state.name }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.zip }}
               </td>
               <td>
                    <div class="btn-group" role="group">
                         <Link class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" :href="'/student/edit/' + row.id">Edit</Link>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"  @click="deletee(row.id)">Delete</button>
                    </div>
                </td>
            </tr> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</template>
<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
    export default {
        components: {
            Link,
        },
        props: [],
        data() {
            return {
               data:[]
            }
        },
        methods: {

            lists(){
                axios.get('/api/lists').then(response => {
                            if(response.status === 200) {
                            this.data = response.data.data

                            }
                    })
            },

            deletee(id) { 
                axios.delete('/api/delete/'+ id)
                    .then(response => {
                            if(response.status === 200) {
                            this.data = response.data

                            }
                    })
            }


        },
             created(){
            this.lists()
        },
            
        
    }
</script>
