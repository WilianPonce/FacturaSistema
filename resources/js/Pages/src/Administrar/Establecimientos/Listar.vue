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
                    ruta: "establecimientos",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:true,
                        crear:true,
                        editar:true,
                        eliminar:true,
                    },
                    tabla:{
                        titulo:["SERIE","NOMBRE","URL WEB","NOMBRE COMERCIAL","DIRECCIÓN","ESTADO"],
                        campos:["serie","nombre","url_web","nombre_comercial","direccion","estado"]
                    },
                },
            }
        }
    }
</script>
