<template>
  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <!-- <jet-validation-errors class="mb-4" /> -->
    <!-- <pre>
        {{form.email}}
        {{form.token}}
    </pre> -->
    
    <!-- {{email}} -->
    <form @submit.prevent="submit">
      <!-- <div>
        <jet-label for="email" value="Correo Electrónico" />
        <jet-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autofocus
        />
      </div> -->

   
      <div class="mt-4">
        <jet-label for="password" value="Contraseña" />
        <input
          type="password"
          v-model="form.password"
          placeholder="Contraseña"
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
          autocomplete="new-password"
          required
          autofocus
        />
      </div>

      <div class="mt-4">
        <jet-label for="password_confirmation" value="Confirmar Contraseña" />
        <input
          type="password"
         v-model="form.password_confirmation"
          placeholder="Confirmar Contraseña"
          autocomplete="new-password"
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
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Restablecer la contraseña
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

  
  data() {
    return {
      form: {
        token:this.$route.params.token,
        email: this.$route.query.email,
        password: "",
        password_confirmation: "",
      },
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
        .post("/password/reset", this.form)
        .then(({ data }) => {
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Contraseña Guardada!',
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
