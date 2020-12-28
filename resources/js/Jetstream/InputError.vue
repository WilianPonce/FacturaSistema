<template>
    <div v-show="message" v-if="message">
        <p class="text-sm text-red-600">
            {{ message[0] }}
        </p>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>
