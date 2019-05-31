<template>
    <div v-if="params.total !== 0" class="card">
        <div class="card-body">
            <Search v-show="showFilter" :total="params.total"/>
            <div class="table-responsive table-sm">
                <table class="table table-hover">
                    <thead>
                        <tr class="">
                            <th class="text-primary w-auto" v-for="item in thead" :key="item.index"
                                :class="item.style ? item.style : null"
                                :colspan="item.columns ? item.columns : null">
                                <div v-if="item.sortable" @click="sort(item.column)" class="">
                                    <h6 class="text-uppercase font-weight-bold m-0 p-0">{{ item.title }}</h6>
                                    <span v-if="params.column === item.column">
                                        <span v-if="params.direction === item.direction">&#x2582;</span>
                                        <span v-else>&#x25BC;</span>
                                    </span>
                                </div>
                                <div v-else>
                                    <h6 class="text-uppercase font-weight-bold">{{ item.title }}</h6>
                                </div>
                            </th>
                            <th class="w-auto">
                                <div class="btn-toolbar justify-content-end" role="toolbar" aria-label="Ações no cadastro">
                                    <div class="btn-group mr-2 " role="group" aria-label="Ações">
                                        <button type="button" class="btn btn-info btn-link btn-icon btn-sm" @click.stop.prevent="showFilterView">
                                            <i class="material-icons">search</i>
                                        </button>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <slot></slot>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="divider"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 form-group">
                    <div class=" btn-group btn-group-sm">
                        <label for="dropdownMenuButton">Items por página</label>
                        <div class="dropdown btn-sm">
                            <button
                                    class="btn btn-secondary dropdown-toggle"
                                    type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"
                                    v-model="params.per_page"
                                    @change="fetchData"
                            >
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">1</a>
                                <a class="dropdown-item" href="#">5</a>
                                <a class="dropdown-item" href="#">10</a>
                                <a class="dropdown-item" href="#">15</a>
                                <a class="dropdown-item" href="#">20</a>
                                <a class="dropdown-item" href="#">25</a>
                                <a class="dropdown-item" href="#">50</a>
                                <a class="dropdown-item" href="#">75</a>
                                <a class="dropdown-item" href="#">100</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 form-group">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label>Página atual</label>
                            </div>
                            <div class="col-2">
                                <input
                                        type="text"
                                        v-model="params.current_page"
                                        class="form-control"
                                        @keyup.enter="fetchData"
                                >
                            </div>
                            <div class="col">
                                <label class="current_page"> de {{ params.last_page }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <nav aria-label="Navegação entre registros">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link btn btn-sm btn-primary" @click.prevent="prev">Anterior</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link btn btn-sm btn-primary" @click.prevent="next">Próximo</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Search from '../header/Search'
    export default {
        props:{
            thead: {
                required: true,
                type: Array
            },
            colspan: {
                required: true,
                type: Number
            },
            params: {
                type: Object
            }
        },
        components: {
            Search
        },
        data(){
            return{
                showFilter: false
            }
        },
        methods: {
            sort(column) {
                if (column === this.params.column) {
                    if (this.params.direction === 'desc') {
                        this.params.direction = 'asc'
                    } else {
                        this.params.direction = 'desc'
                    }
                } else {
                    this.params.column = column
                    this.params.direction = 'asc'
                }
                this.fetchData()
            },
            next() {
                if (this.params.next_page_url) {
                    this.params.current_page++
                    this.fetchData()
                }
            },
            prev() {
                if (this.params.prev_page_url) {
                    this.params.current_page--
                    this.fetchData()
                }
            },
            fetchData(){
                this.$emit('loadData');
            },
            showFilterView() {
                this.showFilter = ! this.showFilter;
            }
        },
        created() {

        }
    }
</script>

<style scoped>
    .th-order{
        cursor: pointer;
    }
    .current_page{
        margin-top: 10px !important;
    }
</style>
