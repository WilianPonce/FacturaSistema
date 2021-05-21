<template>
    <div class="w-full" v-if="!disabled">
        <input type="file" id="logotipo" :disabled="disabled" class="hidden" ref="photo" @change="actualizarfoto(), $emit('change')">
        <div class="col-start-4 col-span-6 cursor-pointer" v-if="!datas">
            <div class="mt-2" v-show="!archivo_imagen.archivo" @click.prevent="seleccionarfoto">
                <img src="https://ui-avatars.com/api/?name=I+M+G&color=161E2E&background=FFF&size=480&length=3" alt="Current Profile Photo" class="border-4 w-full object-cover shadow-2xl border-gray-900 rounded">
            </div>
            <div class="mt-2 imagen_vista" v-show="archivo_imagen.archivo">
                <div class="close" @click.prevent="borrarfoto">
                    <i class="fas fa-times close-icon"></i>
                    <div class="text-center borradored"></div>
                </div>
                <img :src="archivo_imagen.preloader" @click.prevent="seleccionarfoto" type="text" class="border-4 block w-full object-cover shadow-2xl border-gray-900 rounded" style="min-height: 200px;background-size: cover; background-repeat: no-repeat; background-position: center center;">
            </div>
        </div>
        <div class="col-start-4 col-span-6 cursor-pointer" v-else>
            <div class="mt-2 imagen_vista">
                <div class="close" @click.prevent="borrarfoto">
                    <i class="fas fa-times close-icon"></i>
                    <div class="text-center borradored"></div>
                </div>
                <img :src="'/api/logotipo/'+datas" @click.prevent="seleccionarfoto" type="text" class="border-4 block w-full object-cover shadow-2xl border-gray-900 rounded" style="min-height: 200px;background-size: cover; background-repeat: no-repeat; background-position: center center;">
            </div>
        </div>
    </div>
    <div v-else>
        <div class="col-start-4 col-span-6 cursor-pointer">
            <div class="mt-2 imagen_vista">
                <img :src="'/api/logotipo/'+datas" type="text" class="border-4 block w-full object-cover shadow-2xl border-gray-900 rounded" style="min-height: 200px;background-size: cover; background-repeat: no-repeat; background-position: center center;">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            value:{
                default:null
            },
            disabled:{
                type:Boolean,
                default:false
            },
            data:{
                defalult:null,
            }
        },
        data() {
            return {
                archivo_imagen:{
                    archivo:null,
                    peso:null,
                    tipo:null,
                    preloader:null
                },
                datas: this.data
            }
        },
        methods: {
            seleccionarfoto() {
                this.$refs.photo.click();
            },
            actualizarfoto() {
                if(this.$refs.photo.files[0] !== undefined){
                    this.archivo_imagen.archivo = this.$refs.photo.files[0];
                    this.datas = null;
                    this.$emit('input', this.$refs.photo.files[0]);
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.archivo_imagen.preloader = e.target.result;
                    };
                    reader.readAsDataURL(this.archivo_imagen.archivo);
                    this.archivo_imagen.tipo = this.$refs.photo.files[0].type;
                    this.archivo_imagen.peso = this.$refs.photo.files[0].size;
                }
            },
            borrarfoto(){
                this.archivo_imagen = {
                    archivo:null,
                    peso:null,
                    tipo:null,
                    preloader:null
                };
                this.datas = null;
                this.$emit('input', null);
            },
        }
    }
</script>
<style>
    .hidden{
        display:none;
    }
    .close-icon{
        height: 100%!important;
        width: 18%!important;
    }
    .close{
        height: 25%;
        transition: all .3s ease;
    }
    .close-icon:hover ~ .borradored {
        cursor: pointer;
        width: 95%;
        box-shadow: 0px -27px 21px 12px red;
        transition: all .3s ease;
        margin-left: 2.5%;
    }
</style>
