<template>
  <v-layout>
    <v-flex>
      <v-sheet height="500">
        <v-calendar
          :now="today"
          :value="today"
          color="primary"
        >
          <template v-slot:day="{ date }">
            <template v-for="event in eventsMap[date]">
              <v-menu
                :key="event.title"
                v-model="event.open"
                full-width
                offset-x
              >
                <template v-slot:activator="{ on }">
                  <div
                    v-if="!event.time"
                    v-ripple
                    class="my-event"
                    v-on="on"
                    v-html="event.title"
                  ></div>
                </template>
                <v-card
                  color="grey lighten-4"
                  min-width="350px"
                  flat
                >
                  <v-toolbar
                    color="primary"
                    dark
                  >
                    <v-btn icon>
                      <v-icon>edit</v-icon>
                    </v-btn>
                    <v-toolbar-title v-html="event.title"></v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon>
                      <v-icon>favorite</v-icon>
                    </v-btn>
                    <v-btn icon>
                      <v-icon>more_vert</v-icon>
                    </v-btn>
                  </v-toolbar>
                  <v-card-title primary-title>
                    <span v-html="event.details"></span>
                  </v-card-title>
                  <v-card-actions>
                    <v-btn
                      flat
                      color="secondary"
                    >
                      Cancel
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-menu>
            </template>
          </template>
        </v-calendar>
      </v-sheet>
    </v-flex>
  </v-layout>
</template>

<style scoped>
  .my-event {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    border-radius: 2px;
    background-color: #1867c0;
    color: #ffffff;
    border: 1px solid #1867c0;
    width: 100%;
    font-size: 12px;
    padding: 3px;
    cursor: pointer;
    margin-bottom: 1px;
  }
</style>
<script>
  export default {
    data: () => ({
      today: '2019-01-08',
      events: [
        {
          title: 'Férias',
          details: 'Vou para a praia!',
          date: '2018-12-30',
          open: false
        },
        {
          title: 'Férias',
          details: 'Vou para a praia!',
          date: '2018-12-31',
          open: false
        },
        {
          title: 'Férias',
          details: 'Vou para a praia!',
          date: '2019-01-01',
          open: false
        },
        {
          title: 'Audiência',
          details: 'Justiça do Trabalho 2ª vara',
          date: '2019-06-07',
          open: false
        },
        {
          title: 'Prazo Processual',
          details: 'Apresentar Impugnação Processo nº 10025.15.2018',
          date: '2019-06-03',
          open: false
        },
        {
          title: 'Feriado',
          details: 'Curtir as férias na pescaria',
          date: '2019-06-20',
          open: false
        },
        {
          title: 'Jantar',
          details: 'Reunião importante',
          date: '2019-07-21',
          open: false
        },
        {
          title: 'Hackathon',
          details: 'Preparar audiencia',
          date: '2019-08-01',
          open: false
        }
      ]
    }),
    computed: {
      // convert the list of events into a map of lists keyed by date
      eventsMap () {
        const map = {}
        this.events.forEach(e => (map[e.date] = map[e.date] || []).push(e))
        return map
      }
    },
    methods: {
      open (event) {
        alert(event.title)
      }
    }
  }
</script>
