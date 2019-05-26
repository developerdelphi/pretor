<template>
   <DataGrid
         :thead="thead"
         :params="params"
         :colspan="3"
         @loadData="index">
      
      <tr v-for="area in areas" :key="area.id">
         <td>{{ area.name }}</td>
         <td>{{ area.origin }}</td>
         <td class="td-actions text-right m-0 p-0 w-25">
            <div class="btn-group btn-group-sm" role="group" aria-label="Exemplo básico">
               <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm"><i class="material-icons">create</i></button>
               <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm"><i class="material-icons">delete_sweep</i></button>
            </div>
         </td>
      </tr>
      
   </DataGrid>
</template>
<script>  

  import Search from '../shared/header/Search.vue'
  import DataGrid from '../shared/data-grid/DataGrid.vue'

  export default {
    data(){
      return{
        areas: [],
        viewFilter: false,
        viewForm: false,
        viewBody: true,
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
     // Heading,
      Search,
      DataGrid,
     // AreaForm
    },
    created(){
      
    },
    mounted() {
      this.index()
    },
    methods:{
      index(){
        axios.get(this.buildUrl())
          .then(response =>{
              this.areas = response.data.areas.data;
              this.filters = response.data.filters;
              this.params = response.data.params;
            }
          )
          .catch(error =>{
              console.error(error);
                //this.message = response.body.message;
                //this.status = response.body.status             
          })
      },
      buildUrl(){
        let current_page    = `?page=${this.params.current_page}`;
        let per_page        = `&per_page=${this.params.per_page}`;
        let direction       = `&direction=${this.params.direction}`;
        let column          = `&column=${this.params.column}`;
        let name       = this.filters.name === '' ? '' : `&name=${this.filters.name}`;
       
        return `http://localhost:8000/api/areas/${current_page}${per_page}${direction}${column}${name}`;
      },
      viewFilterChange(){
        this.viewFilter = !this.viewFilter;
      }
    }
  }
</script>
