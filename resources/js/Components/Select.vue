<template>
    <vs-select filter v-model="value" class="w-full estiloselect">
        <slot></slot>
    </vs-select>
</template>
<script>
export default {
    props:["value"]
}
</script>
<style>
    .estiloselect input{
        background: none;
        border-bottom: 1px solid #ddd;
        border-radius: 0!important;
    }
</style>
