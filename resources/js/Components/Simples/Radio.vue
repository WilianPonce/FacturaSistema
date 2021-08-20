<template>
    <div>
        <div :class="'grid grid-cols-'+data.length+' mt-1'" v-show="!preloader">
            <label :name="name" class="align inline-flex items-center mt-3 cursor-pointer" v-for="(tr, index) in data" :key="index">
                <input :name="name" type="radio" :disabled="disabled" :value="tr.id" class="cursor-pointer form-radio h-5 w-5 text-gray-600" v-model="valor" @click="$emit('input', tr.id)">
                <span class="ml-2 text-gray-700">{{ tr.nombre }}</span>
            </label>
        </div>
        <div class="w-full mt-1" style="text-align: center;font-size: 25px;" v-show="preloader">
            <i class="fas fa-spinner fa-spin mr-1"></i>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        value: {
            require:false,
            default:0
        },
        data: {
            type:Array,
            require:true,
            default: function () {
                return [{id:1, nombre:'Si'},{id:0, nombre:'No'}]
            }
        },
        name:{
            type:String,
            require:false,
            default:'default'
        },
        disabled: {
            type: Boolean,
            required: false,
            default: false,
        },
    },
    data() {
        return {
            valor:0,
            preloader:true,
        }
    },
    methods: {
        recuperar(){
            let valor = this.value;
            setTimeout(() => {
                if(valor>=0){
                    this.data.forEach(el => {
                        if(el.id == valor){
                            this.valor = el.id;
                            this.$emit("input", el.id);
                            this.preloader = false;
                            return;
                        }
                    });
                }
            }, 1000);
        }
    },
    mounted() {
        this.recuperar();
    },
}
</script>

<style>
    .align{
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }
</style>
