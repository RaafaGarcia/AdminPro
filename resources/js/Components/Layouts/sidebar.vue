<template>
  <div class="container-fluid m-0 p-0">
    <div class="flex flex-wrap bg-white" style="width: 100vw">
      <!-- Sidebar starts -->
      <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
      <div
        class="
          md:w-1/4
          lg:w-1/6
          sm:w-2/6 sm:relative
          bg-white
          shadow
          flex-col
          justify-between
          hidden
          sm:flex
        "
        style="min-height: 93vh"
      >
        <div class="px-4">
          <div class="Segment">
            <p class="uppercase text-xs text-green-600 mt-4 tracking-wider">
              ADMIN
            </p>

            <!-- end link -->
            <!-- {{$route}} -->
            <ul class="mt-4">
              <!--  -->
              <side-link
                :href="'/'"
                :active="routeName.includes('dashboard') ? true : false"
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
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
                    <rect x="4" y="4" width="6" height="6" rx="1" />
                    <rect x="4" y="14" width="6" height="6" rx="1" />
                    <rect x="14" y="14" width="6" height="6" rx="1" />
                    <line x1="14" y1="7" x2="20" y2="7" />
                    <line x1="17" y1="4" x2="17" y2="10" />
                  </svg>
                  <span class="text-sm ml-2">Tablero</span>
                </div>
              </side-link>
              <!--  -->
              <side-link
                :href="'/users'"
                :active="routeName.includes('users') ? true : false"
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                  </svg>
                  <span class="text-sm ml-2">Usuarios</span>
                </div>
              </side-link>
              <!--  -->
              <side-link
                :href="'/roles'"
                :active="routeName.includes('roles') ? true : false"
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 9.9-1" />
                  </svg>
                  <span class="text-sm ml-2">Permisos</span>
                </div>
              </side-link>
              <!--  -->
              <side-link
                :href="'/notifications'"
                :active="routeName.includes('notifications') ? true : false"
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                  </svg>

                  <span class="text-sm ml-2">Notificaciones</span>
                </div>
              </side-link>
            </ul>
          </div>

          <div class="Segment">
            <p class="uppercase text-xs text-green-600 mt-4 tracking-wider">
              BLOG
            </p>

            <!-- end link -->

            <ul class="mt-4">
              <!--  -->
              <side-link
                :href="'/blog_users'"
                :active="routeName.includes('blog_users') ? true : false"
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                  </svg>
                  <span class="text-sm ml-2">Blog Usuarios</span>
                </div>
              </side-link>
              <!--  -->
              <side-link
                :href="'/blog_categories'"
                :active="routeName.includes('blog_categories') ? true : false"
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                  </svg>

                  <span class="text-sm ml-2">Categorias</span>
                </div>
              </side-link>
              <!--  -->
              <side-link
                :href="'/blog_subcategories'"
                :active="
                  routeName.includes('blog_subcategories') ? true : false
                "
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
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
                    <path
                      d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"
                    />
                  </svg>

                  <span class="text-sm ml-2">Subcategorias</span>
                </div>
              </side-link>
              <!--  -->
              <side-link
                :href="'/blog_posts'"
                :active="routeName.includes('blog_posts') ? true : false"
              >
                <div class="flex items-center">
                  <svg
                    class="h-5 w-5"
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
                    <path
                      d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"
                    />
                    <line x1="8" y1="8" x2="12" y2="8" />
                    <line x1="8" y1="12" x2="12" y2="12" />
                    <line x1="8" y1="16" x2="12" y2="16" />
                  </svg>

                  <span class="text-sm ml-2">Publicaciones</span>
                </div>
              </side-link>

              <!-- <side-link
                :href="'blog_categories.index'"
                :active="'blog_categories.*'"
              >
                <div class="flex items-center">
                <svg class="h-5 w-5 0"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>

                  <span class="text-sm ml-2">Comentarios</span>
                </div>
              </side-link> -->
            </ul>
          </div>
        </div>

        <div class="px-8 border-t border-green-600">
          <div class="text-center text-sm pt-3">
            <b>Administrador</b>
            <br /><span class="text-yellow-600">Harvii</span> México
            <br />@Copyright 2021
          </div>
        </div>
      </div>
      <div class="md:w-3/4 lg:w-5/6 sm:w-4/6 m-0 p-0">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
import JetResponsiveNavLink from "@/Components/Jetstream/ResponsiveNavLink";
import SideLink from "@/Components/Tools/SidebarLink";

export default {
  components: {
    JetResponsiveNavLink,
    SideLink,
  },
  name: "LightWithIconsAtBottom",
  data() {
    return {
      moved: false,
      routeName: this.$route.name,
    };
  },
  methods: {
    // sidebarHandler() {
    //   var sideBar = document.getElementById("mobile-nav");
    //   sideBar.style.transform = "translateX(-260px)";
    //   if (this.$data.moved) {
    //     sideBar.style.transform = "translateX(0px)";
    //     this.$data.moved = false;
    //   } else {
    //     sideBar.style.transform = "translateX(-260px)";
    //     this.$data.moved = true;
    //   }
    //   console.log(this.$data.moved);
    // },
  },
  created() {},
};
</script>
