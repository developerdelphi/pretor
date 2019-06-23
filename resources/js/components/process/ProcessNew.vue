<template>
    <v-flex sm12>
        <v-card elevation="5" dark flat hover>
            <v-stepper v-model="el"

                        vertical>
                <v-stepper-header>
                    <v-stepper-step :complete="el > 1" step="1">Tipo de Processo</v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step :complete="el > 2" step="2">Partes</v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="3">Documentos</v-stepper-step>
                </v-stepper-header>

                <v-stepper-items>
                    <v-stepper-content step="1">
                        <v-card class="mb-5">
                            <v-form>
                                <v-container>
                                    <v-layout row wrap>
                                        <v-flex xs12>
                                            <v-radio-group v-model="origin" row>
                                                <template v-slot:label >
                                                    <div class="mb-1">Selecione <strong class="light-blue--text">Origem do Processo:</strong> <hr></div>
                                                    <v-divider></v-divider>
                                                </template>
                                                <v-radio label="Judicial" value="Judicial"></v-radio>
                                                <v-radio label="Administrativo" value="Administrativo"></v-radio>
                                            </v-radio-group>
                                        </v-flex>
                                        <v-flex xs8>
                                            <v-select
                                                    :items="areas"
                                                    item-text="name_origin"
                                                    item-value="id"
                                                    :error-messages="errors.area_id"
                                                    prepend-icon="content_copy"
                                                    v-model="table.area_id"
                                                    :rules="areaIdRules"
                                                    label="Área Processual"
                                                    required
                                                    color="teal accent-3"
                                                    validate-on-blur: true>
                                            </v-select>
                                        </v-flex>
                                        <v-flex xs8>
                                            <v-text-field
                                                    prepend-icon="domain"
                                                    v-model="table.kind_id"
                                                    :rules="kindIdRules"
                                                    :error-messages="errors.kind_id"
                                                    label="Tipo de Processo"
                                                    required
                                                    color="teal accent-2"
                                                    validate-on-blur: true
                                                    success: true
                                            ></v-text-field>
                                        </v-flex>
                                        <v-flex xs8>
                                            <v-text-field
                                                    prepend-icon="domain"
                                                    v-model="table.entity_id"
                                                    :rules="entityIdRules"
                                                    :error-messages="errors.entity_id"
                                                    label="Origem do Processo"
                                                    required
                                                    color="teal accent-2"
                                                    validate-on-blur: true
                                                    success: true
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-form>
                        </v-card>

                        <v-btn
                        color="primary"
                        @click="el = 2"
                        >
                        Partes
                        </v-btn>

                        <v-btn flat>Cancel</v-btn>
                    </v-stepper-content>

                    <v-stepper-content step="2">
                        <v-card
                        class="mb-5"
                        color="grey lighten-1"
                        height="200px"
                        ></v-card>

                        <v-btn
                        color="primary"
                        @click="el = 3"
                        >
                        Documentos
                        </v-btn>

                        <v-btn flat>Cancel</v-btn>
                    </v-stepper-content>

                    <v-stepper-content step="3">
                        <v-card
                        class="mb-5"
                        color="grey lighten-1"
                        height="200px"
                        ></v-card>

                        <v-btn
                        color="primary"
                        @click="el = 1"
                        >
                        Continue
                        </v-btn>

                        <v-btn flat>Cancel</v-btn>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
        <router-view/>
      </v-fade-transition>
    </v-card>
  </v-flex>
</template>

<script>
import Heading from "../shared/header/Heading.vue";
import { mapState } from "vuex";
import { mapMutations } from "vuex";
import Mixin from '../../mixin'

export default {
    mixins:[Mixin],
    data() {
        return {
            icone: "grave",
            el: 0,
            origin: '',
            areas: [],
            kinds: [],
            table: {
                id: '',
                number: '',
                area_id: '',
                kind_id: '',
                entity_id: '',
            },
            areaIdRules: [
                v => !!v || 'A Área Processual é necessária ser selecionada!',
            ],
            kindIdRules: [
                v => !!v || 'É necessáio informar um Tipo de Processo!',
            ],
            entityIdRules: [
                v => !!v || 'É necessáio informar uma entidade julgadora do processo!',
            ],
            errors:[]
        };
    },
    components: {
        Heading
    },
    watch: {
        origin: function() {
            this.getAreas(this.origin)
        },
        table: function(){
            
        }
    },
    computed: {
        ...mapState(["showSearch", "headerWindow"])
    },
    methods: {
        ...mapMutations(['showLoading', 'hideLoading', "setheaderWindow"]),
        async getAreas(origin){
            try {
                this.showLoading({
                    title: 'Carregando dados, aguarde...',
                    color: 'primary'
                })
                await axios.get('areas/listing/' + origin)
                    .then(response => {
                        console.log(response.data)
                        this.areas = response.data.list;
                        this.loading = !this.loading;
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
                        this.hideLoading()
                    })
            } catch (e) {
                console.log(e)
            } finally {
                this.hideLoading()
            }
        },
        async getKinds(area){
            try {
                this.showLoading({
                    title: 'Carregando dados, aguarde...',
                    color: 'primary'
                })
                await axios.get('kinds/listing/' + area)
                    .then(response => {
                        console.log(response.data)
                        this.areas = response.data.list;
                        this.loading = !this.loading;
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
                        this.hideLoading()
                    })
            } catch (e) {
                console.log(e)
            } finally {
                this.hideLoading()
            }
        }
    },
    created() {
        this.setheaderWindow({
        title: "Cadastro de Processo",
        subTitle: "Gerencimanto de Processos",
        color: "teal darken-1",
        icon: "gavel"
        });
    }
};
</script>
