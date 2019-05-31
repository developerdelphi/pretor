<template>
    <v-flex xs10>
        <v-card>
            <v-card-text>
            <v-layout row wrap>
                <v-flex xs12 md6>
                <span>Configurações de Tema do Sistema</span>
                <v-switch v-model="dark" primary label="Escuro"></v-switch>
                </v-flex>
                <v-flex xs12 md6>
                <span>Menu Lateral</span>
                <v-radio-group v-model="primaryDrawer.type" column>
                    <v-radio
                    v-for="drawer in drawers"
                    :key="drawer"
                    :label="drawer"
                    :value="drawer.toLowerCase()"
                    primary
                    ></v-radio>
                </v-radio-group>
                <v-switch v-model="primaryDrawer.clipped" label="Clipped" primary></v-switch>
                <v-switch v-model="primaryDrawer.floating" label="Floating" primary></v-switch>
                <v-switch v-model="primaryDrawer.mini" label="Mini" primary></v-switch>
                </v-flex>
                <v-flex xs12 md6>
                <span>Footer</span>
                <v-switch v-model="footer.inset" label="Inset" primary></v-switch>
                </v-flex>
            </v-layout>
            </v-card-text>
            <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn flat>Cancel</v-btn>
            <v-btn flat color="primary">Submit</v-btn>
            </v-card-actions>
        </v-card>
    </v-flex>
</template>
