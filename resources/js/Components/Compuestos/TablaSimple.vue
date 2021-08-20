<template>
    <div class="flex flex-col">
        <div class="py-2 pb-8 overflow-x-auto sm:-mx-8 sm:px-6 lg:px-8 bg-white">
            <div class="mb-4 flex justify-between items-center">
                <div class="flex-1 pr-4">
                    <template v-if="datos.opciones.buscar">
                        <div class="relative md:w-1/3">
                            <input type="text" class="w-full pl-10 pr-4 py-2 focus:outline-none focus:rounded-2xl focus:shadow-outline text-gray-600 font-medium inprel" placeholder="Buscar..." v-model="valores.buscar" v-on:keyup="listarbusqueda">
                            <span v-if="valores.buscar" v-on:click="valores.buscar='',listarbusquedax()"  class="closesearch">
                                <i style="z-index:9999" class="fas fa-times text-gray-600"></i>
                            </span>
                            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                <i class="fa fa-search w-6 h-6 text-gray-400 mt-1"></i>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="flex">
                    <template v-if="datos.opciones.opciones_adicionales">
                        <div class="dropdown inline-block relative mr-2">
                            <button class="rounded-lg inline-flex items-center hover:text-grey-500 focus:outline-none focus:shadow-outline text-white font-semibold py-2 px-2 md:px-4 bg-blue-600">
                                <span class="mr-1">Opciones</span> <i class="fas fa-chevron-down" style="margin-top: 2px"></i>
                            </button>
                            <ul class="dropdown-menu absolute hidden text-gray-700 pt-1" style="min-width: 118px;">
                                <slot name="opciones_adicionales"></slot>
                            </ul>
                        </div>
                    </template>
                    <template v-if="datos.opciones.crear">
                        <div v-if="can(datos.ruta+'.crear')">
                            <div class="relative shadow rounded-lg">
                                <button @click="crear()" class="hover:bg-blue-800 rounded-lg inline-flex items-center hover:text-grey-500 focus:outline-none focus:shadow-outline text-white font-semibold py-2 px-2 md:px-4 bg-blue-900">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <template v-for="(tit,index) in datos.tabla.titulo">
                                    <th v-bind:key="index" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" :class="{'estado text-center':tit=='ESTADO'}">{{tit}}</th>
                            </template>
                            <template v-if="datos.opciones.opciones">
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider opciones">
                                    Opciones</th>
                            </template>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr v-for="(tr, $index) in array" :key="$index">
                            <template v-for="(tit,index1) in datos.tabla.campos">
                                <td v-bind:key="index1" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-gray-500">
                                    <span v-if="tit=='estado'" class="w-full text-center" style="display:block">
                                        <span v-if="tr.estado" class="w-full text-center text-green-500 text-white" style="font-weight: bold;display:block">Activo</span>
                                        <span v-else class="w-full text-center text-red-500 text-white" style="font-weight: bold;display:block">Inactivo</span>
                                    </span>
                                    <span v-else>
                                        {{ tr | imprimir(tit) }}
                                    </span>
                                </td>
                            </template>
                            <template v-if="datos.opciones.opciones">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500 opciones text-center">
                                    <template v-if="datos.opciones.ver">
                                        <button @click="ver(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.ver')">
                                            <i class="fa fa-eye hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <template v-if="datos.opciones.editar">
                                        <button @click="editar(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.editar')">
                                            <i class="fa fa-edit hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <template v-if="datos.opciones.xml">
                                        <button @click="xml(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.editar')">
                                            <i class="far fa-file hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <template v-if="datos.opciones.pdf">
                                        <button @click="pdf(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.editar')">
                                            <i class="far fa-file-pdf hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <template v-if="datos.opciones.excel">
                                        <button @click="excel(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.editar')">
                                            <i class="far fa-file-excel hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <template v-if="datos.opciones.word">
                                        <button @click="word(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.editar')">
                                            <i class="far fa-file-word hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <template v-if="datos.opciones.pago">
                                        <button @click="pago(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.editar')">
                                            <i class="fab fa-cc-apple-pay hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <template v-if="datos.opciones.cobro">
                                        <button @click="cobro(tr)" class="focus:outline-none espaciador" v-if="can(datos.ruta+'.editar')">
                                            <i class="fa fa-money-bill-wave hover:opacity-75"></i>
                                        </button>
                                    </template>
                                    <slot name="opciones" :data="tr"></slot>
                                    <template v-if="datos.opciones.eliminar">
                                        <button @click="eliminar(tr, $index)" class="focus:outline-none" v-if="can(datos.ruta+'.eliminar')">
                                            <i class="fa fa-trash hover:opacity-75"></i>
                                        </button>
                                    </template>
                                </td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-4">
            <infinite-loading spinner="bubbles" :identifier="preloader.recargar" @infinite="listar">
                <div slot="no-more">Todos los resultados</div>
                <div slot="no-results">Sin Resultados</div>
            </infinite-loading>
        </div>
    </div>
