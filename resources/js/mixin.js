const Mixins = {
    data() {
        return {
            table: []
        }
    },
    created: function () {
        console.log('mixin carregado...')
    },
    methods: {
        setRoute: function (route, id) {
            let routing = route
            if (id) routing = route + '/' + id
            return routing
        },
        deleteData(id, route) {
            Swal.fire({
                    title: 'Você tem certeza que deseja excluir esta informação?',
                    text: "A exclusão do registro é irreversível!",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, pode excluir!'
                })
                .then((result) => {
                    if (result.value) {
                        axios.delete(route + '/destroy/' + id)
                            .then(response => {
                                Swal.fire(
                                    'Pronto!',
                                    'A informação foi removida do sistema.',
                                    'success'
                                )
                                this.index(route)
                            }, response => {
                                Swal.fire(
                                    'Atenção!',
                                    'Não foi possível remover a informaçãodo sistema.',
                                    'error'
                                )

                            })
                    }
                })
        },
        async saveData(route) {
            this.showLoading({
                title: 'Carregando dados',
                color: 'primary'
            })
            switch (this.status) {
                case 'new':
                    await axios.post(route + '/store', this.table)
                        .then(response => {
                            // console.log(response.data.message)
                            this.message = response.data.message
                            Toast.fire({
                                type: 'success',
                                title: response.data.message
                            })
                            this.closeForm()
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
                    break;
                case 'edit':
                    await axios.put(route + '/update/' + this.table.id, this.table)
                        .then(response => {
                            this.message = response.data.message
                            Toast.fire({
                                type: 'success',
                                title: response.data.message
                            })
                            //this.hideLoading()
                            this.closeForm()
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
                            //this.hideLoading()
                        }).finally(() => {
                            this.hideLoading()
                        })
                    break;
                default:
                    console.log('Parâmetro para saveData() não localizado');
                    this.hideLoading();
                    break;
            }
        },
        async index(route) {
            try {
                this.showLoading({
                    title: 'Carregando dados, aguarde...',
                    color: 'primary'
                })
                await axios.get(route)
                    .then(response => {
                        console.log(response.data)
                        this.table = response.data;
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
    }
}

export default Mixins
