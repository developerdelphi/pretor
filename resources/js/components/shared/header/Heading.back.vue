<template>
    <div class="card mt-5">
        <div class="card-header card-header-warning">
            <div class="card-icon">
                <i class="material-icons">{{ icone }}</i>
            </div>
            <div class="float-left">
                <h3 class="card-title">{{ titulo }}</h3>
                <h6 class="card-subtitle mb-2">{{ subtitulo }}</h6>
            </div>
            <div class="btn-toolbar justify-content-end" role="toolbar" aria-label="Selecione as ações do cadastro">
                <div class="btn-group btn-group-sm " role="group">
                    <router-link
                                :to="{ name: links.link, params: { view: links.link }}"
                                v-for="(links, i) in linksMenuHead" :key="i"
                    >
                        <button :class="links.btn">
                            <i class="material-icons">{{ links.icon }}</i>
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        icone: {
            required: true,
            type: String
        },
            titulo: {
            required: true,
            type: String
        },
            subtitulo: {
            required: true,
            type: String
        },
        url: String,
        linksMenuHead: Array,
        color: String,
        status: String,
        message: String,
        viewForm: Boolean
    },
    methods: {
        changeFilter() {
            this.$emit("changeViewFilter");
        },
        showViewForm() {
            this.changeViewForm = !this.viewForm;
        // this.$emit('showViewForm', this.changeViewForm);
        }
    }
};
</script>

<style scoped>
a {
  outline: none;
}
</style>
