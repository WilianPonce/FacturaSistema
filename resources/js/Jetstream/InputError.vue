<template>
    <div v-show="message" v-if="message">
        <p class="text-sm error-data text-red-600">
            {{ message }}
        </p>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>
