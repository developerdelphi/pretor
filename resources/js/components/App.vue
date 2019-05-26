<template>
  <div id="app" class="container-fluid dark-edition">
    <navbar/>
    <transition name="fade" mode="out-in">
      <router-view/>
    </transition>

  </div>
</template>
<script>
  import navbar from './shared/navbar/navbar.vue'
  import dashboard from './dashboard/dashboard.vue'
export default {
  components: {
    navbar,
    dashboard
  }
};
</script>

<style scoped>
  #app {
    padding: 55px 0 30px;
  }
</style>
