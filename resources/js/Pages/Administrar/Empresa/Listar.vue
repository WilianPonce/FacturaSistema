<template>
    <app-layout>
        <tabla-general :datos="datos" @eliminar="eliminar" @editar="editar" @ver="ver" @crear="crear"/>
    </app-layout>
</template>

<script>
    import TablaGeneral from '@/Components/Tabla';

    export default {
        components: {
            TablaGeneral
        },
        data() {
            return {
                datos:{
                    ruta: "/usuarios/listar",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:true,
                        crear:true,
                        editar:true,
                        eliminar:true,
                        modal:false,
                        opciones_adicionales:false,
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
                    },
                },
            }
        },
        methods:{
            ver(tipo, data){
                console.log(data);
            },
            crear(tipo){
                console.log("ho");
            },
            editar(tipo, data){
                console.log(data);
            },
            eliminar(tipo, data){
                console.log(data);
            }
        }
    }
</script>
