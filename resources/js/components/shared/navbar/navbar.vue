<template>
    <div class="ui fixed inverted menu">
        <router-link to="/" class="header item">
            <i class="graduation cap icon"></i>Pretor
        </router-link>
        <div class="ui simple dropdown item">
            Locais <i class="dropdown icon"></i>
            <div class="menu">
                <router-link to="/cidades" class="item">Cidades</router-link>
                <router-link to="/estados" class="item">Estados</router-link>
                <router-link to="/paises" class="item">Paises</router-link>
            </div>
        </div>
        <div class="ui simple items">
            <router-link to="/areas" class="item">Áreas</router-link>
        </div>
    </div>
</template>