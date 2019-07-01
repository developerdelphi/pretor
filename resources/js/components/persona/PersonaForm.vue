<template>
   <v-container>
      <v-layout row wrap>
         <v-flex sm12>
            <v-form>
               <v-stepper v-model="el" vertical>
                  <v-stepper-header>
                     <v-stepper-step :complete="el > 1" step="1">Nome</v-stepper-step>
                     <v-divider></v-divider>
                     <v-stepper-step :complete="el > 2" step="2">Qualificações</v-stepper-step>
                     <v-divider></v-divider>
                     <v-stepper-step step="3">Endereço</v-stepper-step>
                     <v-divider></v-divider>
                     <v-stepper-step step="4">Telefone</v-stepper-step>
                  </v-stepper-header>
                  <v-stepper-items>
                     <v-stepper-content step="1">
                        <v-card class="mb-5">
                           <v-form>
                              <v-container>
                                 <v-layout row wrap>,
                                    <v-flex xs10>
                                          <v-text-field
                                             prepend-icon="person"
                                             v-model="table.name"
                                             label="Nome"
                                             color="teal accent-2"
                                          ></v-text-field>
                                       </v-flex>
                                       <v-flex xs12>
                                          <v-radio-group v-model="tipoPessoa" row>
                                             <template v-slot:label >
                                                   <div class="mb-1"><strong class="light-blue--text">Tipo de Pessoa:</strong></div>
                                                   <v-divider></v-divider>
                                             </template>
                                             <v-radio label="Física" value="Fisica" color="info"></v-radio>
                                             <v-radio label="Jurídica" value="Jurídica" color="info"></v-radio>
                                          </v-radio-group>
                                       </v-flex>
                                    </v-layout>
                                 </v-container>
                              </v-form>
                           </v-card>
                           <v-btn color="primary" @click="el = 2"> Salvar </v-btn>
                           <v-btn flat>Cancelar</v-btn>
                     </v-stepper-content>
                     <v-stepper-content step="2">
                        <v-card class="mb-5">
                           <v-form>
                              <v-container>
                                 <v-layout row wrap>
                                    <v-flex xs12>
                                       <v-select
                                          dense
                                          v-on:change="getAttributes"
                                          :items="attributes"
                                          item-text="name"
                                          item-value="id"
                                          
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
                                       <v-autocomplete
                                          v-model="table.entity_id"
                                          :items="entities"
                                          :loading="loading"
                                          :search-input.sync="searchEntity"
                                          color="teal accent-2"
                                          hide-no-data
                                          hide-selected
                                          item-text="name"
                                          item-value="id"
                                          label="Entidade Julgadora"
                                          placeholder="Informe o nome da entidade"
                                          prepend-icon="domain"
                                          validate-on-blur: true
                                          success: true
                                          :rules="entityIdRules"
                                          :error-messages="errors.entity_id"
                                       ></v-autocomplete>
                                    </v-flex>
                                 </v-layout>
                              </v-container>
                           </v-form>
                        </v-card>
                        <v-btn color="info" @click="el = 1">Voltar</v-btn>
                        <v-btn color="primary" @click="el = 3">Documentos</v-btn>
                        <v-btn flat>Cancelar</v-btn>
                     </v-stepper-content>
                     <v-stepper-content step="3">
                           <v-card class="mb-5" color="grey lighten-1" height="200px">
                              Endereços
                           </v-card>
                           <v-btn color="primary" @click="el = 4">Continuar</v-btn>
                           <v-btn flat>Cancelar</v-btn>
                     </v-stepper-content>
                     <v-stepper-content step="4">
                           <v-card class="mb-5" color="grey lighten-1" height="200px">
                              Telefone
                           </v-card>
                           <v-btn color="primary" @click="el = 1">Continuar</v-btn>
                           <v-btn flat>Cancelar</v-btn>
                     </v-stepper-content>
                  </v-stepper-items>
               </v-stepper>
            </v-form>
         </v-flex>                
      </v-layout>
   </v-container>
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
         el: 0,
         tipoPessoa : '',
         attributes: [],
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
   watch: {
      tipoPessoa(){
         if (tipoPessoa == 'Jurídica') {this.table.qualification.attribute_id = 1}else{this.table.qualification.attribute_id = 2}
      }
   },
   methods: {
      ...mapMutations(['showLoading', 'hideLoading', 'changeSearch']),

      async getAttributes(value){
         await axios.get('attributes/listen/'+value)
            .then(response =>{
               console.log('Busca Atributos:')
               console.log(response)
               if(response.data.list) this.attributes = response.data.list
            })
            .catch(error => {
               if (error.response) {
                  console.log('erro de response')
                  console.log(error.response.data.errors)
                  
               } else if (error.request) {
                     console.log('erro de request')
                     console.log(error.request)
               } else {
                     console.log('Error', error.message);
               }
               console.log(error.config);
            })
            
      },

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
      
      closeForm(){
         this.$router.push('/kinds/index')
      }
   },
}
</script>

