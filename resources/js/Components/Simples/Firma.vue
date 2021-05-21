<template>
    <div class="w-full" v-if="!disabled">
        <input type="file" id="firma" class="hidden" ref="firma" @change="actualizarfirma">
        <div v-if="!datas" class="col-start-4 col-span-6 cursor-pointer" v-show="!archivos.firma_electronica">
            <button @click.prevent="seleccionarfirma" class="mt-5 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Subir Firma electrónica</button>
        </div>
        <div v-if="!datas" class="col-start-3 col-span-8 cursor-pointer" v-show="archivos.firma_electronica" style="position:relative">
            <span class="borrado" @click.prevent="borrarfirma">¡Click para borrar!</span>
            <button @click.prevent="seleccionarfirma" class="mt-5 campo-left w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Firma electrónica subida ☺
            </button>
        </div>
        <div v-if="datas" class="col-start-3 col-span-8 cursor-pointer" style="position:relative">
            <span class="borrado" @click.prevent="borrarfirma">¡Click para borrar!</span>
            <button @click.prevent="seleccionarfirma" class="mt-5 campo-left w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Firma electrónica subida ☺
            </button>
        </div>
    </div>
    <div v-else>
        <div v-if="datas" class="col-start-3 col-span-8 cursor-pointer" style="position:relative">
            <button type="button" class="text-center mt-5 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Firma electrónica subida ☺
            </button>
        </div>
        <div v-else class="col-start-3 col-span-8 cursor-pointer" style="position:relative">
            <button type="button" class="text-center mt-5 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Firma electrónica sin subir
            </button>
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
                archivos: {
                    firma_electronica:null,
                    firma_electronica_save:null,
                },
                datas: this.data,
            }
        },
        methods: {
            seleccionarfirma() {
                this.$refs.firma.click();
            },
            actualizarfirma() {
                if(this.$refs.firma.files[0] !== undefined){
                    this.archivos.firma_electronica_save = this.$refs.firma.files[0];
                    this.$emit('input', this.$refs.firma.files[0]);
                    this.datas = null;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        e.preventDefault;
                        if(e.target){
                            this.archivos.firma_electronica = e.target.result;
                        }
                    };
                    reader.readAsDataURL(this.archivos.firma_electronica_save);
                }
            },
            borrarfirma(){
                if(this.$refs.firma)
                    this.archivos.firma_electronica = null;
                    this.archivos.firma_electronica_save = null;
                    this.$emit('input', null);
                    this.datas = null;
            }
        }
    }
</script>
