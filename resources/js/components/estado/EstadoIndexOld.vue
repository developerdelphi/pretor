<template>
    <div>
        <Heading icone="flag" titulo="Estados" subtitulo="Listagem de Estados"></Heading>
        <Search :total="params.total" @click.native="index">
            <div class="field">
                <input v-model="filters.descricao" type="text" placeholder="Nome do Estado">
            </div>
            <div class="field">
                <input v-model="filters.sigla" type="text" placeholder="Sigla do Estado">
            </div>
        </Search>

        <div class="ui divider"></div>

        <DataGrid
                :thead="thead"
                :params="params"
                :colspan="2"
                :table-data="estados"
                @loadData="index">
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
                estados: [],
                params: {
                    total: 0,
                    per_page: 30,
                    current_page: 1,
                    column: 'descricao',
                    direction: 'asc'
                },
                thead:[
                    {title: 'Sigla', Column: 'sigla', direction:'desc', sortable: true, style: 'five wide', index: 1},
                    {title: 'Estados', Column: 'descricao', direction:'desc', sortable: true, style: 'eleven wide',index: 0},
                ],
                message: null,
                status: null,
                filters: {
                    descricao: '',
                    sigla: ''
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
                        this.message    = response.body.message
                        this.status     = response.body.status
                    }else{
                        this.estados    = response.data.estados.data
                        this.filters    = response.data.filters
                        this.params     = response.data.params
                    }
                })
            },
            buildUrl(){
                let current_page    = `?page=${this.params.current_page}`
                let per_page        = `&per_page=${this.params.per_page}`
                let direction       = `&direction=${this.params.direction}`
                let column          = `&column=${this.params.column}`
                let descricao       = this.filters.descricao === '' ? '' : `&descricao=${this.filters.descricao}`
                let sigla       = this.filters.sigla === '' ? '' : `&sigla=${this.filters.sigla}`
                return `api/estados${current_page}${per_page}${direction}${column}${descricao}${sigla}`
            }
        }
    }
</script>
