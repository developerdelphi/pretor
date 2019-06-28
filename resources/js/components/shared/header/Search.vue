<template>
    <div class="content">
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-sm" placeholder="Buscar informações de..." aria-label="Nome para buscar" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary btn-sm" type="button" id="button-addon2" @click.prevent="fetchData">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </div>
        <span v-if="total === 0" class="badge badge-warning">Não existem registros para serem exibidos.</span>
        <div v-else>
            <span class="badge badge-warning">
                Total de registros localizados
                <span class="badge badge-pill badge-primary">{{ total }}</span>
            </span>
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
                console.log('buscar pelo filtro...')
            }
        }
    }
</script>
