<template>
  <div v-if="links.length > 3">
    <pre>
 <!-- {{links}} -->
    </pre>
   
    
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links" :key="key">
        <div
          v-if="link.url === null"
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
          v-html="link.label"
        />
        
        <a 
          v-else
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
          :class="{ 'bg-white': link.active }"
          :href="urlTransform(link.url)"
          v-html="link.label"
        ></a>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
    reference:String,
    querys:String
  },
  methods:{
    urlTransform(urlLink){
      var cadena = urlLink.split('=')

      return this.$store.state.url+ this.reference+'?page='+cadena[1]+this.querys;
    }
  }
};
</script>
