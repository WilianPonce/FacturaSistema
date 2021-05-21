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
                    ruta: "roles",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:false,
                        crear:true,
                        editar:true,
                        eliminar:true,
                    },
                    tabla:{
                        titulo:["NOMBRE","WEB","FECHA DE CREACIÓN","FECHA DE MODIFICACIÓN"],
                        campos:["name","guard_name","created_at","updated_at"]
                    },
                },
            }
        }
    }
</script>
