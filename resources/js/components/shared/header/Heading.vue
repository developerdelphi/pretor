<template>
    <div>
        <v-toolbar :color="headerWindow.color" dark card class="elevation-3">
            <v-btn icon to="index">
                <v-icon medium class="elevation-4 pa-2">{{ headerWindow.icon }}</v-icon>
            </v-btn>
            <v-toolbar-title class="pb-0">
                {{ headerWindow.title }}
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn fab dark small color="primary" to="new">
                <v-icon dark>add</v-icon>
            </v-btn>
            <v-btn fab dark small color="pink darken-1" @click="changeSearch">
                <v-icon dark>search</v-icon>
            </v-btn>
        </v-toolbar>
    </div>
</template>

<script>

    import { mapMutations } from "vuex"
    import { mapState } from "vuex"

export default {
    props: {
        status: String,
        message: String,
    },
    computed: {
        ...mapState(['headerWindow'])
    },
    methods: {
        ...mapMutations(['changeSearch','changeForm']),
    }
};
</script>
