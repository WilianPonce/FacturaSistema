<template>
    <app-layout>
        <form @submit.prevent="guardar()">
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="codigo" value="Código" />
                            <input-general id="codigo" type="text" class="block w-full" v-model="form.codigo" autocomplete="codigo" />
                            <error-general :message="form.error('codigo')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="periodo" value="Periodo" />
                            <periodo-general v-model="form.periodo" placeholder="Seleccionar"/>
                            <error-general :message="form.error('periodo')" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label-general for="razon_social" value="Razón Social"/>
                            <input-general id="razon_social" type="text" class="block w-full" v-model="form.razon_social" autocomplete="razon_social" />
                            <error-general :message="form.error('razon_social')" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label-general for="razon_comercial" value="Razón Comercial" />
                            <input-general id="razon_comercial" type="text" class="block w-full" v-model="form.razon_comercial" autocomplete="razon_comercial" />
                            <error-general :message="form.error('razon_comercial')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="tipo_identificacion" value="Tipo Identificación" />
                            <tipo-identificacion-general v-model="form.tipo_identificacion" placeholder="Seleccionar" id="tipo_identificacion"/>
                            <error-general :message="form.error('tipo_identificacion')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="identificacion" value="Identificación" />
                            <input-general id="identificacion" type="text" class="block w-full" v-model="form.identificacion" autocomplete="identificacion" />
                            <error-general :message="form.error('identificacion')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="telefono" value="Teléfono" />
                            <input-general id="telefono" type="text" class="block w-full" v-model="form.telefono" autocomplete="telefono" />
                            <error-general :message="form.error('telefono')" />
                        </div>
                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="direccion" value="Dirección" />
                            <input-general id="direccion" type="text" class="block w-full" v-model="form.direccion" autocomplete="direccion" />
                            <error-general :message="form.error('direccion')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="obligado_contabilidad" class="text-center" value="Obligado llevar contabilidad" />
                            <radio-general  v-model="form.obligado_contabilidad" name="obligado_contabilidad" />
                            <error-general :message="form.error('obligado_contabilidad')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="facturar_negativo" class="text-center" value="Facturar en negativo" />
                            <radio-general  v-model="form.facturar_negativo" name="facturar_negativo" />
                            <error-general :message="form.error('facturar_negativo')" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="periodo_inicio" value="Periodo de inicio" />
                            <input-general id="periodo_inicio" type="date" class="block w-full" v-model="form.periodo_inicio" autocomplete="periodo_inicio" />
                            <error-general :message="form.error('periodo_inicio')" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="periodo_fin" value="Periodo del final" />
                            <input-general id="periodo_fin" type="date" class="block w-full" v-model="form.periodo_fin" autocomplete="periodo_fin" />
                            <error-general :message="form.error('periodo_fin')" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="contador_nombre" value="Nombre del Contador" />
                            <input-general id="contador_nombre" type="text" class="block w-full" v-model="form.contador_nombre" autocomplete="contador_nombre" />
                            <error-general :message="form.error('contador_nombre')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="contador_ruc" value="RUC del Contador" />
                            <input-general id="contador_ruc" type="text" class="block w-full" v-model="form.contador_ruc" autocomplete="contador_ruc" />
                            <error-general :message="form.error('contador_ruc')" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="representante_nombre" value="Nombre del representante" />
                            <input-general id="representante_nombre" type="text" class="block w-full" v-model="form.representante_nombre" autocomplete="representante_nombre" />
                            <error-general :message="form.error('representante_nombre')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="representante_ruc" value="RUC del representante" />
                            <input-general id="representante_ruc" type="text" class="block w-full" v-model="form.representante_ruc" autocomplete="representante_ruc" />
                            <error-general :message="form.error('representante_ruc')" />
                        </div>

                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="moneda_id" value="Moneda" />
                            <moneda-general v-model="form.moneda_id" />
                            <error-general :message="form.error('moneda_id')" />
                        </div>
                        <div class="col-span-6 sm:col-span-5 mt-4">
                            <label-general for="provincia_id" value="Provinica" />
                            <provincia-general v-model="form.provincia_id"/>
                            <error-general :message="form.error('provincia_id')" />
                        </div>
                        <div class="col-span-6 sm:col-span-5 mt-4">
                            <label-general for="ciudad_id" value="Ciudad" />
                            <ciudad-general v-model="form.ciudad_id" :provincia_id="form.provincia_id"/>
                            <error-general :message="form.error('ciudad_id')" />
                        </div>

                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="email_facturacion" value="Email para facturación" />
                            <input-general id="email_facturacion" type="text" class="block w-full" v-model="form.email_facturacion"/>
                            <error-general :message="form.error('email_facturacion')" />
                        </div>
                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="leyenda_facturacion" value="Leyenda para facturación" />
                            <input-general id="leyenda_facturacion" type="text" class="block w-full" v-model="form.leyenda_facturacion"/>
                            <error-general :message="form.error('leyenda_facturacion')" />
                        </div>

                        <div class="divider col-span-12"><span>Configuración del Email</span></div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email" value="Correo Electrónico" />
                            <input-general id="email" type="text" class="block w-full" v-model="form.email" autocomplete="email" />
                            <error-general :message="form.error('email')" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_password" value="Contraseña" />
                            <input-general id="email_password" type="password" class="block w-full" v-model="form.email_password" autocomplete="email_password" />
                            <error-general :message="form.error('email_password')" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_password_confirmation" value="Repetir Contraseña" />
                            <input-general id="email_password_confirmation" type="password" class="block w-full" v-model="form.email_password_confirmation" autocomplete="email_password_confirmation" />
                            <error-general :message="form.error('email_password_confirmation')" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label-general for="email_server" value="Servidor" />
                            <input-general id="email_server" type="text" class="block w-full" v-model="form.email_server" autocomplete="email_server" />
                            <error-general :message="form.error('email_server')" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label-general for="email_port" value="Puerto" />
                            <input-general id="email_port" type="text" class="block w-full" v-model="form.email_port" autocomplete="email_port" />
                            <error-general :message="form.error('email_port')" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_security" class="text-center" value="Seguridad" />
                            <radio-general v-model="form.email_security" name="email_security" :data="[{id:1, nombre:'Ssl'}, {id:2, nombre:'Tls'}, {id:3, nombre:'Ninguno'}]" />
                            <error-general :message="form.error('email_security')" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="email_security" value="Verificar" class="text-center" />
                            <button type="button" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Correo Prueba
                            </button>
                        </div>
                        <div class="divider col-span-12"><span>Forma de envio de comprobantes</span></div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="tipo_emision" value="Tipo Emisión" />
                            <tipo-emision-general v-model="form.tipo_emision"/>
                            <error-general :message="form.error('tipo_emision')" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="ambiente" value="Tipo de ambiente" />
                            <ambiente-general v-model="form.ambiente"/>
                            <error-general :message="form.error('ambiente')" />
                        </div>
                        <div class="divider col-span-12"><span>Logotipo Y firma Electrónica</span></div>

                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="logotipo" value="Logotipo de la empresa"/>
                            <div class="grid grid-cols-6 gap-4">
                                <div class="col-start-2 col-span-4 cursor-pointer">
                                    <logotipo-general v-model="form.logotipo_archivo" :data="form.logotipo"/>
                                </div>
                            </div>
                            <error-general :message="form.error('logotipo_archivo')" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="firma" value="Firma Electrónica de la empresa"/>
                            <div class="grid grid-cols-6 gap-4">
                                <div class="col-start-2 col-span-4 cursor-pointer">
                                    <firma-general v-model="form.firma_electronica_archivo" :data="form.firma_electronica"/>
                                </div>
                            </div>
                            <error-general :message="form.error('firma_electronica_archivo')" />
                            <div class="grid grid-cols-6 gap-4 mt-5" v-if="form.firma_electronica_archivo || form.firma_electronica">
                                <div class="col-start-2 col-span-4 cursor-pointer">
                                    <div class="col-span-12 sm:col-span-12 mt-3">
                                        <label-general for="firma_electronica_password" value="Contraseña" />
                                        <input-general id="firma_electronica_password" type="password" class="block w-full" v-model="form.firma_electronica_password" autocomplete="firma_electronica_password" />
                                        <error-general :message="form.error('firma_electronica_password')" />
                                    </div>
                                    <div class="col-span-12 sm:col-span-12 mt-3">
                                        <label-general for="firma_electronica_expiracion" value="fecha expiración" />
                                        <input-general id="firma_electronica_expiracion" type="date" class="block w-full" v-model="form.firma_electronica_expiracion" autocomplete="firma_electronica_expiracion" />
                                        <error-general :message="form.error('firma_electronica_expiracion')" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 pt-10">
                    <inertia-link :href="route('administrar.empresas.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancelar
                    </inertia-link>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </app-layout>
