<template>
  <!-- component -->
  <section
    class="flex flex-col md:flex-row h-screen items-center justify-center"
  >
    <div
      class="
        bg-gradient-to-r
        from-green-600
        via-green-500
        to-green-400
        hidden
        lg:block
        w-full
        md:w-1/2
        xl:w-2/3
        h-screen
      "
    >
      <!-- <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover"> -->
    </div>

    <div
      class="
        bg-white
        w-full
        md:max-w-md
        lg:max-w-full
        md:mx-auto md:mx-0 md:w-1/2
        xl:w-1/3
        h-screen
        px-6
        lg:px-16
        xl:px-12
        flex
        items-center
        justify-center
      "
    >
      <div class="w-full h-100">
        <h1 class="text-xl md:text-2xl font-bold leading-tight mt-20">
          Accede con tu cuenta
        </h1>

        <form class="mt-6" @submit.prevent="login">
          <div>
            <label class="block text-gray-700">Correo Electrónico</label>
            <input
              type="email"
              name=""
              id=""
              v-model="auth.email"
              placeholder="Ingresa tu email"
              class="
                w-full
                px-4
                py-3
                rounded-lg
                bg-gray-200
                mt-2
                border
                focus:border-green-500 focus:bg-white focus:outline-none
              "
              autofocus
              autocomplete
              required
            />
          </div>

          <div class="mt-4">
            <label class="block text-gray-700">Contraseña</label>
            <input
              type="password"
              name=""
              id=""
              v-model="auth.password"
              placeholder="Ingresa tu contraseña"
              minlength="6"
              class="
                w-full
                px-4
                py-3
                rounded-lg
                bg-gray-200
                mt-2
                border
                focus:border-green-500 focus:bg-white focus:outline-none
              "
              required
            />
          </div>

          <div class="text-right mt-2">
          <router-link :to="{name:'forgot'}"
              class="
                text-sm
                font-semibold
                text-gray-700
                hover:text-green-700
                focus:text-green-700
              "
            >
              ¿Olvidaste tu contraseña?
            </router-link>
          </div>

          <button
            :disabled="processing"
            type="submit"
            class="
              w-full
              block
              bg-green-600
              hover:bg-green-400
              focus:bg-green-400
              text-white
              font-semibold
              rounded-lg
              px-4
              py-3
              mt-6
            "
          >
            {{ processing ? "Iniciando" : "Iniciar Sesión" }}
          </button>

          <div v-if="errors" class="alert alert-danger mt-3" role="alert">
            {{ errors }}
          </div>
        </form>

        <hr class="my-6 border-gray-300 w-full" />

        <!-- <button type="button" class="w-full block bg-white hover:bg-gray-100 focus:bg-gray-100 text-gray-900 font-semibold rounded-lg px-4 py-3 border border-gray-300">
            <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6" viewBox="0 0 48 48"><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/></svg>
            <span class="ml-4">
            Accede con google</span>
            </div>
          </button> -->

        <p class="mt-8">
          Necesitas una cuenta?
          <a
            href="mailto:viisoporte@outlook.com"
            class="text-green-500 hover:text-green-700 font-semibold"
            >Ponte en contacto con el administrador</a
          >
        </p>
      </div>
    </div>
  </section>

  <!-- <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <hr/>
                        <form action="javascript:void(0)" class="row" method="post">
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" v-model="auth.email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" v-model="auth.password" name="password" id="password" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" @click="login" class="btn btn-primary bg-black btn-block">
                                    {{ processing ? "Please wait" : "Login" }}
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>Don't have an account? <router-link :to="{name:'register'}">Register Now!</router-link></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "login",
  data() {
    return {
      auth: {
        email: "",
        password: "",
      },
      errors: "",
      processing: false,
    };
  },
  methods: {
    ...mapActions({
      signIn: "auth/login",
    }),
    async login() {
      this.errors = "";
      this.processing = true;
      await axios.get("/sanctum/csrf-cookie");
      await axios
        .post("/login", this.auth)
        .then(({ data }) => {
          this.signIn();
        })
        .catch(({ response: { data } }) => {
          this.errors = data.message;
        })
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>