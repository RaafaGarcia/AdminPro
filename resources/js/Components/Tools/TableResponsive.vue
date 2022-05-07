<template>
  <div v-if="data">
    <div v-show="data.data.length < 1" class="">
      <div class="alert alert-info text-center" role="alert ">
        No se encontro ningun resultado
      </div>
    </div>
    <div class="table-responsive">
      <table
        :id="idTable"
        v-if="data.data.length > 0"
        class="
          divide-y divide-gray-200
          hover
          border border-gray-200
          rounded-sm
          hidden
          lg:table
        "
        style="width: 100%; margin-top: 0px; margin-bottom: 1em"
      >
        <thead class="rounded-t-lg">
          <tr v-if="columns" class="rounded-t-lg bg-gray-50">
            <th
              v-for="column in columns"
              :key="column.id"
              class="
                px-6
                py-3
                text-left text-xs
                font-medium
                text-gray-500
                uppercase
                tracking-wider
              "
            >
              {{ column.name }}
            </th>

            <th
              data-priority="3"
              class="
                px-6
                py-3
                text-right text-xs
                font-medium
                text-gray-500
                uppercase
                tracking-wider
              "
            > 
              Acciones
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr
            v-for="element in data.data"
            :key="element.id"
            class="border-b border-gray-100"
          >
            <td
              v-for="column in columns"
              :key="column.id"
              class="px-6 py-4 whitespace-nowrap"
            >
              {{ $eval(column.slot, element) }}
            </td>

            <td
              class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
            >
              <div class="flex align-middle justify-end items-center">
                <!-- :href="route(context+'.edit', element.id)" -->
                <a
                 v-if="element.can.update"
                    
                  class=" 
                    mr-2
                    inline-flex
                    items-center
                    px-2
                    py-2
                    border border-gray-300
                    rounded-md
                    shadow-sm
                    text-sm
                    font-medium
                    text-gray-700
                    bg-gray-50
                    hover:bg-gray-100
                    focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-gray-500
                  "
                  data-toggle="tooltip"
                  title="Agregar"
                >
                  <svg
                    class="mr-2 w-5 h-5 text-gray-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    />
                  </svg>
                  Editar
                </a>
                <button
                v-if="element.can.delete"
                  @click="deleteItem(element.id)"
                  class="
                    mr-2
                    inline-flex
                    items-center
                    px-2
                    py-2
                    border border-transparent
                    rounded-md
                    shadow-sm
                    text-sm
                    font-medium
                    text-white
                    bg-red-500
                    hover:bg-red-600
                    focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-red-500
                  "
                >
                  <svg
                    class="mr-2 h-5 w-5"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="4" y1="7" x2="20" y2="7" />
                    <line x1="10" y1="11" x2="10" y2="17" />
                    <line x1="14" y1="11" x2="14" y2="17" />
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                  </svg>
                  Eliminar
                </button>
              </div>
            </td>
          </tr>

          <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
        </tbody>
      </table>
      <div :id="idTable" v-if="columns" class="table lg:hidden">
        <table
          v-for="element in data.data"
          :key="element.id"
          class="
            divide-y divide-gray-200
            hover
            border border-gray-200
            rounded-sm
            table
            stacktable
            small-only
          "
        >
          <tbody>
            <tr
              v-for="column in columns"
              :key="column.id"
              class="border-b border-gray-100"
            >
              <td class="st-key">{{ column.name }}</td>
              <td
                class="st-val px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                {{ $eval(column.slot, element) }}
              </td>
            </tr>

            <tr class="border-b border-gray-100">
              <td class="st-key">Acciones</td>
              <td
                class="
                  st-val
                  px-6
                  py-4
                  whitespace-nowrap
                  text-right text-sm
                  font-medium
                "
              >
                <div class="flex align-middle justify-end items-center">
                  <!-- :href="route(context+'.edit', element.id)" -->
                  <a
                   v-if="element.can.update"
                    
                    class="
                      mr-2
                      inline-flex
                      items-center
                      px-2
                      py-2
                      border border-gray-300
                      rounded-md
                      shadow-sm
                      text-sm
                      font-medium
                      text-gray-700
                      bg-gray-50
                      hover:bg-gray-100
                      focus:outline-none
                      focus:ring-2 focus:ring-offset-2 focus:ring-gray-500
                    "
                    data-toggle="tooltip"
                    title="Agregar"
                  >
                    <svg
                      class="mr-2 w-5 h-5 text-gray-500"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                      />
                    </svg>
                    Editar
                  </a>
                  <button
                  v-if="element.can.delete"
                    @click="deleteItem(element.id)"
                    class="
                      mr-2
                      inline-flex
                      items-center
                      px-2
                      py-2
                      border border-transparent
                      rounded-md
                      shadow-sm
                      text-sm
                      font-medium
                      text-white
                      bg-red-500
                      hover:bg-red-600
                      focus:outline-none
                      focus:ring-2 focus:ring-offset-2 focus:ring-red-500
                    "
                  >
                    <svg
                      class="mr-2 h-5 w-5"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <line x1="4" y1="7" x2="20" y2="7" />
                      <line x1="10" y1="11" x2="10" y2="17" />
                      <line x1="14" y1="11" x2="14" y2="17" />
                      <path
                        d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"
                      />
                      <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                    </svg>
                    Eliminar
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div>
      <!-- <jet-pagination class="mb-2" :links="data.links" /> -->
    </div>
  </div>
</template>

<script>
// import JetPagination from "@/Components/Tools/Pagination";
// import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    // JetPagination,
  },
  methods: {
    $eval(expr, obj) {
      var item = eval("obj." + expr);
      return item;
    },
    // deleteItem(contextId) {
    //   if (this.context) {
    //     const result = confirm("¿Eliminar Elemento de forma permanente?");
    //     if (result) {
    //       this.$inertia.delete(route(this.context + ".destroy", contextId), {
    //         preserveScroll: true,
    //         onSuccess: (page) => {
    //           Swal.fire(
    //             "¡Listo!",
    //             "Elemento eliminado correctamente",
    //             "success"
    //           );
    //         },
    //       });
    //     }
    //   }
    // },
  },
  props: {
    columns: Array,
    data: Object,
    idTable: String,
    context: String,
  },
};
</script>
    
<style>
.stacktable {
  width: 100%;
}
.st-head-row {
  padding-top: 1em;
}
.st-head-row.st-head-row-main {
  font-size: 1.5em;
  padding-top: 0;
}
.st-key {
  width: 49%;
  text-align: left;
  padding-right: 1%;
  background: rgb(249, 250, 251);
}
.st-val {
  width: 49%;
  padding-left: 1%;
}

.stacktable.small-only {
  /* margin-top: 2rem; */
  margin-bottom: 4rem;
  border: 2px solid rgba(52, 211, 153, 0.7) !important;
  border-radius: 20px !important;
}
</style>