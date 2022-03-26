<template>
  <div>
    <jet-banner />

    <div class="">
      <nav class="bg-white border-b border-gray-400">
        <!-- Primary Navigation Menu -->
        <div class="container-fluid px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center h-16">
            <div class="flex items-center " >
              <!-- Logo -->
              <div class="flex-shrink-0 flex items-center">
              <router-link to="/">
                  <jet-application-mark class="block w-auto pb-1 pt-1" />
                </router-link>
              </div>

              <!-- Navigation Links -->
            </div>
            <div class="flex items-center " >
              <!-- <notifications /> -->
              <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- <div class="ml-3 relative">
                <jet-nav-link
                class="semibold text-xl"
                  v-if="$page.props.user"
                  :href="route('dashboard')"
                  :active="route().current('dashboard')"
                >
                  Tablero
                </jet-nav-link>
              </div> -->

                <!-- Settings Dropdown -->
                <div  class="ml-3 relative">
                  <jet-dropdown align="right" width="48">
                    <template #trigger>
                      <button
                        class="
                          flex
                          text-sm
                          border-2 border-transparent
                          rounded-full
                          focus:outline-none focus:border-gray-300
                          transition
                        "
                      >
                        <!-- <img
                          class="h-9 w-9 rounded-full object-cover"
                          :src="$page.props.user.profile_photo_url"
                          :alt="$page.props.user.name"
                        /> -->
                      </button>
                    </template>

                    <template #content>
                      <!-- Account Management -->
                      <div class="block px-4 py-2 text-xs text-gray-400">
                        Administrar cuenta
                      </div>
                      <!-- <jet-dropdown-link :href="route('profile.show')">
                        Perfil
                      </jet-dropdown-link> -->

                      <div class="border-t border-gray-100"></div>

                      <!-- Authentication -->
                      <form @submit.prevent="logout">
                        <jet-dropdown-link as="button">
                          Cerrar sesión
                        </jet-dropdown-link>
                      </form>
                    </template>
                  </jet-dropdown>
                </div>

                <div  class="ml-3 relative">
                  <!-- <inertia-link
                    :href="route('login')"
                    style="border-radius: 15px"
                    class="semibold text-xl"
                  >
                    <i class="fas fa-user"></i> <span>Cuenta</span>
                  </inertia-link> -->
                </div>
              </div>

              <div class="-mr-2 flex items-center sm:hidden">
                <button
                  @click="
                    showingNavigationDropdown = !showingNavigationDropdown
                  "
                  class="
                    inline-flex
                    items-center
                    justify-center
                    p-2
                    rounded-md
                    text-gray-400
                    hover:text-gray-500 hover:bg-gray-100
                    focus:outline-none focus:bg-gray-100 focus:text-gray-500
                    transition
                  "
                >
                  <svg
                    class="h-6 w-6"
                    stroke="currentColor"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <path
                      :class="{
                        hidden: showingNavigationDropdown,
                        'inline-flex': !showingNavigationDropdown,
                      }"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"
                    />
                    <path
                      :class="{
                        hidden: !showingNavigationDropdown,
                        'inline-flex': showingNavigationDropdown,
                      }"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
          class="sm:hidden"
        >
          <div class="pt-2 pb-3 space-y-1">
            <!-- <jet-responsive-nav-link
              :href="route('home')"
              :active="route().current('home')"
            >
              Inicio 1
            </jet-responsive-nav-link> -->
          </div>
          <div
            class="
              
             
              flex-col
              justify-between
              
            "
            
          >
            <div class="px-4">
              <div class="Segment">
                <p class="uppercase text-xs text-green-600 mt-4 tracking-wider">
                  ADMIN
                </p>

                <!-- end link -->

                <ul class="mt-4">
                  <!-- <side-link
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                  >
                    <div class="flex items-center " >
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

                  <side-link
                    :href="route('users.index')"
                    :active="route().current('users.*')"
                  >
                    <div class="flex items-center " >
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
                  <side-link
                    :href="route('roles.index')"
                    :active="route().current('roles.*')"
                  >
                    <div class="flex items-center " >
                      <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <rect
                          x="3"
                          y="11"
                          width="18"
                          height="11"
                          rx="2"
                          ry="2"
                        />
                        <path d="M7 11V7a5 5 0 0 1 9.9-1" />
                      </svg>
                      <span class="text-sm ml-2">Permisos</span>
                    </div>
                  </side-link>

                  <side-link
                    :href="route('notifications.index')"
                    :active="route().current('notifications.*')"
                  >
                    <div class="flex items-center " >
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
                  </side-link> -->
                </ul>
              </div>

              <div class="Segment">
                <p class="uppercase text-xs text-green-600 mt-4 tracking-wider">
                  BLOG
                </p>

                <!-- end link -->

                <ul class="mt-4">
                  <!-- <side-link
                    :href="route('blog_users.index')"
                    :active="route().current('blog_users.*')"
                  >
                    <div class="flex items-center " >
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
                  <side-link
                    :href="route('blog_categories.index')"
                    :active="route().current('blog_categories.*')"
                  >
                    <div class="flex items-center " >
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

                  <side-link
                    :href="route('blog_subcategories.index')"
                    :active="route().current('blog_subcategories.*')"
                  >
                    <div class="flex items-center " >
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

                  <side-link
                    :href="route('blog_posts.index')"
                    :active="route().current('blog_posts.*')"
                  >
                    <div class="flex items-center " >
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
                  </side-link> -->

                  <!-- <side-link
                :href="route('blog_categories.index')"
                :active="route().current('blog_categories.*')"
              >
                <div class="flex items-center " >
                <svg class="h-5 w-5 0"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>

                  <span class="text-sm ml-2">Comentarios</span>
                </div>
              </side-link> -->
                </ul>
              </div>
            </div>
          </div>

          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
              <!-- <div v-if="$page.props.user">
                <div class="font-medium text-base text-gray-800">
                  {{ $page.props.user.name }}
                </div>
                <div class="font-medium text-sm text-gray-500">
                  {{ $page.props.user.email }}
                </div>
              </div> -->
            </div>
            <div class="mt-3 space-y-1">
              <!-- <jet-responsive-nav-link
                :href="route('profile.show')"
                :active="route().current('profile.show')"
              >
                Perfil
              </jet-responsive-nav-link> -->

              <!-- Authentication -->
              <form method="POST" @submit.prevent="logout">
                <jet-responsive-nav-link as="button">
                  Cerrar sesión
                </jet-responsive-nav-link>
              </form>
            </div>
          </div>
        </div>
      </nav>

      <sidebar>
        <slot></slot>
      </sidebar>
    </div>
  </div>
</template>

<script>

import JetApplicationMark from "@/Components/Jetstream/ApplicationMark";
import JetBanner from "@/Components/Jetstream/Banner";
import JetDropdown from "@/Components/Jetstream/Dropdown";
import JetDropdownLink from "@/Components/Jetstream/DropdownLink";
import JetNavLink from "@/Components/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Components/Jetstream/ResponsiveNavLink";
import sidebar from "@/Components/Layouts/sidebar";

// import Notifications from "@/Components/Tools/Notifications";
// import SideLink from "@/Components/Tools/SidebarLink";

export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    sidebar,
    // Notifications,
    // SideLink
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    

    
  },
};
</script>
