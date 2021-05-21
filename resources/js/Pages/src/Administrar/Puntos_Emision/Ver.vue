<template>
    <app-layout v-model="user">
        <form @submit.prevent="guardar()">
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="serie" value="Serie" />
                            <input-general disabled placeholder="Ej. 001" id="serie" type="text" class="block w-full capitalize" v-model="response.serie" autocomplete="serie" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="nombre" value="Nombre" />
                            <input-general disabled id="nombre" type="text" class="block w-full capitalize" v-model="response.nombre" autocomplete="nombre" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="establecimiento_id" value="Establecimientos" />
                            <select-general disabled id="establecimiento_id" v-model="response.establecimiento_id" ruta="api.establecimiento.select"/>
                        </div>
                        <div class="col-span-12 sm:col-span-2">
                            <label-general for="estado" value="Estado" />
                            <estado-general disabled v-model="response.estado"/>
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="factura" value="Factura" />
                            <input-general disabled placeholder="Ej. 001" id="factura" type="text" class="block w-full capitalize" v-model="response.factura" autocomplete="factura" />
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="nota_credito" value="Nota de Crédito" />
                            <input-general disabled placeholder="Ej. 001" id="nota_credito" type="text" class="block w-full capitalize" v-model="response.nota_credito" autocomplete="nota_credito" />
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="nota_debito" value="Nota de Débito" />
                            <input-general disabled placeholder="Ej. 001" id="nota_debito" type="text" class="block w-full capitalize" v-model="response.nota_debito" autocomplete="nota_debito" />
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="guia_remision" value="Guia de Remisión" />
                            <input-general disabled placeholder="Ej. 001" id="guia_remision" type="text" class="block w-full capitalize" v-model="response.guia_remision" autocomplete="guia_remision" />
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="retencion_compra" value="Retención de compra" />
                            <input-general disabled placeholder="Ej. 001" id="retencion_compra" type="text" class="block w-full capitalize" v-model="response.retencion_compra" autocomplete="retencion_compra" />
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="liquidacion_compra" value="Liquidación de Compra" />
                            <input-general disabled placeholder="Ej. 001" id="liquidacion_compra" type="text" class="block w-full capitalize" v-model="response.liquidacion_compra" autocomplete="liquidacion_compra" />
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6 pb-6 pt-8">
                    <inertia-link :href="route('administrar.puntos_emision.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Atras
                    </inertia-link>
                </div>
            </div>
        </form>
    </app-layout>
</template>

<script>
    export default {
        props:{
            user: Object,
            response: Object
        },
    }
</script>
