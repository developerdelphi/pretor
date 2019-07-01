<template>
    <v-form>
        <v-container>
            <v-layout row wrap>
                <v-flex xs12>
                    <v-radio-group
                        v-model="table.type"
                        :rules="typeRules"
                        :error-messages="errors.type"
                        row>
                        <template v-slot:label >
                            <div class="mb-1"><strong class="info--text">Tipo de Atributo:</strong> <hr></div>
                            <v-divider></v-divider>
                        </template>
                        <v-radio label="Documento" value="Documento" color="success"></v-radio>
                        <v-radio label="Valor" value="Valor" color="success"></v-radio>
                    </v-radio-group>
                </v-flex>
                <v-flex xs8>
                    <v-text-field
                            prepend-icon="note_add"
                            v-model="table.name"
                            :rules="nameRules"
                            :error-messages="errors.name"
                            label="Nome do Atributo"
                            required
                            color="teal accent-2"
                            validate-on-blur: true
                            success: true
                    ></v-text-field>
                </v-flex>
                <v-flex xs12>
                    <v-divider></v-divider>
                    <v-btn color="primary" @click.prevent="saveData('attributes')">
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
                type: ''
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
            typeRules: [
                v => !!v || 'O campo Tipo é necessário ter um valor!',
            ]
        }
    },
    mounted(){
        var route = 'attributes/show/'
        if(this.$route.params.id) {
            route += this.$route.params.id
            this.status = 'edit'
        }else{
            this.status = 'new'
        }
        this.loadForm(route)
        this
    },
    methods: {
        ...mapMutations(['showLoading', 'hideLoading', 'changeSearch']),

        async loadForm(route) {
            this.showLoading({title: 'Carregando dados', color: 'primary'})
            await axios.get(route)
                .then(response => {
                    console.log(response)
                    if(response.data.find)
                        this.table = response.data.find
                    else
                        this.table = {id: '', name: '', type: ''}
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
        closeForm(){
            this.$router.push('/attributes/index')
        }
    },
}
</script>
