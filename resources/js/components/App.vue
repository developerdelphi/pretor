<template>
  <div id="app" class="ui main container">
    <navbar/>
    <router-view/>
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
