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
                City
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
          <tbody  v-for="row in data" :key="row.id">
            <tr class="bg-gray-100 border-b">
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.id }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.fname }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.lname }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.class }}
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.city }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.state }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               {{ row.zip }}
               </td>
             <!-- <td class="border px-4 py-2">
         <a href="edit'+item.id" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit </a>
         <a href="" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                </td> -->

                                <td>
                    <div class="btn-group" role="group">
                                 <a href="{{ route('api/edit',$row.id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit </a>

            <button class="btn btn-danger" @click="deleteProduct(row.id)">Delete</button>
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

    export default {
        props: ['data', 'errors'],
        data() {
            return {
               
                form: {
                    fname: null,
                    lname: null,
                    class: null,
                    state: null,
                    city: null,
                    zip: null,
                },
            }
        },
        methods: {
            deleteProduct(id) { 
                axios
                    .delete(`http://localhost:8000/api/delete/${id}`)
                    .then(response => {
                        let i = this.row.map(data => data.id).indexOf(id);
                        this.row.splice(i, 1)
                    });
            }
        }
            
        
    }
</script>
