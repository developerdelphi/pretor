<template>
    <div class="item">
        <div class="content">
            <div class="ui form">
                <div class="fields">
                    <slot></slot>
                    <div class="field">
                        <button @click="index()" class="ui labeled icon button teal">
                            <i class="search icon"></i>
                            Pesquisar
                        </button>
                    </div>
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
    </div>
</template>

<script>
    export default {
        props: {
            total: {
                required: true,
                type: Number
            }
        }
    }
</script>