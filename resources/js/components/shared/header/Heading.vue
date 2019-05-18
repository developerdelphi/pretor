<template>
    <div class="item">
        <h2 class="ui header floated left row teal raised">
            <i class="icon" :class="icone"></i>
            <div class="content">
                {{ titulo}}
                <div class="sub header"><p class="teal">{{ subtitulo }}</p></div>
            </div>
        </h2>
        <div class="ui divider"></div>
    </div>
</template>

<script>
    export default {
        props:{
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
            }
        }
    }
</script>