<template>
  <div>
    <div class="ui items">
      <Heading icone="flag" titulo="Áreas" subtitulo="Listagem de Áreas"></Heading>
      <Search :total="params.total" @click.native="index">
        <div class="field">
          <input @keyup.enter="index()" v-model="filters.name" type="text" placeholder="Nome da Área">
        </div>
      </Search>
    </div>
    <DataGrid :thead="thead" :params="params" @loadData="index" :colspan="0">
      <tr v-for="area in areas" :key="area.id">
        <td>{{ area.name }}</td>
        <td>{{ area.origin }}</td>
      </tr>
    </DataGrid>
  </div>
</template>
<script>
  import Heading from '../shared/header/Heading.vue'
  import Search from '../shared/header/Search.vue'
  import DataGrid from '../shared/data-grid/DataGrid.vue'

  export default {
    data(){
      return{
        areas: [],
        params: {
          total: 0,
          per_page: 30,
          current_page: 1,
          column: 'name',
          direction: 'asc'
        },
        thead:[
          {title: 'Áreas', Column: 'name', direction:'desc', sortable: true},
          {title: 'Origem', Column: 'origin', direction:'desc', sortable: true}
        ],
        message: null,
        status: null,
        filters: {
          name: '',
          origin: ''
        }
      }
    },
    components:{
      Heading,
      Search,
      DataGrid
    },
    created(){
      this.index()
    },
    methods:{
      index(){
        this.$http.get(this.buildUrl()).then(response =>{
          if(response.body.message){
            this.message = response.body.message
            this.status = response.body.status
          }else{
            this.areas = response.data.areas.data
            this.filters = response.data.filters
            this.params = response.data.params
          }
        })
      },
      buildUrl(){
        let current_page    = `?page=${this.params.current_page}`
        let per_page        = `&per_page=${this.params.per_page}`
        let direction       = `&direction=${this.params.direction}`
        let column          = `&column=${this.params.column}`
        let name       = this.filters.name === '' ? '' : `&name=${this.filters.name}`
        return `api/areas${current_page}${per_page}${direction}${column}${name}`
      }
    }
  }
</script>
