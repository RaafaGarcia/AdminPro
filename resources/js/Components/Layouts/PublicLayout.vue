<template>
  <div>
    <!-- <jet-banner /> -->

    <div class=" bg-gray-100">
      <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class=" mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <div class="flex-shrink-0 flex items-center">
                <inertia-link :href="route('home')" class="" >
                  <jet-application-mark class="block h-14 w-auto pb-1 pt-1" />
                </inertia-link>
              </div>

              <!-- Navigation Links -->
            </div>
            <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                
              </div> -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <div class="ml-3 relative">
                <jet-nav-link class="semibold text-xl"
                  :href="route('home')"
                  :active="route().current('home')"
                >
                  Inicio
                </jet-nav-link>
              </div>

              <div class="ml-3 relative">
                <jet-nav-link class="semibold text-xl"
                  :href="route('nosotros')"
                  :active="route().current('nosotros')"
                >
                  Nosotros
                </jet-nav-link>
              </div>

              <div class="ml-3 relative">
                <jet-nav-link class="semibold text-xl"
                  :href="route('servicios')"
                  :active="route().current('servicios')"
                >
                  Servicios
                </jet-nav-link>
              </div>

              <div class="ml-3 relative ">
                <jet-nav-link class="semibold text-xl"
                  :href="route('contacto')"
                  :active="route().current('contacto')"
                >
                  Contacto
                </jet-nav-link>
              </div>

              

              <!-- Settings Dropdown -->
              <div v-if="$page.props.user"  class="ml-3 relative">
                <jet-dropdown align="right" width="48">
                  <template #trigger>
                    <button
                      class="
                        flex
                        text-sm
                        border-2 border-transparent
                        rounded-full
                        focus:outline-none
                        focus:border-gray-300
                        transition
                      "
                    >
                      <img
                        class="h-9 w-9 rounded-full object-cover"
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.name"
                      />
                    </button>
                  </template>

                  <template #content>
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      Administrar cuenta
                    </div>

                    <jet-dropdown-link :href="route('profile.show')">
                      Perfil
                    </jet-dropdown-link>

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

              <div v-else  class="ml-3 relative">
                <inertia-link :href="route('login')" style="border-radius:15px"
                  class="semibold text-xl"
                >
                  <i class="fas fa-user "></i> <span>Cuenta</span> 
                </inertia-link>
              </div>


            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
              <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="
                  inline-flex
                  items-center
                  justify-center
                  p-2
                  rounded-md
                  text-gray-400
                  hover:text-gray-500
                  hover:bg-gray-100
                  focus:outline-none
                  focus:bg-gray-100
                  focus:text-gray-500
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

        <!-- Responsive Navigation Menu -->
        <div
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
          class="sm:hidden"
        >
          <div class="pt-2 pb-3 space-y-1">
            <jet-responsive-nav-link
              :href="route('home')"
              :active="route().current('home')"
            >
              Inicio
            </jet-responsive-nav-link>
            <jet-responsive-nav-link
              :href="route('nosotros')"
              :active="route().current('nosotros')"
            >
              Nosotros
            </jet-responsive-nav-link>
            <jet-responsive-nav-link
              :href="route('servicios')"
              :active="route().current('servicios')"
            >
              Servicios
            </jet-responsive-nav-link>
            <jet-responsive-nav-link
              :href="route('contacto')"
              :active="route().current('contacto')"
            >
              Contacto
            </jet-responsive-nav-link>

            <jet-responsive-nav-link v-if="!$page.props.user"
              :href="route('login')"
              
            >
                <i class="fas fa-user "></i> <span>Cuenta</span> 
            </jet-responsive-nav-link>
          </div>

          <!-- Responsive Settings Options -->
          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
              <!-- <div
                
                class="flex-shrink-0 mr-3"
              >
                <img
                  class="h-10 w-10 rounded-full object-cover"
                  :src="$page.props.user.profile_photo_url"
                  :alt="$page.props.user.name"
                />
              </div> -->

              <div v-if="$page.props.user">
                <div class="font-medium text-base text-gray-800">
                  {{ $page.props.user.name }}
                </div>
                <div class="font-medium text-sm text-gray-500">
                  {{ $page.props.user.email }}
                </div>
              </div>
            </div>

            <div v-if="$page.props.user" class="mt-3 space-y-1">
              <jet-responsive-nav-link
                :href="route('profile.show')"
                :active="route().current('profile.show')"
              >
                Perfil
              </jet-responsive-nav-link>

             

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

      <!-- Page Heading
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header"></slot>
        </div>
      </header> -->

      <!-- Page Content -->
      <main>
        <slot></slot>
      </main>
    </div>
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
  },
  
  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"), {
                    onFinish: () => location.reload(),
                })
      
    },
  },
};
</script>
