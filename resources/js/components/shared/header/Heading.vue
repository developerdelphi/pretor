<template>
    <div class="row" style="margin-top: 10px">
        <div class="thirteen wide column middle">
            <h2 class="ui aligned header">
                <i class="icon massive teal" :class="icone"></i>
                <div class="content">
                    {{ titulo }}
                    <div class="sub header">{{ subtitulo }}</div>
                </div>
            </h2>

        </div>
        <div class="three wide column">
            <div v-if="url" class="ui floated right">
                <i class="big icons">
                    <router-link :to="url">
                        <i class="adn teal icon"></i>
                        <i class="bottom right corner add icon"></i>
                    </router-link>
                </i>
                <i class="big icons">
                    <a href="#" @click="changeFilter()" class="button">
                        <i class="adn link teal icon"></i>
                        <i class="bottom right corner filter icon"></i>
                    </a>
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
        },
        methods:{
            changeFilter(){
                this.$emit('changeViewFilter');
            }
        }
    }
</script>

<style scoped>
   a {outline: none}
</style>