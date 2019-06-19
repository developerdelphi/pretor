<template>
    <v-form>
        <v-container>
            <v-layout row wrap>
                <v-flex xs12>
                    <v-text-field
                            prepend-icon="content_copy"
                            v-model="table.name"
                            :rules="nameRules"
                            :error-messages="errors.name"
                            label="Nome da Área Processual"
                            required
                            color="teal accent-2"
                            validate-on-blur: true
                            success: true

                    ></v-text-field>

                </v-flex>
                <v-flex xs12>
                    <v-select
                            :items="items"
                            item-text="label"
                            item-value="value"
                            :error-messages="errors.origin"
                            prepend-icon="party_mode"
                            v-model="table.origin"
                            :rules="originRules"
                            label="Origem do Processo"
                            required
                            color="teal accent-3"
                            validate-on-blur: true>
                    </v-select>
                </v-flex>
                <v-divider></v-divider>
                <v-flex xs12>
                    <v-btn color="primary" @click.prevent="saveData('areas')">
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
                origin: ''
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
            originRules: [
                v => !!v || 'O campo Origem é necessário ter um valor!',
                v => v.length >= 3 || 'Origem necessita ser maior que 3 caracteres!'
            ]
        }
    },
    mounted(){
        if(this.$route.params.id) {
            this.loadForm('areas', this.$route.params.id)
            this.status = 'edit'
        }else{
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
                    this.table = response.data
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
                .finally(() => {
                    this.hideLoading()
                })

        },
        closeForm(){
            this.$router.push('/areas/index')
        }
    },
}
</script>

