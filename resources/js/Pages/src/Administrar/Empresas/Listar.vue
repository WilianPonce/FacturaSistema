<template>
    <app-layout>
        <tabla-simple-general :datos="datos"/>
    </app-layout>
</template>

<script>
    export default {
        data() {
            return {
                datos:{
                    ruta: "empresas",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:true,
                        crear:true,
                        editar:true,
                        eliminar:true,
                    },
                    tabla:{
                        titulo:["CODIGO","RAZON SOCIAL","RAZON COMERCIAL","RUC","DIRECCIÓN","TELÉFONO"],
                        campos:["codigo","razon_social","razon_comercial","ruc","direccion","telefono"]
                    },
                },
            }
        }
    }
</script>
