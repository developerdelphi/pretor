<template>
    <div>
        <div class="ui items">
            <Heading icone="flag" titulo="Cidades" subtitulo="Listagem de Cidades Brasileiras"></Heading>
            <Search :total="params.total" @click.native="index">
                <div class="field">
                    <input v-model="filters.nome" type="text" placeholder="Nome da cidade" @keyup.enter="index()" >
                </div>
                <div class="field">
                    <input v-model="filters.uf" type="text" placeholder="UF" @keyup.enter="index()" >
                </div>
            </Search>
        </div>
        <DataGrid :thead="thead" :params="params" @loadData="index" :colspan="2">
            <tr v-for="cidade in cidades" :key="cidade.id">
                <td>{{cidade.nome}}</td>
                <td>{{cidade.uf}}</td>
            </tr>
        </DataGrid>
    </div>
</template>
<script>
    import Heading from '../shared/header/Heading.vue'
    import Search from '../shared/header/Search.vue'
    import DataGrid from '../shared/data-grid/DataGrid.vue'

    export default {
        name: 'CidadeIndex',
        data(){
            return{
                cidades: [],
                params: {
                    total: 0,
                    per_page: 30,
                    current_page: 1,
                    column: 'nome',
                    direction: 'asc'
                },
                thead:[
                    {title: 'Cidades', Column: 'cidade', direction:'desc', sortable: true, style: 'eleven wide',index: 0},
                    {title: 'Uf', Column: 'uf', direction:'desc', sortable: true, style: 'five wide', index: 1},
                ],
                message: null,
                status: null,
                filters: {
                    nome: '',
                    uf: ''
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
                axios.get(this.buildUrl()).then(response =>{
                    if(response.body.message){
                        this.message    = response.body.message
                        this.status     = response.body.status
                    }else{
                        this.cidades    = response.data.cidades.data
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
                let nome       = this.filters.nome === '' ? '' : `&nome=${this.filters.nome}`
                let uf       = this.filters.uf === '' ? '' : `&uf=${this.filters.uf}`
                return `api/cidades${current_page}${per_page}${direction}${column}${nome}${uf}`
            }
        }
    }
</script>
