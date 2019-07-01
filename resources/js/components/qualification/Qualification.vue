<template>
  <v-flex sm12>
    <v-card elevation="5" dark flat hover>
      <Heading
        icone="headerWindow.icon"
        color="purple"
        titulo="headerWindow.title"
        subtitulo="headerWindow.subtitle"
      ></Heading>
      <v-fade-transition mode="out-in">
        <router-view/>
      </v-fade-transition>
    </v-card>
  </v-flex>
</template>

<script>
import Heading from "../shared/header/Heading.vue";
import { mapState } from "vuex";
import { mapMutations } from "vuex";

export default {
  data() {
    return {
      icone: "ballot"
    };
  },
  components: {
    Heading
  },
  computed: {
    ...mapState(["showSearch", "headerWindow"])
  },
  methods: {
    ...mapMutations(["setheaderWindow"])
  },
  created() {
    this.setheaderWindow({
      title: "Qualificações",
      subTitle: "Cadastro de Qualificações",
      color: "teal darken-1",
      icon: this.icone
    });
  }
};
</script>
