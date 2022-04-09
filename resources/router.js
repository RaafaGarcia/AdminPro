

import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/Components/Views/Home.vue'

import Login from '@/Components/Views/Login.vue'

import Register from '@/Components/Views/Register.vue'

import DahboardLayout from '@/Components/Layouts/Layout.vue'

import Dashboard from '@/Components/Views/Dashboard.vue'

import Reset from '@/Components/Views/ResetPassword.vue'

import Forgot from '@/Components/Views/ForgotPassword.vue'



const router = createRouter({
    history: createWebHistory(),


    routes: [
        // {
        //     path: '/',
        //     name: 'home',
        //     component: Home
        // },
        {
            name:"login",
            path:"/login",
            component:Login,
            meta:{
                middleware:"guest",
                title:`Login`
            }
        },
        {
            name:"register",
            path:"/register",
            component:Register,
            meta:{
                middleware:"guest",
                title:`Register`
            }
        },
        {
            name:"forgot",
            path:"/password/forgot",
            component:Forgot,
            meta:{
                middleware:"guest",
                title:`Restablecer Contraseña`
            }
        },
        {
            name:"reset",
            path:"/password/reset/:token",
            component:Reset,
            meta:{
                middleware:"guest",
                title:`Restablecer Contraseña`
            }
        },
        {
            name:"dashboard",
            path:"/",
            component:Dashboard,
            meta:{
                middleware:"auth",
                title:'Dashboard'
            },
            
        }


    ],

});



export default router