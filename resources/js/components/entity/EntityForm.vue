<template>
    <v-form v-on:submit.prevent="saveData('entities')">
        <v-container>
            <v-layout row wrap>
                <v-flex xs8>
                    <v-text-field
                            prepend-icon="content_copy"
                            v-model="table.name"
                            :rules="nameRules"
                            :error-messages="errors.name"
                            label="Nome da Entidade"
                            required
                            color="teal accent-2"
                            validate-on-blur: true
                            success: true
                    ></v-text-field>
                </v-flex>
                <v-flex xs12>
                    <v-divider></v-divider>
                    <v-btn
                        color="primary"
                        small
                        @click.prevent="saveData('entities')">
                        <v-icon>save</v-icon>
                        Salvar
                    </v-btn>
                    <v-btn color="secundary" @click="closeForm" small>
                        <v-icon>cancel</v-icon>
                        Cancelar
                    </v-btn>
                </v-flex>
            </v-layout>
        </v-container>
    </v-form>
</template>

<script>

    import { mapMutations } from 'vuex'
    import Mixin from '../../mixin'

export default {
    props:{
        id: {
            type: [String, Number],
            required: false
        }
    },
    mixins:[Mixin],
    data() {
        return {
            message: '',
            status: false,
            errors: [],
            table: {
                id: '',
                name: '',
            },
            items: [
                {label: 'Judicial', value: 'Judicial'},
                {label:'Administrativo', value: 'Administrativo'}
            ],
            name: '',
            origin: '',
            nameRules: [
                v => !!v || 'O nome é necessário!',
                v => v.length >= 3 || 'O nome necessita ser maior que 5 caracteres!'
            ],
        }
    },
    mounted(){
        if(this.$route.params.id) {
            this.loadForm('entities',this.$route.params.id)
            this.status = 'edit'
        }else{
            this.loadForm('entities')
            this.status = 'new'
        }
    },
    methods: {
        ...mapMutations(['showLoading', 'hideLoading', 'changeSearch']),

        async loadForm(route, id) {
            //this.status = true
            this.showLoading({title: 'Carregando dados', color: 'primary'})
            await axios.get(route + '/show/' + id)
                .then(response => {
                    console.log(response)
                    if(response.data.find)
                        this.table = response.data.find
                    else
                        this.table = {id: '', name: '', area_id: ''}
                    this.items = response.data.list
                    Toast.fire({
                        type: 'success',
                        title: 'Formulário carregado para alteração de dados de : ' + this.table.name
                    })
                })
                .catch(error => {
                    if (error.response) {
                            console.log('erro de response')
                            console.log(error.response.data.errors)
                            this.errors = error.response.data.errors
                        } else if (error.request) {
                            console.log('erro de request')
                            console.log(error.request)
                        } else {
                            console.log('Error', error.message);
                        }
                        console.log(error.config);

                })
                .finally( ()=>{
                    this.hideLoading()
                   // this.status = false
                })
        },
        async loadRelations(route) {

        },
        closeForm(){
            this.$router.push('/entities/index')
        }
    },
}
</script>

