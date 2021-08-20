<template>
    <app-layout v-model="user">
        <form @submit.prevent="guardar()">
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="serie" value="Serie" />
                            <input-general placeholder="Ej. 001" id="serie" type="text" class="block w-full capitalize" v-model="form.serie" autocomplete="serie" />
                            <error-general :message="form.error('serie')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="nombre" value="Nombre" />
                            <input-general id="nombre" type="text" class="block w-full capitalize" v-model="form.nombre" autocomplete="nombre" />
                            <error-general :message="form.error('nombre')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="establecimiento_id" value="Establecimientos" />
                            <select-general id="establecimiento_id" v-model="form.establecimiento_id" ruta="api.establecimiento.select"/>
                            <error-general :message="form.error('establecimiento_id')"/>
                        </div>
                        <div class="col-span-12 sm:col-span-2">
                            <label-general for="estado" value="Estado" />
                            <estado-general v-model="form.estado"/>
                            <error-general :message="form.error('estado')"/>
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="factura" value="Factura" />
                            <input-general placeholder="Ej. 001" id="factura" type="text" class="block w-full capitalize" v-model="form.factura" autocomplete="factura" />
                            <error-general :message="form.error('factura')"/>
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="nota_credito" value="Nota de Crédito" />
                            <input-general placeholder="Ej. 001" id="nota_credito" type="text" class="block w-full capitalize" v-model="form.nota_credito" autocomplete="nota_credito" />
                            <error-general :message="form.error('nota_credito')"/>
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="nota_debito" value="Nota de Débito" />
                            <input-general placeholder="Ej. 001" id="nota_debito" type="text" class="block w-full capitalize" v-model="form.nota_debito" autocomplete="nota_debito" />
                            <error-general :message="form.error('nota_debito')"/>
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="guia_remision" value="Guia de Remisión" />
                            <input-general placeholder="Ej. 001" id="guia_remision" type="text" class="block w-full capitalize" v-model="form.guia_remision" autocomplete="guia_remision" />
                            <error-general :message="form.error('guia_remision')"/>
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="retencion_compra" value="Retención de compra" />
                            <input-general placeholder="Ej. 001" id="retencion_compra" type="text" class="block w-full capitalize" v-model="form.retencion_compra" autocomplete="retencion_compra" />
                            <error-general :message="form.error('retencion_compra')"/>
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <label-general for="liquidacion_compra" value="Liquidación de Compra" />
                            <input-general placeholder="Ej. 001" id="liquidacion_compra" type="text" class="block w-full capitalize" v-model="form.liquidacion_compra" autocomplete="liquidacion_compra" />
                            <error-general :message="form.error('liquidacion_compra')"/>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6 pb-6 pt-8">
                    <inertia-link :href="route('administrar.puntos_emision.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancelar
                    </inertia-link>
                    <button type="submit" :disabled="form.processing" :class="{'spinner':form.processing}" class="inline-block justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-spinner fa-spin mr-1 hidden"></i>
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </app-layout>
</template>

<script>
    export default {
        props:{
            user: Object
        },
        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'POST',
                    nombre: null,
                    serie: null,
                    estado: true,
                    factura: null,
                    nota_credito: null,
                    nota_debito: null,
                    guia_remision: null,
                    retencion_compra: null,
                    liquidacion_compra: null,
                    establecimiento_id: null
                }, {
                    resetOnSuccess: false,
                }),
            }
        },
        methods: {
            guardar(){
                this.form.post(route('api.puntos_emision.crear'), {
                    preserveScroll: false,
                    onSuccess: page => {
                        if (Object.keys(page.props.errors).length === 0) {
                            this.$alertify.success(this.$page.message);
                            this.$inertia.visit(route('administrar.puntos_emision.listar'));
                        }
                    },
                });
            }
        }
    }
</script>
