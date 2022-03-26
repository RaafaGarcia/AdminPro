import { createStore } from 'vuex'

const store = createStore({
  state () {
    return {
      token: localStorage.getItem('access_token') || null,
      fechas:{inicio:"2021/12/8",fin:"2021/12/9"},
      soporte:"https://btsummit.com.mx/stands/10",
      logo:"https://axk9asgqlzyu.compat.objectstorage.us-phoenix-1.oraclecloud.com/ExpoBuilder-Prueba/logos/logo_bts2021.png",
      solicitudes:[],
      uri_agendas: "https://btsummit.com.mx/meet/",
      // api: "http://127.0.0.1:8000/",
      // api:"http://backend.sandbox.imefgdlsummit.com/",
       api:"https://backend.btsummit.com.mx/",
      user: { "id": 0, "name": "", "last_name": "", "type": "", "email": "", "email_verified_at": null, "phone": "", "img": null, "rfc": null, "created_at": null, "updated_at": "2020-11-22T08:14:29.000000Z" }
    }
  },
  getters: {
    loggedIn(state) {
      return state.token !== null
    },
    typeUser(state) {
      if (state.user == null) {
        return "client"
      } else {
        return state.user.type
      }
    }
  },
  mutations: {
    increment (state) {
      state.count++
    }
  },
  mutations: {
    retrieveToken(state, token) {
      state.token = token
    },
    destroyToken(state) {
      state.token = null
    }
  },
  actions: {
    retrieveToken(context, credentials) {
      return new Promise((resolve, reject) => {
        axios.post(context.state.api + 'api/login', {
          email: credentials.username,
          password: credentials.password,
          grant_type: 'password',
          client_id: 2,
          client_secret: 'EBgJVkFEaw2LDxQSfuH1twexN9QZBKeym0g8Vs9X',
        })
          .then(response => {
            //console.log(response)
            const token = response.data.access_token
            axios.get(context.state.api + 'api/user', {
              headers: {
                Authorization: "Bearer " + token,
                'Access-Control-Allow-Origin': '*'
              }
            })
              .then(respuesta => {
                //console.log(response)
                var user = respuesta.data

                context.state.user = respuesta.data;
                context.state.token = token

                //  sessionStorage.setItem('User',JSON.stringify(respuesta.data));
                localStorage.setItem('access_token', token)
                localStorage.setItem('logged', true)
                context.commit('retrieveToken', token)
                resolve(response)
              })
              .catch(error => {
                console.log(error)
              })

          })
          .catch(error => {
            console.log(error)
            reject(error)
          })
      })

    },
    destroyToken(context) {

      if (context.getters.loggedIn) {

        return new Promise((resolve, reject) => {
          axios.post('/api/logout', '', {
            headers: { Authorization: "Bearer " + context.state.token }
          })
            .then(response => {
              //console.log(response)
              localStorage.removeItem('access_token')
              localStorage.removeItem('logged')
              // sessionStorage.removeItem('User');

              context.commit('destroyToken')
              context.state.user = null;

              resolve(response)
            })
            .catch(error => {
              //console.log(error)
              localStorage.removeItem('access_token')
              localStorage.removeItem('logged')
              // sessionStorage.removeItem('User');

              context.commit('destroyToken')
              context.state.user = null;

              reject(error)
            })
        })

      }
    },
    getUser(context) {

      if (context.getters.loggedIn) {

        return new Promise((resolve, reject) => {
          axios.get(context.state.api + 'api/user', {
            headers: { Authorization: "Bearer " + context.state.token }
          })
            .then(response => {
              context.state.user = response.data
              //console.log(response)
              // sessionStorage.setItem('User',JSON.stringify(response.data));

              resolve(response)
            })
            .catch(error => {
              //console.log(error)
              localStorage.removeItem('access_token')
              localStorage.removeItem('logged')
              // sessionStorage.removeItem('User');

              context.commit('destroyToken')
              context.state.user = null;
              

              reject(error)
            })
        })

      }else{
        return "no logeado";
      }
    },
    getPendientes(context) {
      if (context.getters.loggedIn) {
        if (!context.state.user.empresa_id) {
          context.state.solicitudes = []
          return false;
        }
        axios
        .get(
          context.state.api +
            "api/agendas/solicitudes-host?empresa_id=" +
            context.state.user.empresa_id
        )

        .then((response) => {
          if (response.status == 200) {
            context.state.solicitudes = response.data.data;
          } else {
          }
        })
        .catch((error) => {});
      }else{
        return "no logeado";
      }
     

     
     
    },

  }
})



export default store
