<template>
    <v-form>
        <v-container>
            <v-layout row wrap>
                <v-flex xs12>
                    <v-text-field
                            prepend-icon="person"
                            v-model="table.name"
                            :rules="nameRules"
                            :error-messages="errors.name"
                            label="Nome da Pessoa"
                            required
                            color="teal accent-2"
                            validate-on-blur: true
                            success: true
                    ></v-text-field>
                </v-flex>
                 <v-flex xs12>
                    <v-radio-group v-model="origin" row>
                        <template v-slot:label >
                            <div class="mb-1">Selecione <strong class="light-blue--text">Origem do Processo:</strong> <hr></div>
                            <v-divider></v-divider>
                        </template>
                        <v-radio label="Judicial" value="Judicial" color="info"></v-radio>
                        <v-radio label="Administrativo" value="Administrativo" color="info"></v-radio>
                    </v-radio-group>
                </v-flex>
                <v-flex xs12>
                    <v-divider></v-divider>
                    <v-btn color="primary" @click.prevent="saveData('kinds')">
                        <v-icon>save</v-icon>
                        Salvar
                    </v-btn>
                    <v-btn color="secundary" @click="closeForm">
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
            status: '',
            errors: [],
            table: {
                id: '',
                name: '',
                area_id: '',
                area: {
                    id: '',
                    name: '',
                    origin: ''
                }
            },
            items: [
                {label: 'Judicial', value: 'Judicial'},
                {label:'Administrativo', value: 'Administrativo'}
            ],
            name: '',
            origin: '',
            nameRules: [
                v => !!v || 'O nome é necessário!',
                v => v.length >= 3 || 'O nome necessita ser maior que 3 caracteres!'
            ],
            areaIdRules: [
                v => !!v || 'O campo Área é necessário ter um valor!',
            ]
        }
    },
    mounted(){
        if(this.$route.params.id) {
            this.loadForm('kinds',this.$route.params.id)
            this.status = 'edit'
        }else{
            this.loadForm('kinds')
            this.status = 'new'
        }
    },
    methods: {
        ...mapMutations(['showLoading', 'hideLoading', 'changeSearch']),

        async loadForm(route, id) {
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
                })
        },
        async loadRelations(route) {

        },
        closeForm(){
            this.$router.push('/kinds/index')
        }
    },
}
</script>

