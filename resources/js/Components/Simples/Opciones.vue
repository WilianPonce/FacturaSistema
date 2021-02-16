<template>
    <li>
        <button v-on:click="abrir_opciones" class="w-full rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap hover:pointer" v-if="as == 'modal-top'">
            <slot></slot>
        </button>
        <button v-on:click="abrir_opciones" class="w-full rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap hover:pointer" v-else-if="as == 'modal'">
            <slot></slot>
        </button>
        <button v-on:click="abrir_opciones" class="w-full rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap hover:pointer" v-else-if="as == 'modal-bot'">
            <slot></slot>
        </button>
        <inertia-link :href="href" style="text-align:center" class="w-full rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap hover:pointer" v-else-if="as == 'top'">
            <slot></slot>
        </inertia-link>
        <inertia-link :href="href" style="text-align:center" class="w-full rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap hover:pointer" v-else-if="as == 'bot'">
            <slot></slot>
        </inertia-link>
        <inertia-link :href="href" style="text-align:center" class="w-full bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap hover:pointer" v-else>
            <slot></slot>
        </inertia-link>
    </li>
</template>
<script>
    export default {
        props: ['href', 'as'],
        methods: {
            abrir_opciones(){
                this.$emit("click");
            }
        }
    }
</script>
