<template>
    <input class="form-input shadow-none rounded-none focus:outline-none borde" :value="value" @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['value'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

<style>
    .borde{
        border:none;
        border-bottom:1px solid #d2d6dc;
        box-shadow: none!important;
    }
</style>
