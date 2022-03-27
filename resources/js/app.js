require('./bootstrap');
import { createApp } from 'vue'

import App from '@/Components/App.vue'
import store from './../store'
import router from './../router'

const app = createApp(App)
.use(store)
.use(router)

// app.component('App', App)
router.beforeEach((to, from, next) => {
    document.title = `${to.meta.title} - ${process.env.MIX_APP_NAME}`
    if(to.meta.middleware=="guest"){
        if(store.state.auth.authenticated){
            next({name:"dashboard"})
        }
        next()
    }else{
        if(store.state.auth.authenticated){
            next()
        }else{
            next({name:"login"})
        }
    }
})
app.mount('#app')
