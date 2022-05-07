<template>
  <app-layout>
    <!--Replace with your tailwind.css once created-->

    <div
      class="bg-gray-100 text-gray-900 tracking-wider leading-normal"
      style="min-height: 93vh"
    >
      <div class="container w-full mx-auto px-2 pt-4">
        <div class="card-header text-lg bg-green-500 text-white">
          <div class="flex justify-between align-middle items-center">
            <div>
              <b>Usuarios del administrador</b>
            </div>
            <div>
              <div class="flex align-middle items-center">
                <a :href="'users.create'">
                  <div
                    class="mr-2 p-1 hover:bg-green-600 rounded-md"
                    data-toggle="tooltip"
                    title="Agregar"
                  >
                    <svg
                      class="h-7 w-7 text-white"
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
                      <line x1="12" y1="5" x2="12" y2="19" />
                      <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Container-->
      <div class="container w-full mx-auto px-2">
        <!--Card-->
        <div id="recipients" class="pad-2 mt-6 lg:mt-0 rounded shadow bg-white">
          <div class="flex items-center justify-between">
            <div>Página: {{ page }}</div>
            <div class="mt-1 mb-3 relative rounded-md shadow-sm">
              <div
                class="
                  absolute
                  inset-y-0
                  left-0
                  pl-2
                  pr-1
                  py-2
                  flex
                  items-center
                  pointer-events-none
                "
              >
                <span class="text-gray-500 sm:text-">
                  <i class="fas fa-search fa-sm"></i>
                </span>
              </div>
              <input
                type="text"
                name="price"
                id="price"
                v-model="form.search"
                class="
                  focus:ring-green-500 focus:border-green-500
                  block
                  w-full
                  py-2
                  pl-7
                  pr-12
                  sm:text-sm
                  border-gray-300
                  rounded-md
                "
                placeholder="Buscar usuario..."
              />
              <div class="absolute inset-y-0 right-0 flex items-center">
                <button
                  v-if="form.search"
                  @click="form.search = ''"
                  id="currency"
                  name="currency"
                  class="
                    focus:ring-green-500 focus:border-green-500
                    h-full
                    py-0
                    pl-2
                    pr-3
                    border-transparent
                    bg-transparent
                    text-gray-500
                    sm:text-sm
                    rounded-md
                  "
                >
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <div v-if="spiner" class="flex justify-center">
            <div class="spinner-border w-20 h-20 border-4"  role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

          <table-responsive
            v-if="users && !spiner"
            :columns="columns"
            :data="users"
            :idTable="'UserAdmin'"
            :context="'users'"
          />

          <jet-pagination
            @select="getUsers()"
            v-if="users"
            class="mb-2"
            reference="users"
            :links="users.links"
            querys=""
          />
        </div>
        <!--/Card-->
      </div>
      <!--/container-->
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Components/Layouts/AppLayout";
import JetButton from "@/Components/Jetstream/Button";
import JetInput from "@/Components/Jetstream/Input";
import JetPagination from "@/Components/Tools/Pagination";
import { users } from "@/Api.js";

import TableResponsive from "@/Components/Tools/TableResponsive.vue";
// import JetPagination from "@/Components/Tools/Pagination";
export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    JetPagination,

    TableResponsive,
  },
  data() {
    return {
      spiner: false,
      form: {
        search: "",
        page: "",
      },
      page: 1,
      users: null,
      data: null,
      columns: [
        {
          id: 5,
          name: "Id",
          slot: "id",
        },
        {
          id: 1,
          name: "Nombre",
          slot: "name",
        },
        {
          id: 2,
          name: "Correo Electrónico",
          slot: "email",
        },
        {
          id: 3,
          name: "Rol",
          slot: "role.name",
        },
        {
          id: 4,
          name: "Fecha de creación",
          slot: "created_at",
        },
      ],
    };
  },
  methods: {
    async getUsers() {
      this.users = null;
      this.spiner = true;
      if (this.$route.query?.page) {
        this.page = this.$route.query?.page;
      }
      let data = await users.getUsers("?page=" + this.page);
      if (data.result) {
        this.users = data?.result;
      }
this.spiner = false;
      // console.log(data);
    },
  },

  props: {
    filters: Object,
  },

  mounted() {
    this.getUsers();

    // console.log(users)
  },
};
</script>
<style>
.pad-2 {
  padding: 0.5rem;
}
@media (min-width: 768px) {
  .pad-2 {
    padding-left: 1rem;
    padding-right: 1rem;
  }
}
</style>
