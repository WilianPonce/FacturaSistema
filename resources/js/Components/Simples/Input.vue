<template>
    <div v-if="$attrs.type=='date'" class="w-full">
        <input :disabled="disabled" :placeholder="placeholder" :autocomplete="autocomplete" class="form-input shadow-none rounded-none focus:outline-none borde w-full" :type="$attrs.type" :value="value | fecha" @input="$emit('input', $event.target.value)" ref="input">
    </div>
    <div v-else class="w-full">
        <input :disabled="disabled" :placeholder="placeholder" :autocomplete="autocomplete" class="form-input shadow-none rounded-none focus:outline-none borde w-full" :type="$attrs.type" :value="value" @input="$emit('input', $event.target.value)" ref="input">
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['value','disabled', 'placeholder', 'autocomplete'],
        methods: {
            focus() {
                this.$refs.input.focus()
            }
        },
        filters:{
            fecha(data){
                if(data){
                    let fecha = moment(data).add(1, 'days').format("YYYY-MM-DD");
                    return fecha;
                }
                return data;
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
