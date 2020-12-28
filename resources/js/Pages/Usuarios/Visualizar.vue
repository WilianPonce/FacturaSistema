<template>
    <app-layout>
        <tabla-general :datos="datos" @eliminar="eliminar" @editar="abrir_modal" @ver="abrir_modal" @crear="abrir_modal">
            <template #opciones_adicionales>
                <!--top|bot|modal-top|modal-bot|modal-->
                <opciones @click="abrir_modal" as="modal-top">abrir</opciones>
                <opciones :href="route('usuarios.visualizar')">Generar</opciones>
                <opciones :href="route('usuarios.visualizar')" as="bot">enviar</opciones>
            </template>
            <template #opciones="data">
                <button @click="boton(data.data)" class="focus:outline-none espaciador" v-if="can('usuarios.ver')">
                    <i class="fas fa-table"></i>
                </button>
                <button @click="boton(data.data)" class="focus:outline-none espaciador" v-if="can('usuarios.ver')">
                    <i class="fas fa-file-pdf"></i>
                </button>
            </template>
        </tabla-general>
        <modal-general :show="modal.estado" @close="modal.estado=!modal.estado">
            <template #title>
                {{modal.titulo}}
            </template>
            <template #content>
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2">
                        <label class="block font-medium text-sm text-gray-700" for="nombre"><span>Nombre</span></label>
                        <input class="form-input w-full focus:outline-none inprel" id="nombre" :disabled="!modal.forma" v-model="modal.datos.nombre"/>
                        <div class="mt-2" style="display: none;">
                            <p class="text-sm text-red-600"></p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block font-medium text-sm text-gray-700" for="apellido"><span>Apellido</span></label>
                        <input class="form-input w-full focus:outline-none inprel" id="apellido" :disabled="!modal.forma" v-model="modal.datos.apellido"/>
                        <div class="mt-2" style="display: none;">
                            <p class="text-sm text-red-600"></p>
                        </div>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="edad"><span>Edad</span></label>
                        <input class="form-input w-full focus:outline-none inprel" id="edad" :disabled="!modal.forma" v-model="modal.datos.edad"/>
                        <div class="mt-2" style="display: none;">
                            <p class="text-sm text-red-600"></p>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <label class="block font-medium text-sm text-gray-700" for="direccion"><span>Dirección</span></label>
                        <input class="form-input w-full focus:outline-none inprel" id="direccion" :disabled="!modal.forma" v-model="modal.datos.direccion"/>
                        <div class="mt-2" style="display: none;">
                            <p class="text-sm text-red-600"></p>
                        </div>
                    </div>
                </div>
            </template>
            <template #footer>
                <button v-if="modal.tipo==1" @click="crear()" class="rounded-lg inline-flex items-center hover:text-grey-500 focus:outline-none focus:shadow-outline text-white font-semibold py-2 px-2 md:px-4 bg-blue-900" block>Crear</button>
                <button v-if="modal.tipo==2" @click="editar()" class="rounded-lg inline-flex items-center hover:text-grey-500 focus:outline-none focus:shadow-outline text-white font-semibold py-2 px-2 md:px-4 bg-blue-900">Editar</button>
                <button @click="modal.estado=!modal.estado" class="rounded-lg inline-flex items-center hover:text-grey-500 focus:outline-none focus:shadow-outline text-white font-semibold py-2 px-2 md:px-4 bg-red-600">Cancelar</button>
            </template>
        </modal-general>
    </app-layout>
</template>

<script>
    import TablaGeneral from '@/Components/Tabla';
    import Opciones from '@/Components/Opciones';
    import ModalGeneral from '@/Jetstream/DialogModal';

    export default {
        components: {
            Opciones,
            TablaGeneral,
            ModalGeneral
        },
        data() {
            return {
                datos:{
                    ruta: "usuarios.listar",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:true,
                        crear:true,
                        editar:true,
                        eliminar:true,
                        modal:true,
                        opciones_adicionales:true,
                    },
                    permisos:{
                        ver: this.can('usuarios.ver'),
                        crear: this.can('usuarios.crear'),
                        editar: this.can('usuarios.editar'),
                        eliminar: this.can('usuarios.eliminar')
                    },
                    array: {
                        listar:[]
                    },
                    tabla:{
                        titulo:["NOMBRE","APELLIDO","DIRECCIÓN"],
                        campos:["nombre","apellido","direccion"]
                    }
                },
                modal:{
                    titulo:"",
                    tipo:null,
                    estado:false,
                    forma:true,
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
            boton(data){
                console.log(data);
            },
            abrir_modal(tipo, data){
                this.modal.forma = true;
                switch(tipo) {
                    case 'crear':
                        this.modal.titulo = "Crear Usuario";
                        this.modal.tipo = 1;
                        this.modal.estado = true;
                        this.modal.datos = {
                            id:null,
                            nombre:"",
                            apellido:"",
                            direccion:"",
                            edad:null
                        }
                    break;
                    case 'editar':
                        this.modal.titulo = "Editar Usuario";
                        this.modal.tipo = 2;
                        this.modal.estado = true;
                        this.modal.datos = {
                            id: data.id,
                            nombre:data.nombre,
                            apellido:data.apellido,
                            direccion:data.direccion,
                            edad:data.edad
                        }
                    break;
                    case 'ver':
                        this.modal.titulo = "Editar Usuario";
                        this.modal.tipo = 3;
                        this.modal.estado = true;
                        this.modal.forma = false;
                        this.modal.datos = {
                            id: data.id,
                            nombre:data.nombre,
                            apellido:data.apellido,
                            direccion:data.direccion,
                            edad:data.edad
                        }
                    break;
                }
            },
            async crear(){
                try {
                    const rq = await axios.post("/usuarios/crear", this.modal.datos);
                    this.listarbusqueda();
                    this.cerrar();
                } catch (error) {
                    console.log(error);
                }
            },
            async editar(){
                try {
                    const rq = await axios.put("/usuarios/editar", this.modal.datos);
                    this.listarbusqueda();
                    this.cerrar();
                } catch (error) {
                    console.log(error);
                }
            },
            async eliminar(id){
                try {
                    const rq = await axios.delete("/usuarios/eliminar/"+id);
                    this.listarbusqueda();
                } catch (error) {
                    if(error.response.status == 403){
                        this.permisos();
                    }
                }
            },
            cerrar(){
                this.modal.estado = false;
                this.modal.datos = {
                    id:null,
                    nombre:"",
                    apellido:"",
                    direccion:"",
                    edad:null
                }
            },
        }
    }
</script>
