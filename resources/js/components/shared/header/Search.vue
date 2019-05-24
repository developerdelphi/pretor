<template>
    <div class="ui form">
        <div class="fields">
            <slot></slot>
            <div class="field">
                <button @click="fetchData()" class="ui labeled icon button teal">
                    <i class="search icon"></i>
                    Pesquisar
                </button>
            </div>
        </div>
            
        <div v-if="total === 0" class="ui yellow message">Não existem registros para serem exibidos.</div>
        <div v-else>
            <a class="ui teal tag label">Total de registros localizados</a>
            <div class="ui label teal">
                <i class="database icon"></i> {{ total }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            total: {
                required: true,
                type: Number
            }
        },
        methods: {
            fetchData(){
                this.$emit('loadData');
            }
        },
        created() {
            $('#viewSearchFilter')
              .transition('fade up')
            ;
        },
        destroyed() {
            $('#viewSearchFilter')
              .transition('fade up')
            ;
        }
    }
</script>