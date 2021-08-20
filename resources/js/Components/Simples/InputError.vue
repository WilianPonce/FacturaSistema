<template>
    <div v-show="message" v-if="message" class="mt-1">
        <p class="text-sm text-danger-error text-red-600">
            {{ message }}
        </p>
    </div>
</template>

<script>
    import $ from 'jquery';
    export default {
        props: ['message']
    }
</script>
