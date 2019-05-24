<template>
    <div class="content">
        <div class="row">
            <Heading
                icone="adn"
                titulo="Áreas"
                subtitulo="Listagem de Áreas"
                url="/areas/form"
                label="Criar"
                @changeViewFilter="viewFilterChange"
            ></Heading>            
        </div>
        <router-view />
    </div>
</template>

<script>
import Heading from '../shared/header/Heading.vue';
export default {  

    components: {
        Heading
    },
    methods: {
        viewFilterChange(){
            this.viewFilter = !this.viewFilter;
        }
    }

}
</script>
