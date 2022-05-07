import axios from 'axios'
import router from '../router'
import Swal from 'sweetalert2'

axios.get("/sanctum/csrf-cookie");

var api = 'http://127.0.0.1/api/';
var errors = {
  "This action is unauthorized.": "Esta acción no esta autorizada",
}

var generals = {
  autorizationInvalid() {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: 'No esta autorizado',
      showConfirmButton: false,
      timer: 1500,
    });
    router.push({ name: 'dashboard' })
  },

  basicError(mesage) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: mesage,
      showConfirmButton: false,
      timer: 1500,
    });
  }
}

var users = {

  async getUsers(querys) {
    let Items = 1;
    // return "algo";
    await axios
      .get(api + "users"+querys)
      .then(({ data }) => {
        // alert(data);
        Items = data
      })
      .catch(({ response: { data, status } }) => {
        if (status == 403) {
          generals.autorizationInvalid();
          return '';
        }
        console.log(status)
        if (errors[data.message]) {
          // alert('si')
          Items = { error: errors[data.message] }
        } else {
          Items = { error: data.message }
        }


      })
    if (Items?.error) {
      generals.basicError(Items?.error);
    }
    return Items;
  }
}

export { users };