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
                    ruta: "usuarios",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:false,
                        crear:true,
                        editar:true,
                        eliminar:true,
                    },
                    tabla:{
                        titulo:["NOMBRE","EMAIL","TELÉFONO","CELULAR", "DIRECCIÓN","ESTADO"],
                        campos:["name","email","telefono","celular","direccion","estado"]
                    },
                },
            }
        }
    }
</script>
