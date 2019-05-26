<template>
    <div class="navbar fixed-top navbar-expand-lg navbar-light bg-primary">
        <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarTop">
            <span class="navbar-toggler-icon"></span>
        </button>
        <router-link to="/" class="navbar-brand">
            <i class="fas fa-user-graduate"></i>
            Pretor
        </router-link>
        <div class="collapse navbar-collapse" id="navbarTop">
            <ul class="navbar-nav mr-auto">
                <router-link to="paises" tag="li" class="nav-item">
                    <a class="nav-link">Paises</a>
                </router-link>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastro
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link to="areas" tag="li" class="dropdown-item">Áreas</router-link>
                        <a class="dropdown-item" href="#">Ação</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Algo mais aqui</a>
                    </div>
                </li>
                <router-link to="areas" tag="li" class="nav-item">
                    <a class="nav-link">Areas</a>
                </router-link>
            </ul>
        </div>
    </div>  
</template>

<script>
    export default {
        mounted() {
            //$('.dropdown').dropdown;

        }
    }
</script>