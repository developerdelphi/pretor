<template>
    
        <div class="card mt-5">
           
           <div class="card-header card-header-warning">
              <div class="card-icon">
                 <i class="material-icons">content_copy</i>
              </div>
              <div class="float-left">
                 <h3 class="card-title">
                    {{ titulo }}</h3>
                 <h6 class="card-subtitle mb-2">{{subtitulo}}</h6>
              </div>
              <ul class="nav nav-pills card-header-pills justify-content-end">
                 <router-link class="nav-link btn-info" tag="li" to="/areas/form">
                    <i class="fas fa-plus"></i>
                 </router-link>
                 <router-link class="nav-link btn-warning" tag="li" to="/areas/index">
                    <i class="material-icons">view_list</i>
                 </router-link>
              </ul>
           </div>
        </div>
</template>

<script>
    export default {
        props:{
            icone: {
                required: true,
                type: String
            },
            titulo: {
                required: true,
                type: String
            },
            subtitulo: {
                required: true,
                type: String
            },
            url: String,
            label: String,
            color: String,
            status: String,
            message: String,
            viewForm: Boolean,
        },        
        methods: {
            changeFilter(){
                this.$emit('changeViewFilter');
            },
            showViewForm() {
                this.changeViewForm = !this.viewForm;
               // this.$emit('showViewForm', this.changeViewForm);
            }
        }
    }
</script>

<style scoped>
   a {outline: none}
</style>