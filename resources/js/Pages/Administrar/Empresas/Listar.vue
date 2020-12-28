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
                    ruta: "api.empresas.listar",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:true,
                        crear:true,
                        editar:true,
                        eliminar:true,
                    },
                    permisos:{
                        ver: this.can('empresas.ver'),
                        crear: this.can('empresas.crear'),
                        editar: this.can('empresas.editar'),
                        eliminar: this.can('empresas.eliminar')
                    },
                    array: {
                        listar:[]
                    },
                    tabla:{
                        titulo:["CODIGO","RAZON SOCIAL","RAZON COMERCIAL","RUC","DIRECCIÓN","TELÉFONO"],
                        campos:["codigo","razon_social","razon_comercial","ruc","direccion","telefono"]
                    },
                },
            }
        },
        methods:{
            ver(tipo, data){
                this.$inertia.visit(route('api.empresas.ver', data.id));
            },
            crear(tipo){
                this.$inertia.visit(route("administrar.empresas.crear"));
            },
            editar(tipo, data){
                this.$inertia.visit(route("administrar.empresas.editar", data.id));
            },
            eliminar(tipo, data){
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
                        this.$inertia.delete(route('api.empresas.eliminar', data.id), {
                            onSuccess: () => {
                                this.$alertify.success(this.$page.message);
                            }
                        });
                    }
                });
            }
        }
    }
</script>
