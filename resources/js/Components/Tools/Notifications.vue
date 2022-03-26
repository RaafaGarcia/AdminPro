<template>
  <div class="flex items-center">
    <div class="relative">
      <button
        @click="show = !show"
        class="
          relative
          z-10
          inline-block
          rounded-md
          p-2
          focus:outline-none
          hover:bg-gray-100
        "
      >
        <span class="relative inline-block mt-2">
          <span
            class="
              absolute
              top-0
              right-0
              inline-block
              w-2
              h-2
              transform
              translate-x-1/2
              -translate-y-1/2
              bg-red-600
              rounded-full
            "
          ></span>
          <svg
            class="h-6 w-6 text-gray-800"
            width="24"
            height="24"
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
        </span>
      </button>

      <div
        v-show="show"
        @click="show = false"
        class="fixed inset-0 h-full w-full z-10"
        style="background: rgba(0, 0, 0, 0.2)"
      ></div>

      <div
        v-show="show"
        class="absolute bg-white rounded-sm shadow-lg overflow-hidden z-20"
        style="width: 20rem; right: -3rem"
      >
        <div class="">
          <template v-if="$page.props?.notifications?.length">
            <div v-for="notify in $page.props.notifications" :key="notify.id">
              <a
                href="#"
                @click="readNotification(notify.id)"
                :class="notify.read_at ? '' : 'bg-blue-50'"
                class="row pl-2 pr-4 py-2 border-b hover:bg-gray-100"
              >
                <div class="flex justify-center col-3 text-sm p-0 pl-2">
                  <img
                    class="
                      h-14
                      w-14
                      rounded-full
                      object-cover
                      border-2 border-gray-100
                      focus:outline-none
                      focus:border-gray-300
                      transition
                    "
                    :src="notify.models?.User?.profile_photo_url"
                    :alt="notify.models?.User?.name"
                  />
                </div>

                <div class="col-9 p-0">
                  <p class="font-bold text-sm mx-1" href="#">
                    {{ notify.models?.User?.name }}
                  </p>
                  <p class="text-gray-600 text-sm mx-1">
                    {{ notify.data?.body }}
                  </p>
                  <div
                    class="flex justify-between items-center flex-nowrap pt-2"
                  >
                    <div class="ml-1 flex items-end">
                      <svg
                        v-if="notify.data?.subtype == 'create'"
                        class="h-5 w-5 text-green-500"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="16" />
                        <line x1="8" y1="12" x2="16" y2="12" />
                      </svg>
                      <svg
                        v-if="notify.data?.subtype == 'update'"
                        class="h-5 w-5 text-blue-500"
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
                        <circle cx="12" cy="12" r="9" />
                        <line x1="12" y1="8" x2="12.01" y2="8" />
                        <polyline points="11 12 12 12 12 16 13 16" />
                      </svg>
                      <svg
                        v-if="notify.data?.subtype == 'delete'"
                        class="h-5 w-5 text-red-500"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <circle cx="12" cy="12" r="10" />
                        <line x1="15" y1="9" x2="9" y2="15" />
                        <line x1="9" y1="9" x2="15" y2="15" />
                      </svg>
                        <span v-if="!notify?.read_at" class="text-muted ml-1 text-xs">
                          Sin leer
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 float-right">
                      {{ parseDate(notify.data?.action_id) }}
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </template>
          <div v-else>
            <div class="alert alert-info mb-0 text-center">
              Usted no tiene notificaciones
            </div>
          </div>

          <!-- <a
            href="#"
            class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2"
          >
            <img
              class="h-8 w-8 rounded-full object-cover mx-1"
              src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
              alt="avatar"
            />
            <p class="text-gray-600 text-sm mx-2">
              <span class="font-bold" href="#">Slick Net</span> start following
              you . 45m
            </p>
          </a>
          <a
            href="#"
            class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2"
          >
            <img
              class="h-8 w-8 rounded-full object-cover mx-1"
              src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
              alt="avatar"
            />
            <p class="text-gray-600 text-sm mx-2">
              <span class="font-bold" href="#">Jane Doe</span> Like Your reply
              on
              <span class="font-bold text-blue-500" href="#"
                >Test with TDD</span
              >
              artical . 1h
            </p>
          </a>
          <a
            href="#"
            class="flex items-center px-4 py-3 hover:bg-gray-100 -mx-2"
          >
            <img
              class="h-8 w-8 rounded-full object-cover mx-1"
              src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80"
              alt="avatar"
            />
            <p class="text-gray-600 text-sm mx-2">
              <span class="font-bold" href="#">Abigail Bennett</span> start
              following you . 3h
            </p>
          </a> -->
        </div>
        <inertia-link
          :href="route('notifications.index')"
          class="block bg-green-600 text-white text-center font-bold py-2"
        >
          Ver todas
        </inertia-link>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import "moment/locale/es-mx";

export default {
  data() {
    return {
      messages: [],
      users: [],
      errors: [],
      show: false,
    };
  },
  props: {
    notifications: {
      type: Array,
      default: [],
    },
  },
  methods: {
    parseDate: function (date) {
      moment.locale("es-mx");
      let format = new Date(date);
      return moment(format).fromNow();
    },
    addNotification() {
      let form = this.$inertia.form({ mensaje: "mensaje" });
      form.post(route("notifications.store"));
    },
    listen: function () {
      let $el = this;
      var channel = window.Echo.channel("my-channel");

      channel.listen(".my-event", function (data) {
        $el.getNotifications();
        console.log("event");
      });
    },
    getNotifications() {
      this.$inertia.reload(
        {},
        { preserveState: true, preserveScroll: true, replace: true }
      );
    },
    readNotification(NotyfyId) {
      this.$inertia.post(
        route("notifications.show"),
        { id: NotyfyId },
        { preserveState: true, preserveScroll: true, replace: true }
      );
    },
  },
  mounted() {
    this.listen();
    this.getNotifications();
  },
};
</script>

<style>
</style>