</template>

<script>
    import $ from 'jquery';
    import MonedaGeneral from '@/Components/Tablas/Moneda';
    import CiudadGeneral from '@/Components/Tablas/Ciudad';
    import ProvinciaGeneral from '@/Components/Tablas/Provincia';
    import TipoIdentificacionGeneral from '@/Components/Tablas/Tipo_identificacion';
    import AmbienteGeneral from '@/Components/Tablas/Ambiente';
    import TipoEmisionGeneral from '@/Components/Tablas/Tipo_Emision';
    import LogotipoGeneral from '@/Components/Simples/Logotipo';
    import FirmaGeneral from '@/Components/Simples/Firma';
    import PeriodoGeneral from '@/Components/Tablas/Periodo';

    export default {
        props:["user", "response"],
        components: {
            MonedaGeneral,
            CiudadGeneral,
            ProvinciaGeneral,
            TipoIdentificacionGeneral,
            AmbienteGeneral,
            TipoEmisionGeneral,
            LogotipoGeneral,
            FirmaGeneral,
            PeriodoGeneral
        },
        data() {
            return {
                form: null,
            }
        },
        methods: {
            guardar(){
                this.form.post(route('api.empresas.editar', this.form.id), {
                    preserveScroll: false,
                    onSuccess: page => {
                        if (Object.keys(page.props.errors).length === 0) {
                            this.$alertify.success(this.$page.message);
                            this.$inertia.visit(route('administrar.empresas.listar'));
                        }else{
                            setTimeout(() => {
                                var valor = -($(".text-danger-error:first-child").offset().top);
                                $("main").animate({
                                    scrollTop: valor,
                                }, 500);
                            }, 50);
                        }
                    },
                });
            }
        },
        created() {
            this.form = this.$inertia.form(this.response, {resetOnSuccess: false,});
        }
    }
</script>
