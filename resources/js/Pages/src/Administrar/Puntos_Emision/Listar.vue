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
                    ruta: "puntos_emision",
                    opciones:{
                        buscar:true,
                        opciones:true,
                        ver:true,
                        crear:true,
                        editar:true,
                        eliminar:true,
                    },
                    tabla:{
                        titulo:["SERIE","NOMBRE","FACTURA","NOTA CRÉDITO", "NOTA DÉBITO","GUIA REMISIÓN","RETENCIÓN", "LIQUIDACIÓN", "ESTADO"],
                        campos:["serie","nombre","factura","nota_credito","nota_debito","guia_remision", "retencion_compra", "liquidacion_compra", "estado"]
                    },
                },
            }
        }
    }
</script>
