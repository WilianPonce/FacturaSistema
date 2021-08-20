<template>
    <app-layout v-model="user">

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import Welcome from '@/Jetstream/Welcome';
    import ModalJet from '@/Jetstream/DialogModal';

    export default {
        props:{
            user: Object
        },
        components: {
            AppLayout,
            Welcome,
            ModalJet,
        }
    }
</script>
