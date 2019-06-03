<template>
   <div class="container-fluid">
      <Heading
          :icone="icone"
          titulo="Áreas"
          url="areas"
          subtitulo="Listagem de Áreas"
          :linksMenuHead="linksMenuHeading"
          @changeViewFilter="viewFilterChange"
      ></Heading>

        <router-view />
        
    </div>
</template>

<script>
import Heading from '../shared/header/Heading.vue';
export default {
    data(){
        return{
            linksMenuHeading: [
                {link: 'form', icon: 'add', btn:'btn btn-primary'},
                {link: 'index', icon: 'view_list', btn:'btn btn-info'}
            ],
            icone: "content_copy"
        }
    },
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
