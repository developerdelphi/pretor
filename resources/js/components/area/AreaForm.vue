<template>
	<div class="container">
        <div class="card p-1">
            <div class="card-header card-header-info mb-3">
                <h5 class="card-title">Cadastro de Áreas</h5>
            </div>
            <form>            
                <div class="form-group row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">content_copy</i>
                            </span>
                        </div>
                        <input type="text" class="form-control" v-model="name" placeholder="Nome da Área">
                        <span class="form-control-feedback">
                            <i class="material-icons">done</i>
                        </span>
                    </div>
                </div>
                <div class="form-group row ml-2">
                    <label for="" class="bmd-label-floating font-weight-bold pr-2">Área de atuação do processo: </label>
                    <div class="form-check form-check-radio col-sm-2">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" value="Judicial" name="origin" id="origin1" v-model="origin" checked>
                            Judicial
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>

                    <div class="form-check form-check-radio col-sm-2">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" value="Administrativo" name="origin" id="exampleRadios2" v-model="origin" >
                            Administrativo
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <hr>
                <div class="btn-toolbar justify-content-left">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Salvar ou Sair">
                        <button class="btn btn-primary btn-sm" @click.prevent="salvar"> <i class="material-icons">save</i> Salvar</button>
                        <button class="btn btn-secundary btn-sm"><i class="material-icons">cancel</i> Cancelar</button>
                    </div>                    
                </div>
            </form>
        </div>
	</div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
            status: '',
            name: '',
            origin: ''
        }
    },
    methods: {
        salvar() {
            let data = [{
                name: this.name,
                origin: this.origin,
                _method: 'PUT'
            }];
            axios.put('/api/areas/store', data).then(response =>{
                if(response.body.message){
                    this.message    = response.body.message
                    this.status     = response.body.status
                }else{
                    this.estados    = response.data.estados.data
                    this.filters    = response.data.filters
                    this.params     = response.data.params
                }
            })
        },

    },

}
</script>

