<template>
  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      ¿Olvidaste tu contraseña? No hay problema. Simplemente díganos su
      dirección de correo electrónico y le enviaremos un enlace para restablecer
      la contraseña que le permitirá elegir una nueva.
    </div>

    <form @submit.prevent="submit">
      <div>
        <jet-label for="email" value="Correo Electrónico" />
        <input
          type="email"
          v-model="email"
          placeholder="Ingresa tu correo"
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
          autofocus
        />
      </div>
       <div v-if="errors" class="alert alert-danger mt-3" role="alert">
            {{ errors }}
          </div>

      <div class="flex items-center justify-end mt-4">
        <button class="w-full
              block
              bg-green-600
              hover:bg-green-400
              focus:bg-green-400
              text-white
              font-semibold
              rounded-lg
              px-4
              py-3
              mt-6"
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Correo electrónico Enlace de restablecimiento de contraseña
        </button>
      </div>
    </form>
  </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from "@/Components/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Components/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Components/Jetstream/Button";
import JetInput from "@/Components/Jetstream/Input";
import JetLabel from "@/Components/Jetstream/Label";
import JetValidationErrors from "@/Components/Jetstream/ValidationErrors";
import Swal from 'sweetalert2'

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetLabel,
    JetValidationErrors,
  },

  props: {
    status: String,
  },

  data() {
    return {
      email: "",
      errors: "",
      processing: false,
    };
  },

  methods: {
   async submit() {
      this.errors = "";
      this.processing = true;
      await axios.get("/sanctum/csrf-cookie");
      await axios
        .post("/password/email", {email:this.email})
        .then(({ data }) => {
         Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Correo enviado!',
            showConfirmButton: false,
            timer: 1500
            })
            this.$router.push('/login') 
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
