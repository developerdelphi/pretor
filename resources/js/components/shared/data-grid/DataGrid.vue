<template>
    <div v-if="params.total !== 0" class="card">
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-primary w-auto p-3" v-for="item in thead" :key="item.index"
                                :class="item.style ? item.style : null"
                                :colspan="item.columns ? item.columns : null">
                                <div v-if="item.sortable" @click="sort(item.column)" class="">
                                    <h5 class="text-uppercase font-weight-bold">{{ item.title }}</h5>
                                    <span v-if="params.column === item.column">
                                        <span v-if="params.direction === item.direction">&#x2582;</span>
                                        <span v-else>&#x25BC;</span>
                                    </span>
                                </div>
                                <div v-else>
                                    <h5 class="text-uppercase font-weight-bold">{{ item.title }}</h5>
                                </div>
                            </th>
                            <th class="w-auto p-3">
                                <h5 class="text-warning text-uppercase font-weight-bold">Ações</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <slot></slot>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th :colspan="colspan ? colspan : null">
                            <div class="ui grid">
                                <div class="ui three column row form">
                                    <div class="column inline field">
                                        <label>Exibir</label>
                                        <select class="ui simple dropdown" v-model="params.per_page" @change="fetchData">
                                            <option>1</option>
                                            <option>3</option>
                                            <option>5</option>
                                            <option>10</option>
                                            <option>25</option>
                                            <option>50</option>
                                            <option>75</option>
                                            <option>100</option>
                                        </select>
                                        <label>registros</label>
                                    </div>
        
                                    <div class="ui column inline center aligned grid field">
                                        <label class="current_page">Página atual</label>
                                        <input
                                                type="text"
                                                v-model="params.current_page"
                                                class="two wide field"
                                                @keyup.enter="fetchData"
                                        >
                                        <label class="current_page"> de {{ params.last_page }}</label>
                                    </div>
        
                                    <div class="ui column inline field right">
                                        <div class="ui right floated pagination menu">
                                            <a href="#" @click.prevent="prev" class="icon mini item">
                                                <i class="left chevron icon"></i>
                                            </a>
                                            <a href="#" @click.prevent="next" class="icon mini item">
                                                <i class="right chevron icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
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