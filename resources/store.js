import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from './js/store/auth'
const store = createStore({
  state: {
    url:'http://127.0.0.1/',
    api:'http://127.0.0.1/'
  },
  plugins:[
    createPersistedState()
],
modules:{
    auth
},
  
})



export default store
