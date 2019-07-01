    <template>
  <div>
    <v-card>
      <v-card-title>
        <template v-if="showSearch">
          <v-text-field
            v-model="search"
            append-icon="search"
            label="Pesquisar por..."
            single-line
            hide-details
          ></v-text-field>
        </template>
      </v-card-title>
      <v-dialog v-model="showForm" max-width="500px">
        <template v-slot:activator="{ on }"></template>
        <v-card>
          <v-card-title>
            <span class="headline">Cadastro de {{ headerWindow.title }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="table.name" label="Tipo de Proceso"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="table.origin" label="Área Processual"></v-text-field>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
            <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-data-table
        :headers="headers"
        :items="table"
        :expand="expand"
        item-key="id"
        :search="search"
        class="elevation-2"
      >
        <template v-slot:no-data>
          <v-alert
            :value="true"
            color="error"
            icon="warning"
          >Desculpe-nos, mas não foram localizados dados.</v-alert>
        </template>
        <template v-slot:no-results>
          <v-alert
            :value="true"
            color="warning"
            icon="warning"
          >A pesquisa por "{{ search }}" não localizou informações.</v-alert>
        </template>
        <template v-slot:items="props">
          <tr @click="props.expanded = !props.expanded">
            <td>{{ props.item.name }}</td>
            <td>{{ props.item.type }}</td>
            <td class="justify-center layout right px-0">
              <v-btn fab dark small color="warning" :to="setRoute('edit', props.item.id)">
                <v-icon>edit</v-icon>
              </v-btn>
              <v-btn
                fab
                dark
                small
                @click="deleteData(props.item.id, 'attributes')"
                color="red darken-4"
              >
                <v-icon>delete</v-icon>
              </v-btn>
            </td>
          </tr>
        </template>
        <template
          v-slot:pageText="props"
        >Registros {{ props.pageStart }} - {{ props.pageStop }} de {{ props.itemsLength }}</template>
      </v-data-table>
    </v-card>
  </div>
</template>
    <script>
import { mapMutations } from "vuex";
import { mapState } from "vuex";
import Mixins from "../../mixin";

export default {
  mixins: [Mixins],
  data() {
    return {
      //table: [],
      search: "",
      expand: true,
      message: null,
      status: null,
      headers: [
        { text: "Nome", align: "center", sortable: true, value: "name" },
        { text: "Tipo", align: "center", value: "type" }
      ]
    };
  },
  mounted() {
    this.index("attributes");
  },
  computed: {
    ...mapState(["showSearch", "showForm", "headerWindow"])
  },
  methods: {
    ...mapMutations(["showLoading", "hideLoading", "changeSearch"]),
    viewFilterChange() {
      this.viewFilter = !this.viewFilter;
    },
    close(e) {},
    save(e) {}
  }
};
</script>
