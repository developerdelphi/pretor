<template>
    <div>
        <div class="ui inverted top fixed icon menu">
            <router-link to="/" class="header item">
                <i class="large home cap icon"></i>
            </router-link>

            <div class="item">
                <div class="ui simple dropdown">
                    <i class="flag icon"></i>
                    Locais <i class="dropdown icon"></i>
                    <div class="menu">
                        <router-link to="/cidades" class="item">Cidades</router-link>
                        <router-link to="/estados" class="item">Estados</router-link>
                        <router-link to="/paises" class="item">Paises</router-link>
                    </div>
                </div>
            </div>
            <div class="ui simple dropdown item">
                Cadastrar
                <i class="dropdown icon"></i>
                <div class="menu">

                        <router-link to="/areas" class="item">Áreas</router-link>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            $('.dropdown').dropdown;

        }
    }
</script>