</template>
<script>

    export default {
        props:["datos"],
        data() {
            return {
                open:false,
                preloader:{
                    pagina:1,
                    recargar:+new Date(),
                    preloader:false,
                    timeout:null,
                },
                valores:{
                    buscar:"",
                },
                array:[]
            }
        },
        filters:{
            imprimir(val, tipo){
                let res = val[tipo];
                return res;
            }
        },
        methods: {
            async listar($state){
                try {
                    const { data } = await axios.get(route("api."+this.datos.ruta+".listar") + "?page=" + this.preloader.pagina + "&buscar=" + this.valores.buscar);
                    let datos = data.data;
                    if(datos.length){
                        this.preloader.pagina++;
                        this.array = this.array.concat(datos);
                        $state.loaded();
                    }else{
                        $state.complete();
                    }
                    this.preloader.preloader=false;
                } catch (error) {
                    console.log(error);
                    this.preloader.preloader=false;
                }
            },
            listarbusqueda(){
                if (this.preloader.timeout) {
                    clearTimeout(this.preloader.timeout);
                }
                this.preloader.timeout =  setTimeout(() => {
                    this.preloader.pagina = 1;
                    this.array = [];
                    this.preloader.recargar++;
                }, 500);
            },
            listarbusquedax(){
                this.preloader.pagina = 1;
                this.array = [];
                this.preloader.recargar++;
            },
            ver(data){
                this.$inertia.visit(route('administrar.'+this.datos.ruta+'.ver', data.id));
            },
            crear(tipo){
                this.$inertia.visit(route('administrar.'+this.datos.ruta+'.crear'));
            },
            editar(data){
                this.$inertia.visit(route('administrar.'+this.datos.ruta+'.editar', data.id));
            },
            eliminar(data, i){
                this.$swal.fire({
                    title: 'Estas seguro de eliminar este registro?',
                    text: "Se eliminará de forma permanente en el sistema",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(route('api.'+this.datos.ruta+'.eliminar', data.id), {
                            onSuccess: (rq) => {
                                if (Object.keys(rq.props.errorBags).length === 0) {
                                    this.$alertify.success(this.$page.message);
                                }else{
                                    this.$alertify.alert("Error de Borrado", "Intente nuevamente o comuniquese con un administrador", function(){ window.reload(); });
                                }
                            }
                        });
                    }
                });
            },
            xml(data){
                window.open(route('api.'+this.datos.ruta+'.xml', data.id), '_blank');
            },
            pdf(data){
                window.open(route('api.'+this.datos.ruta+'.pdf', data.id), '_blank');
            },
            excel(data){
                window.open(route('api.'+this.datos.ruta+'.excel', data.id), '_blank');
            },
            word(data){
                window.open(route('api.'+this.datos.ruta+'.word', data.id), '_blank');
            },
            pago(data){
                window.open(route('api.'+this.datos.ruta+'.pago', data.id), '_blank');
            },
            cobro(data){
                window.open(route('api.'+this.datos.ruta+'.cobro', data.id), '_blank');
            },
        },
    }
</script>
<style>
    .inprel{
        border:none!important;
        border-bottom: 1px solid #d2d6dc!important;
        border-radius: 0!important;
    }
    .closesearch{
        position: absolute;
        top: 10px;
        right: 15px;
        cursor: pointer;
    }
    .opciones{
        width: 115px;
    }
    .espaciador{
        margin-right: 4px;
    }
    .dropdown:hover .dropdown-menu {
        display: block;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    .dropdown:hover .fa-chevron-down {
        -moz-transform: rotate(180deg);
        -webkit-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    .fa-chevron-down {
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    .estado {
        width: 100px;
    }
</style>
