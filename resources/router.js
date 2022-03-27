

import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/Components/Views/Home.vue'

import Login from '@/Components/Views/Login.vue'

import Register from '@/Components/Views/Register.vue'

import DahboardLayout from '@/Components/Layouts/Layout.vue'

import Dashboard from '@/Components/Views/Dashboard.vue'



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
            path:"/",
            component:DahboardLayout,
            meta:{
                middleware:"auth"
            },
            children:[
                {
                    name:"dashboard",
                    path: '/',
                    component: Dashboard,
                    meta:{
                        title:`Dashboard`
                    }
                }
            ]
        }


    ],

});



export default router