<template>
    <app-layout>
        <form @submit.prevent="guardar()">
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="codigo" value="Código" />
                            <input-general id="codigo" type="text" class="block w-full" v-model="form.codigo" autocomplete="codigo" />
                            <error-general :message="$page.errors.codigo" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="periodo" value="Periodo" />
                            <v-select :options="periodos" v-model="form.periodo" placeholder="Seleccionar"/>
                            <error-general :message="$page.errors.periodo" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label-general for="razon_social" value="Razón Social"/>
                            <input-general id="razon_social" type="text" class="block w-full" v-model="form.razon_social" autocomplete="razon_social" />
                            <error-general :message="$page.errors.razon_social" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label-general for="razon_comercial" value="Razón Comercial" />
                            <input-general id="razon_comercial" type="text" class="block w-full" v-model="form.razon_comercial" autocomplete="razon_comercial" />
                            <error-general :message="$page.errors.razon_comercial" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="tipo_identificacion" value="Tipo Identificación" />
                            <tipo-identificacion-general v-model="form.tipo_identificacion" placeholder="Seleccionar" id="tipo_identificacion"/>
                            <error-general :message="$page.errors.tipo_identificacion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="identificacion" value="Identificación" />
                            <input-general id="identificacion" type="text" class="block w-full" v-model="form.identificacion" autocomplete="identificacion" />
                            <error-general :message="$page.errors.identificacion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="telefono" value="Teléfono" />
                            <input-general id="telefono" type="text" class="block w-full" v-model="form.telefono" autocomplete="telefono" />
                            <error-general :message="$page.errors.telefono" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="direccion" value="Dirección" />
                            <input-general id="direccion" type="text" class="block w-full" v-model="form.direccion" autocomplete="direccion" />
                            <error-general :message="$page.errors.direccion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="obligado_contabilidad" class="text-center" value="Obligado contabilidad" />
                            <div class="grid grid-cols-2 mt-4">
                                <vs-radio v-model="form.obligado_contabilidad" val="1">
                                    Si
                                </vs-radio>
                                <vs-radio v-model="form.obligado_contabilidad" val="0">
                                    No
                                </vs-radio>
                            </div>
                            <error-general :message="$page.errors.obligado_contabilidad" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="facturar_negativo" class="text-center" value="Facturar en negativo" />
                            <div class="grid grid-cols-2 mt-4">
                                <vs-radio v-model="form.facturar_negativo" val="1">
                                    Si
                                </vs-radio>
                                <vs-radio v-model="form.facturar_negativo" val="0">
                                    No
                                </vs-radio>
                            </div>
                            <error-general :message="$page.errors.facturar_negativo" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="periodo_inicio" value="Periodo de inicio" />
                            <input-general id="periodo_inicio" type="date" class="block w-full" v-model="form.periodo_inicio" autocomplete="periodo_inicio" />
                            <error-general :message="$page.errors.periodo_inicio" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="periodo_fin" value="Periodo del final" />
                            <input-general id="periodo_fin" type="date" class="block w-full" v-model="form.periodo_fin" autocomplete="periodo_fin" />
                            <error-general :message="$page.errors.periodo_fin" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="contador_nombre" value="Nombre del Contador" />
                            <input-general id="contador_nombre" type="text" class="block w-full" v-model="form.contador_nombre" autocomplete="contador_nombre" />
                            <error-general :message="$page.errors.contador_nombre" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="contador_ruc" value="RUC del Contador" />
                            <input-general id="contador_ruc" type="text" class="block w-full" v-model="form.contador_ruc" autocomplete="contador_ruc" />
                            <error-general :message="$page.errors.contador_ruc" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <label-general for="representante_nombre" value="Nombre del representante" />
                            <input-general id="representante_nombre" type="text" class="block w-full" v-model="form.representante_nombre" autocomplete="representante_nombre" />
                            <error-general :message="$page.errors.representante_nombre" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="representante_ruc" value="RUC del representante" />
                            <input-general id="representante_ruc" type="text" class="block w-full" v-model="form.representante_ruc" autocomplete="representante_ruc" />
                            <error-general :message="$page.errors.representante_ruc" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2 mt-4">
                            <label-general for="moneda_id" value="Moneda" />
                            <moneda-general v-model="form.moneda_id" />
                            <error-general :message="$page.errors.moneda_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-5 mt-4">
                            <label-general for="provincia_id" value="Provinica" />
                            <provincia-general v-model="form.provincia_id" @input="form.ciudad_id=''"/>
                            <error-general :message="$page.errors.provincia_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-5 mt-4">
                            <label-general for="ciudad_id" value="Ciudad" />
                            <ciudad-general v-model="form.ciudad_id" :provincia_id="form.provincia_id"/>
                            <error-general :message="$page.errors.ciudad_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="email_facturacion" value="Email para facturación" />
                            <input-general id="email_facturacion" type="text" class="block w-full" v-model="form.email_facturacion"/>
                            <error-general :message="$page.errors.email_facturacion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-6 mt-4">
                            <label-general for="leyenda_facturacion" value="Leyenda para facturación" />
                            <input-general id="leyenda_facturacion" type="text" class="block w-full" v-model="form.leyenda_facturacion"/>
                            <error-general :message="$page.errors.leyenda_facturacion" class="mt-2" />
                        </div>

                        <div class="divider col-span-12"><span>Configuración del Email</span></div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email" value="Correo Electrónico" />
                            <input-general id="email" type="text" class="block w-full" v-model="form.email" autocomplete="email" />
                            <error-general :message="$page.errors.email" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_password" value="Contraseña" />
                            <input-general id="email_password" type="password" class="block w-full" v-model="form.email_password" autocomplete="email_password" />
                            <error-general :message="$page.errors.email_password" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_password_confirmation" value="Repetir Contraseña" />
                            <input-general id="email_password_confirmation" type="password" class="block w-full" v-model="form.email_password_confirmation" autocomplete="email_password_confirmation" />
                            <error-general :message="$page.errors.email_password_confirmation" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label-general for="email_server" value="Servidor" />
                            <input-general id="email_server" type="text" class="block w-full" v-model="form.email_server" autocomplete="email_server" />
                            <error-general :message="$page.errors.email_server" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label-general for="email_port" value="Puerto" />
                            <input-general id="email_port" type="text" class="block w-full" v-model="form.email_port" autocomplete="email_port" />
                            <error-general :message="$page.errors.email_port" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="email_security" class="text-center" value="Seguridad" />
                            <div class="grid grid-cols-3 mt-4">
                                <vs-radio v-model="form.email_security" val="1">
                                    Ssl
                                </vs-radio>
                                <vs-radio v-model="form.email_security" val="2">
                                    Tls
                                </vs-radio>
                                <vs-radio v-model="form.email_security" val="3">
                                    Ninguno
                                </vs-radio>
                            </div>
                            <error-general :message="$page.errors.email_security" class="mt-2" />
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
                            <error-general :message="$page.errors.tipo_emision" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="ambiente" value="Tipo de ambiente" />
                            <ambiente-general v-model="form.ambiente"/>
                            <error-general :message="$page.errors.ambiente" class="mt-2" />
                        </div>
                        <div class="divider col-span-12"><span>Logotipo Y firma Electrónica</span></div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="logotipo" value="Logotipo de la empresa"/>
                            <div class="grid grid-cols-12 gap-4">
                                <input type="file" id="logotipo" accept=".jpg, .jpeg, .png, .bmp, .gif, .svg, .webp" class="hidden" ref="photo" @change="actualizarfoto">
                                <div class="col-start-4 col-span-6 cursor-pointer" v-if="archivos.foto_edit">
                                    <div class="mt-2 imagen_vista" v-show="!archivos.foto">
                                        <div class="close" @click.prevent="borrarfoto">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <img :src="route('api.logotipo', form.logotipo)" @click.prevent="seleccionarfoto" alt="Current Profile Photo" class="border-4 block w-full object-cover shadow-2xl border-gray-900 rounded" style="min-height: 200px;background-size: cover; background-repeat: no-repeat; background-position: center center;">
                                    </div>
                                </div>
                                <div class="col-start-4 col-span-6 cursor-pointer" v-else>
                                    <div class="mt-2" v-show="!archivos.foto" @click.prevent="seleccionarfoto">
                                        <img :src="user.profile_photo_url" alt="Current Profile Photo" class="border-4 w-full object-cover shadow-2xl border-gray-900 rounded">
                                    </div>
                                    <div class="mt-2 imagen_vista" v-show="archivos.foto">
                                        <div class="close" @click.prevent="borrarfoto">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <img :src="archivos.foto" @click.prevent="seleccionarfoto" type="text" class="border-4 block w-full object-cover shadow-2xl border-gray-900 rounded" style="min-height: 200px;background-size: cover; background-repeat: no-repeat; background-position: center center;">
                                    </div>
                                </div>
                            </div>
                            <error-general :message="$page.errors.logotipo_archivo" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="firma" value="Firma Electrónica de la empresa"/>
                            <div class="grid grid-cols-12 gap-4">
                                <input type="file" accept=".p12,.fpx" id="firma" class="hidden" ref="firma" @change="actualizarfirma">
                                <template v-if="archivos.firma_edit">
                                    <div class="col-start-4 col-span-6 cursor-pointer" v-if="form.firma_electronica" style="position:relative">
                                        <span class="borrado" @click.prevent="borrarfirma">¡Click para borrar!</span>
                                        <button @click.prevent="seleccionarfirma" class="mt-5 campo-left w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Firma electrónica subida</button>
                                    </div>
                                    <div class="col-start-4 col-span-6 cursor-pointer" v-else>
                                        <button @click.prevent="seleccionarfirma" class="mt-5 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Subir Firma electrónica</button>
                                    </div>
                                    <div class="col-start-3 col-span-8 cursor-pointer" v-if="form.firma_electronica">
                                        <div class="col-span-12 sm:col-span-12 mt-3">
                                            <label-general for="firma_electronica_password" value="Contraseña" />
                                            <input-general id="firma_electronica_password" type="text" class="block w-full" v-model="form.firma_electronica_password" autocomplete="firma_electronica_password" />
                                            <error-general :message="$page.errors.firma_electronica_password" class="mt-2" />
                                        </div>
                                        <div class="col-span-12 sm:col-span-12 mt-3">
                                            <label-general for="firma_electronica_expiracion" value="fecha expiración" />
                                            <input-general id="firma_electronica_expiracion" type="date" class="block w-full" v-model="form.firma_electronica_expiracion" autocomplete="firma_electronica_expiracion" />
                                            <error-general :message="$page.errors.firma_electronica_expiracion" class="mt-2" />
                                        </div>
                                    </div>
                                </template>
                                <template v-else>
                                    <div class="col-start-4 col-span-6 cursor-pointer" v-show="!archivos.firma_electronica">
                                        <button @click.prevent="seleccionarfirma" class="mt-5 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Subir Firma electrónica</button>
                                    </div>
                                    <div class="col-start-3 col-span-8 cursor-pointer" v-show="archivos.firma_electronica" style="position:relative">
                                        <span class="borrado" @click.prevent="borrarfirma">¡Click para borrar!</span>
                                        <button @click.prevent="seleccionarfirma" class="mt-5 campo-left w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Firma electrónica subida ☺
                                        </button>
                                    </div>
                                    <div class="col-start-3 col-span-8 cursor-pointer" v-show="archivos.firma_electronica">
                                        <div class="col-span-12 sm:col-span-12 mt-3">
                                            <label-general for="firma_electronica_password" value="Contraseña" />
                                            <input-general id="firma_electronica_password" type="text" class="block w-full" v-model="form.firma_electronica_password" autocomplete="firma_electronica_password" />
                                            <error-general :message="$page.errors.firma_electronica_password" class="mt-2" />
                                        </div>
                                        <div class="col-span-12 sm:col-span-12 mt-3">
                                            <label-general for="firma_electronica_expiracion" value="fecha expiración" />
                                            <input-general id="firma_electronica_expiracion" type="date" class="block w-full" v-model="form.firma_electronica_expiracion" autocomplete="firma_electronica_expiracion" />
                                            <error-general :message="$page.errors.firma_electronica_expiracion" class="mt-2" />
                                        </div>
                                    </div>
                                </template>
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
    import moment from 'moment';
    import $ from 'jquery';
    import TipoEmisionGeneral from '@/Components/Tablas/Tipo_Emision';
    import MonedaGeneral from '@/Components/Tablas/Moneda';
    import CiudadGeneral from '@/Components/Tablas/Ciudad';
    import ProvinciaGeneral from '@/Components/Tablas/Provincia';
    import TipoIdentificacionGeneral from '@/Components/Tablas/Tipo_identificacion';
    import AmbienteGeneral from '@/Components/Tablas/Ambiente';


    export default {
        props:["user", "recupera"],
        components: {
            MonedaGeneral,
            CiudadGeneral,
            ProvinciaGeneral,
            TipoIdentificacionGeneral,
            AmbienteGeneral,
            TipoEmisionGeneral
        },
        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'PUT',
                    id:null,
                    codigo: null,
                    periodo: null,
                    razon_social: null,
                    razon_comercial: null,
                    tipo_identificacion:null,
                    identificacion: null,
                    direccion: null,
                    telefono: null,
                    email: null,
                    email_password_confirmation: null,
                    email_password: null,
                    email_server: null,
                    email_port: null,
                    email_security: null,
                    obligado_contabilidad: null,
                    contador_nombre: null,
                    contador_ruc: null,
                    representante_nombre: null,
                    representante_ruc: null,
                    periodo_inicio: null,
                    periodo_fin: null,
                    logotipo_archivo: null,
                    firma_electronica_archivo: null,
                    firma_electronica_password: null,
                    firma_electronica_expiracion: null,
                    firma_electronica_actualizacion: null,
                    tipo_emision: null,
                    ambiente: null,
                    facturar_negativo: null,
                    moneda_id: null,
                    provincia_id: null,
                    ciudad_id: null,
                    email_facturacion: null,
                    leyenda_facturacion: null
                }, {
                    bag: 'guardar',
                    resetOnSuccess: false,
                }),
                archivos: {
                    foto: null,
                    foto_save: null,
                    foto_edit: false,
                    firma_electronica:null,
                    firma_electronica_save:null,
                    firma_edit: false
                }
            }
        },
        computed: {
            periodos(){
                let year = [];
                for(var i=2021; i>=2000; i--){
                    year.push(i);
                }
                return year;
            }
        },
        filters:{
            fecha(data){
                let fecha = null;
                if(data){
                    fecha = moment(data).format('YYYY-MM-DD');
                }
                return fecha;
            }
        },
        methods: {
            guardar(){
                if (this.archivos.foto_save) {
                    this.form.logotipo_archivo = this.archivos.foto_save;
                }
                if (this.archivos.firma_electronica_save) {
                    this.form.firma_electronica_archivo = this.archivos.firma_electronica_save;
                }
                this.form.post(route('api.empresas.editar', this.form.id), {
                    preserveScroll: true,
                }).then(() => {
                    if(!this.$page.message){if(this.$page.errors){this.validar();return;}}
                    this.$alertify.success(this.$page.message);
                    this.listar_pagina();
                });
            },
            listar_pagina(){
                this.$inertia.visit(route('administrar.empresas.listar'));
            },
            //logotipo
            seleccionarfoto() {
                this.$refs.photo.click();
            },
            actualizarfoto() {
                if(this.$refs.photo.files[0] !== undefined){
                    this.archivos.foto_edit = false;
                    this.archivos.foto_save = this.$refs.photo.files[0];
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.archivos.foto = e.target.result;
                    };
                    reader.readAsDataURL(this.archivos.foto_save);
                }
            },
            borrarfoto(){
                this.archivos.foto_edit = false;
                this.archivos.foto = null;
                this.form.logotipo_archivo = null;
                this.archivos.foto_save=null;
            },
            //firma
            seleccionarfirma() {
                this.$refs.firma.click();
            },
            actualizarfirma() {
                if(this.$refs.firma.files[0] !== undefined){
                    this.archivos.firma_edit = false;
                    this.archivos.firma_electronica_save = this.$refs.firma.files[0];
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        e.preventDefault;
                        if(e.target){
                            this.archivos.firma_electronica = e.target.result;
                        }
                    };
                    reader.readAsDataURL(this.archivos.firma_electronica_save);
                }
            },
            borrarfirma(){
                if(this.$refs.firma)
                    this.archivos.firma_edit = false;
                    this.archivos.firma_electronica = null;
                    this.form.firma_electronica_archivo = null;
                    this.archivos.firma_electronica_save = null;
            },
            validar(){
                let valor = 0;
                $("main").animate({
                    scrollTop: valor,
                }, 250);
            }
        },
        created() {
            this.archivos.foto_edit = true;
            this.archivos.firma_edit = true;
            this.form.id = this.recupera.id;
            this.form.codigo = this.recupera.codigo;
            this.form.periodo = this.recupera.periodo;
            this.form.razon_social = this.recupera.razon_social;
            this.form.razon_comercial = this.recupera.razon_comercial;
            this.form.tipo_identificacion = this.recupera.tipo_identificacion;
            this.form.identificacion = this.recupera.identificacion;
            this.form.direccion = this.recupera.direccion;
            this.form.telefono = this.recupera.telefono;
            this.form.email = this.recupera.email;
            this.form.email_password_confirmation = this.recupera.email_password;
            this.form.email_password = this.recupera.email_password;
            this.form.email_server = this.recupera.email_server;
            this.form.email_port = this.recupera.email_port;
            this.form.email_security = this.recupera.email_security;
            this.form.obligado_contabilidad = this.recupera.obligado_contabilidad;
            this.form.contador_nombre = this.recupera.contador_nombre;
            this.form.contador_ruc = this.recupera.contador_ruc;
            this.form.representante_nombre = this.recupera.representante_nombre;
            this.form.representante_ruc = this.recupera.representante_ruc;
            this.form.periodo_inicio = this.recupera.periodo_inicio;
            this.form.periodo_fin = this.recupera.periodo_fin;
            this.form.logotipo = this.recupera.logotipo;
            this.form.firma_electronica = this.recupera.firma_electronica;
            this.form.firma_electronica_password = this.recupera.firma_electronica_password;
            this.form.firma_electronica_expiracion = this.recupera.firma_electronica_expiracion;
            this.form.firma_electronica_actualizacion = this.recupera.firma_electronica_actualizacion;
            this.form.tipo_emision = this.recupera.tipo_emision;
            this.form.ambiente = this.recupera.ambiente;
            this.form.facturar_negativo = this.recupera.facturar_negativo;
            this.form.moneda_id = this.recupera.moneda_id;
            this.form.provincia_id = this.recupera.provincia_id;
            this.form.ciudad_id = this.recupera.ciudad_id;
            this.form.email_facturacion = this.recupera.email_facturacion;
            this.form.leyenda_facturacion = this.recupera.leyenda_facturacion;
        }
    }
</script>
