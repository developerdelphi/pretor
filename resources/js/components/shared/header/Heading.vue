<template>
    <div class="col" style="margin-top: 10px">
        <div class="card">
            <div class="card-header">
                <h5 class="card=title">
                    <i class="fas fa-cubes"></i>{{ titulo }}</h5>
                <p class="card-text">{{ subtitulo }}</p>
                <ul class="nav justify-content-end">
                    <li class="item">
                        <a href="" class="nav-link primary">Criar</a>
                    </li>
                </ul>
                <div class="card-body">
                    
                    </div>
            </div>
        </div>
        <div class="three wide column">
            <div v-if="url" class="ui floated right">                  
                <i class="big icons">
                    <router-link class="ui toggle" to="index">
                        <i class="adn teal icon"></i>
                        <i class="bottom link right corner home icon"></i>
                    </router-link>
                </i>
                <i class="big icons">
                    <router-link class="button" to="/areas/form">
                        <i class="adn teal icon"></i>
                        <i class="bottom right corner add icon"></i>
                    </router-link>
                </i>       
            </div>
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