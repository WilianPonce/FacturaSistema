<template>
    <label class="inline-flex items-center mt-5 cursor-pointer">
        <input type="checkbox" v-if="!disabled" :disabled="disabled" class="form-checkbox h-5 w-5 text-gray-600" :checked="value" :value="value" @change="change">
        <span :class="{'ml-2':!disabled}" class="text-gray-700 text-green-500 font-bold" v-if="value">
            Activo
        </span>
        <span :class="{'ml-2':!disabled}" class="text-gray-700 text-red-500 font-bold" v-else>
            Inactivo
        </span>
    </label>
</template>
<script>
export default {
    props:{
        value:{
            default:null,
        },
        disabled: {
            type: Boolean,
            required: false,
            default: false,
        },
    },
    data() {
        return {
            estado:false
        }
    },
    methods: {
        change(){
            this.estado = !this.estado,
            this.$emit('input', this.estado);
        }
    },
    created(){
        this.estado = this.value;
    }
}
</script>
