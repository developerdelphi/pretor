<template>
  <v-app id="sandbox" :dark="dark">
    <v-navigation-drawer
        v-model="primaryDrawer.model"
        :permanent="primaryDrawer.type === 'permanent'"
        :temporary="primaryDrawer.type === 'temporary'"
        :clipped="primaryDrawer.clipped"
        :floating="primaryDrawer.floating"
        :mini-variant.sync="primaryDrawer.mini"
        hide-overlay
        width="280"
        absolute
        overflow
        app
    >
        <v-toolbar flat class="transparent">
            <v-list class="pa-0">
                <v-list-tile avatar>
                    <v-list-tile-avatar>
                        <img src="https://randomuser.me/api/portraits/men/85.jpg">
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                        <v-list-tile-title>Leo Buchner</v-list-tile-title>
                    </v-list-tile-content>
                    <v-list-tile-action>
                        <v-btn
                            icon
                            @click.stop="primaryDrawer.mini = !primaryDrawer.mini"
                        >
                            <v-icon>chevron_left</v-icon>
                        </v-btn>
                    </v-list-tile-action>
                </v-list-tile>
            </v-list>
        </v-toolbar>
        <v-list dense>
            <v-divider></v-divider>
            <v-list-tile @click="">
                <v-list-tile-action>
                    <v-icon>home</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>Dashboard</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
            <v-list-group
                        prepend-icon="account_circle"
                        valu="true"
            >
                <template v-slot:activator>
                    <v-list-tile>
                        <v-list-tile-title>Sistema</v-list-tile-title>
                    </v-list-tile>
                </template>
                <v-list-group
                    no-action
                    sub-group
                    value="true"
                >
                    <template v-slot:activator>
                        <v-list-tile>
                            <v-list-tile-title>Gerenciar</v-list-tile-title>
                                <v-list-tile-action>
                            </v-list-tile-action>
                        </v-list-tile>
                    </template>
                     <v-list-tile>
                            <v-list-tile-title>Áreas</v-list-tile-title>
                                <v-list-tile-action>
                                <v-icon>account_circle</v-icon>
                            </v-list-tile-action>
                        </v-list-tile>
                </v-list-group>
            </v-list-group>
            <v-list-tile @click="">
                <v-list-tile-action>
                    <v-icon>settings</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>Configurações</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
    <v-toolbar :clipped-left="primaryDrawer.clipped" app absolute>
        <v-toolbar-side-icon
            v-if="primaryDrawer.type !== 'permanent'"
            @click.stop="primaryDrawer.model = !primaryDrawer.model"
        >
        </v-toolbar-side-icon>
        <v-toolbar-title class="font-weight-thin">Pretor 2.0</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <v-container fluid>
        <v-layout align-center justify-center>
            <router-view />
        </v-layout>
      </v-container>
    </v-content>
    <v-footer :inset="footer.inset" app>
      <span class="px-3">&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>
<script>
  //import navbar from './shared/navbar/navbar.vue'
  //import dashboard from './dashboard/dashboard.vue'
export default {
    components: {
        // navbar,
        //dashboard
    },
    data(){
        return{
            dark: true,
            drawers: ['Default', 'Permanent', 'Temporary'],
            primaryDrawer: {
                model: null,
                type: 'Default',
                clipped: false,
                floating: true,
                mini: false
            },
            footer: {
                inset: false
            }
        }
    }
};
</script>
