<template>
    <app-layout v-model="user">
        <div class="flex flex-col">
            <div class="py-2 pb-8 overflow-x-auto sm:-mx-8 sm:px-6 lg:px-8 bg-white">
                <div class="mb-4 flex justify-between items-center">
                    <div class="flex-1 pr-4">
                        <div class="relative md:w-1/3">
                            <input type="text" class="w-full pl-10 pr-4 py-2 focus:outline-none focus:rounded-2xl focus:shadow-outline text-gray-600 font-medium inprel" placeholder="Buscar..." v-model="datos.buscar" @keyup="listarbusqueda">
                            <i @click="datos.buscar='';listarbusqueda()" v-if="datos.buscar" class="fas fa-times closesearch text-gray-600"></i>
                            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                <i class="fa fa-search w-6 h-6 text-gray-400 mt-1"></i>
                            </div>
                        </div>
                    </div>
                    <div v-if="can('usuarios.crear')">
                        <div class="shadow rounded-lg flex">
                            <div class="relative">
                                <inertia-link :href="route('administrar.usuarios.crear')" class="rounded-lg inline-flex items-center hover:text-grey-500 focus:outline-none focus:shadow-outline text-white font-semibold py-2 px-2 md:px-4 bg-blue-900">
                                    Agregar
                                </inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Apellido</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Dirección</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider opciones">
                                    Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr v-for="(tr, $index) in listas.usuarios" :key="$index">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-gray-500">
                                    {{ tr.nombre }} {{tr.id}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-gray-500">
                                    {{ tr.apellido }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-gray-500">
                                    {{ tr.direccion }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500 opciones text-center"> 
                                    <inertia-link :href="route('administrar.usuarios.editar',tr.id)" class="focus:outline-none espaciador" v-if="can('usuarios.ver')">
                                        <i class="fa fa-eye"></i>
                                    </inertia-link>
                                    <inertia-link :href="route('administrar.usuarios.editar',tr.id)" class="focus:outline-none espaciador" v-if="can('usuarios.editar')">
                                        <i class="fa fa-edit"></i>
                                    </inertia-link>
                                    <button @click="eliminar(tr.id)" class="focus:outline-none" v-if="can('usuarios.eliminar')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="py-4">
                <infinite-loading spinner="bubbles" :identifier="datos.recargar" @infinite="listar">
                    <div slot="no-more">Todos los resultados</div>
                    <div slot="no-results">Sin Resultados</div>
                </infinite-loading>
            </div>
        </div>
    </app-layout>
</template>

<script>
    export default {
        props:["user"],
        //data: crear variables para utilizar dentro del componente
        data() {
            return {
                listas: {
                    usuarios: []
                },
                datos:{
                    pagina:1,
                    buscar:"",
                    preloader:false,
                    recargar:+new Date(),
                    timeout:null,
                    estado:false,
                    titulo:"",
                    tipo:null,
                    datos:{
                        id:null,
                        nombre:"",
                        apellido:"",
                        direccion:"",
                        edad:null
                    }
                }
            }
        },
        methods: {
            async listar($state){
                try {
                    const { data } = await axios.get("/usuarios/listar?page=" + this.datos.pagina + "&buscar=" + this.datos.buscar);
                    let datos = data.data;
                    if(datos.length){
                        this.datos.pagina++;
                        this.listas.usuarios = this.listas.usuarios.concat(datos);
                        $state.loaded(); 
                    }else{
                        $state.complete();
                    }
                    this.datos.preloader=false;
                } catch (error) {
                    console.log(error);
                    this.datos.preloader=false;
                }
            },
            listarbusqueda(){
                if (this.datos.timeout) {  
                    clearTimeout(this.datos.timeout);
                }
                this.datos.timeout =  setTimeout(() => {
                    this.datos.pagina = 1;
                    this.listas.usuarios = [];
                    this.datos.recargar++;
                }, 500);
            },
            async eliminar(id){
                try {
                    const rq = await axios.delete("/usuarios/eliminar/"+id);
                    this.listarbusqueda();
                } catch (error) {
                    console.log(error);
                }
            },
        }
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
</style>