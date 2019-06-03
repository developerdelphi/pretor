<template>
    <v-form>
        <v-container>
            <v-layout row wrap>
                <v-flex xs12>
                    <v-text-field
                            prepend-icon="content_copy"
                            v-model="area.name"
                            :rules="nameRules"
                            :error-messages="errors.name"
                            label="Nome da Área Processual"
                            required
                            color="teal accent-2"></v-text-field>

                </v-flex>
                <v-flex xs12>
                    <v-select
                            :items="items"
                            item-text="label"
                            item-value="value"
                            :error-messages="errors.origin"
                            prepend-icon="party_mode"
                            v-model="area.origin"
                            :rules="originRules"
                            label="Origem do Processo"
                            required
                            color="teal accent-3">
                    </v-select>
                </v-flex>
                <v-divider></v-divider>
                <v-flex xs12>
                    <v-btn color="primary" @click.stop.prevent="salvar">
                        <v-icon>save</v-icon>
                        Salvar
                    </v-btn>
                    <v-btn color="secundary" to="index">
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

export default {
    data() {
        return {
            message: '',
            status: '',
            errors: [],
            area: {
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
    methods: {
        ...mapMutations(['showLoading', 'hideLoading','changeSearch']),
        async salvar() {
                console.log('chamando axios...')
                this.showLoading({title: 'Carregando dados', color: 'primary'})
                this.$http.post('/api/areas/store', this.area)
                    .then(function (response) {
                        console.log('resposta' + response)
                        this.errors = response.errors
                    })
                    .catch(function (error) {
                        console.log('deu ruim...')
                        console.log(error.body)
                        this.errors = error.body.errors
                    })
                this.hideLoading()
        },

    },

}
</script>

