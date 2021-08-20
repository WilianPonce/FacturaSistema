<template>
    <app-layout>
        <form>
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="codigo" value="Código" />
                            <input-general disabled id="codigo" type="text" class="block w-full" v-model="response.codigo" autocomplete="codigo" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="periodo" value="Periodo" />
                            <periodo-general disabled v-model="response.periodo" placeholder="Seleccionar"/>
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label-general for="razon_social" value="Razón Social"/>
                            <input-general disabled id="razon_social" type="text" class="block w-full" v-model="response.razon_social" autocomplete="razon_social" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label-general for="razon_comercial" value="Razón Comercial" />
                            <input-general disabled id="razon_comercial" type="text" class="block w-full" v-model="response.razon_comercial" autocomplete="razon_comercial" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="tipo_identificacion" value="Tipo Identificación" />
                            <tipo-identificacion-general disabled v-model="response.tipo_identificacion" placeholder="Seleccionar" id="tipo_identificacion"/>
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="identificacion" value="Identificación" />
                            <input-general disabled id="identificacion" type="text" class="block w-full" v-model="response.identificacion" autocomplete="identificacion" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="telefono" value="Teléfono" />
                            <input-general disabled id="telefono" type="text" class="block w-full" v-model="response.telefono" autocomplete="telefono" />
                        </div>
                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="direccion" value="Dirección" />
                            <input-general disabled id="direccion" type="text" class="block w-full" v-model="response.direccion" autocomplete="direccion" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="obligado_contabilidad" class="text-center" value="Obligado llevar contabilidad" />
                            <radio-general disabled v-model="response.obligado_contabilidad" name="obligado_contabilidad" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="facturar_negativo" class="text-center" value="Facturar en negativo" />
                            <radio-general disabled v-model="response.facturar_negativo" name="facturar_negativo" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="periodo_inicio" value="Periodo de inicio" />
                            <input-general disabled id="periodo_inicio" type="date" class="block w-full" v-model="response.periodo_inicio" autocomplete="periodo_inicio" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="periodo_fin" value="Periodo del final" />
                            <input-general disabled id="periodo_fin" type="date" class="block w-full" v-model="response.periodo_fin" autocomplete="periodo_fin" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="contador_nombre" value="Nombre del Contador" />
                            <input-general disabled id="contador_nombre" type="text" class="block w-full" v-model="response.contador_nombre" autocomplete="contador_nombre" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="contador_ruc" value="RUC del Contador" />
                            <input-general disabled id="contador_ruc" type="text" class="block w-full" v-model="response.contador_ruc" autocomplete="contador_ruc" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="representante_nombre" value="Nombre del representante" />
                            <input-general disabled id="representante_nombre" type="text" class="block w-full" v-model="response.representante_nombre" autocomplete="representante_nombre" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="representante_ruc" value="RUC del representante" />
                            <input-general disabled id="representante_ruc" type="text" class="block w-full" v-model="response.representante_ruc" autocomplete="representante_ruc" />
                        </div>

                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="moneda_id" value="Moneda" />
                            <moneda-general disabled v-model="response.moneda_id" />
                        </div>
                        <div class="col-span-6 sm:col-span-5 mt-4">
                            <label-general for="provincia_id" value="Provinica" />
                            <provincia-general disabled v-model="response.provincia_id"/>
                        </div>
                        <div class="col-span-6 sm:col-span-5 mt-4">
                            <label-general for="ciudad_id" value="Ciudad" />
                            <ciudad-general disabled v-model="response.ciudad_id" :provincia_id="response.provincia_id"/>
                        </div>

                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="email_facturacion" value="Email para facturación" />
                            <input-general disabled id="email_facturacion" type="text" class="block w-full" v-model="response.email_facturacion"/>
                        </div>
                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="leyenda_facturacion" value="Leyenda para facturación" />
                            <input-general disabled id="leyenda_facturacion" type="text" class="block w-full" v-model="response.leyenda_facturacion"/>
                        </div>

                        <div class="divider col-span-12"><span>Configuración del Email</span></div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email" value="Correo Electrónico" />
                            <input-general disabled id="email" type="text" class="block w-full" v-model="response.email" autocomplete="email" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_password" value="Contraseña" />
                            <input-general disabled id="email_password" type="password" class="block w-full" v-model="response.email_password" autocomplete="email_password" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_password_confirmation" value="Repetir Contraseña" />
                            <input-general disabled id="email_password_confirmation" type="password" class="block w-full" v-model="response.email_password_confirmation" autocomplete="email_password_confirmation" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_server" value="Servidor" />
                            <input-general disabled id="email_server" type="text" class="block w-full" v-model="response.email_server" autocomplete="email_server" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_port" value="Puerto" />
                            <input-general disabled id="email_port" type="text" class="block w-full" v-model="response.email_port" autocomplete="email_port" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_security" class="text-center" value="Seguridad" />
                            <radio-general disabled v-model="response.email_security" name="email_security" :data="[{id:1, nombre:'Ssl'}, {id:2, nombre:'Tls'}, {id:3, nombre:'Ninguno'}]" />
                        </div>
                        <div class="divider col-span-12"><span>responsea de envio de comprobantes</span></div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="tipo_emision" value="Tipo Emisión" />
                            <tipo-emision-general disabled v-model="response.tipo_emision"/>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="ambiente" value="Tipo de ambiente" />
                            <ambiente-general disabled   v-model="response.ambiente"/>
                        </div>
                        <div class="divider col-span-12"><span>Logotipo Y firma Electrónica</span></div>

                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="logotipo" value="Logotipo de la empresa"/>
                            <div class="grid grid-cols-6 gap-4">
                                <div class="col-start-2 col-span-4 cursor-pointer">
                                    <logotipo-general v-model="response.logotipo_archivo" :data="response.logotipo" disabled/>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="firma" value="Firma Electrónica de la empresa"/>
                            <div class="grid grid-cols-6 gap-4">
                                <div class="col-start-2 col-span-4 cursor-pointer">
                                    <firma-general v-model="response.firma_electronica_archivo" :data="response.firma_electronica" disabled/>
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-4 mt-5" v-if="response.firma_electronica_archivo || response.firma_electronica">
                                <div class="col-start-2 col-span-4 cursor-pointer">
                                    <div class="col-span-12 sm:col-span-12 mt-3">
                                        <label-general for="firma_electronica_password" value="Contraseña" />
                                        <input-general id="firma_electronica_password" disabled type="password" class="block w-full" v-model="response.firma_electronica_password" autocomplete="firma_electronica_password" />
                                    </div>
                                    <div class="col-span-12 sm:col-span-12 mt-3">
                                        <label-general for="firma_electronica_expiracion" value="fecha expiración" />
                                        <input-general id="firma_electronica_expiracion" disabled type="date" class="block w-full" v-model="response.firma_electronica_expiracion" autocomplete="firma_electronica_expiracion" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 pt-10">
                    <inertia-link :href="route('administrar.empresas.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Atras
                    </inertia-link>
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
    }
</script>
