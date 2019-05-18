<template>
    <div>
        <div class="ui items">
            <Heading icone="flag" titulo="Países" subtitulo="Listagem de países"></Heading>
            <Search :total="params.total" @click.native="index">
                <div class="field">
                    <input @keyup.enter="index()" v-model="filters.descricao" type="text" placeholder="Nome do país">
                </div>
            </Search>
        </div>
        <DataGrid :thead="thead" :params="params" @loadData="index" :colspan="0">
            <tr v-for="pais in paises" :key="pais.id">
                <td>{{pais.descricao}}</td>
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
                paises: [],
                params: {
                    total: 0,
                    per_page: 30,
                    current_page: 1,
                    column: 'descricao',
                    direction: 'asc'
                },
                thead:[
                    {title: 'País', Column: 'descricao', direction:'desc', sortable: true, index: 0}
                ],
                message: null,
                status: null,
                filters: {
                    descricao: ''
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
                        this.paises = response.data.paises.data
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
                let descricao       = this.filters.descricao === '' ? '' : `&descricao=${this.filters.descricao}`
                return `api/paises${current_page}${per_page}${direction}${column}${descricao}`
            }
        }
    }
</script>
