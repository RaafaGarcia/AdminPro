<template>
    <div>
         <inertia-link :href="href">
       <li
        :class="classes"
            class="
              flex
              w-full
              justify-between
             
              cursor-pointer
              items-center
              mb-2
              
            "
            
          >
         
            <slot></slot>
       
            
          </li>
           </inertia-link>
        
    </div>
</template>

<script>
    export default {
        props: ['active', 'href', 'as'],

        computed: {
            classes() {
                return this.active
                            ? 'block pl-1  py-2  text-base font-medium text-green-600 bg-green-50    transition'
                            : 'block pl-1 py-2   text-base font-medium text-gray-600 hover:text-green-600 hover:bg-gray-50 focus:outline-none 0 transition'
            }
        }
    }
</script>
