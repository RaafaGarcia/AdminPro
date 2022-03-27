<template>
  <div >
    <div>
      <!-- <app-Layout> -->
        <!-- <transition name="fade"> -->
          <router-view></router-view>
        <!-- </transition> -->
      <!-- </app-Layout> -->
    </div>
  </div>
</template>
<script>
import AppLayout from "@/Components/Layouts/AppLayout";
export default {
  components: {
    AppLayout,
  },
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-active {
  opacity: 0;
}
</style>