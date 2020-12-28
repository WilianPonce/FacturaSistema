<template>
    <app-layout>
        <form @submit.prevent="guardar(form)">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="codigo" value="Código" />
                            <input-general id="codigo" type="text" class="block w-full" v-model="form.codigo" autocomplete="codigo" />
                            <error-general :message="$page.errors.codigo" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="periodo" value="Periodo" />
                            <vs-select id="periodo" filter v-model="form.periodo" class="estiloselect w-full">
                                <vs-option v-for="tr in periodos" :key="tr" :label="tr" :value="tr">
                                    {{tr}}
                                </vs-option>
                            </vs-select>
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
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="tipo_identificacion" value="Tipo Identificación" />
                            <vs-select id="tipo_identificacion" filter v-model="form.tipo_identificacion" class="w-full estiloselect">
                                <vs-option label="Ruc" value="1">RUC</vs-option>
                                <vs-option label="Cédula" value="2">Cédula</vs-option>
                                <vs-option label="Pasaporte" value="3">Pasaporte</vs-option>
                            </vs-select>
                            <error-general :message="$page.errors.tipo_identificacion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="identificacion" value="Identificación" />
                            <input-general id="identificacion" type="text" class="block w-full" v-model="form.identificacion" autocomplete="identificacion" />
                            <error-general :message="$page.errors.identificacion" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="telefono" value="Teléfono" />
                            <input-general id="telefono" type="text" class="block w-full" v-model="form.telefono" autocomplete="telefono" />
                            <error-general :message="$page.errors.telefono" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="direccion" value="Dirección" />
                            <input-general id="direccion" type="text" class="block w-full" v-model="form.direccion" autocomplete="direccion" />
                            <error-general :message="$page.errors.direccion" class="mt-2" />
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
                            <label-general for="email_repassword" value="Repetir Contraseña" />
                            <input-general id="email_repassword" type="password" class="block w-full" v-model="form.email_repassword" autocomplete="email_repassword" />
                            <error-general :message="$page.errors.email_repassword" class="mt-2" />
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
                            <vs-select id="tipo_emision" filter v-model="form.tipo_emision" class="w-full estiloselect">
                                <vs-option label="Emision Normal" value="1">Emision Normal</vs-option>
                            </vs-select>
                            <error-general :message="$page.errors.tipo_emision" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="ambiente" value="Tipo de ambiente" />
                            <vs-select id="ambiente" filter v-model="form.ambiente" class="w-full estiloselect">
                                <vs-option label="Producción" value="1">Producción</vs-option>
                                <vs-option label="Pruebas" value="2">Pruebas</vs-option>
                            </vs-select>
                            <error-general :message="$page.errors.ambiente" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
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
    import InputGeneral from '@/Components/Input';
    import ErrorGeneral from '@/Components/InputError';
    import LabelGeneral from '@/Components/Label';

    export default {
        components: {
            InputGeneral,
            ErrorGeneral,
            LabelGeneral
        },
        data() {
            return {
                form:{
                    id:null,
                    codigo: null,
                    periodo: 2021,
                    razon_social: null,
                    razon_comercial: null,
                    tipo_identificacion:1,
                    identificacion: null,
                    direccion: null,
                    telefono: null,
                    email: null,
                    email_repassword: null,
                    email_password: null,
                    email_server: null,
                    email_port: null,
                    email_security: 1,
                    obligado_contabilidad: null,
                    contador_nombre: null,
                    contador_ruc: null,
                    representante_nombre: null,
                    representante_ruc: null,
                    periodo_inicio: null,
                    periodo_fin: null,
                    tipo_cuentas: null,
                    logotipo: null,
                    firma_electronica: null,
                    firma_electronica_password: null,
                    firma_electronica_expiracion: null,
                    firma_electronica_actualizacion: null,
                    tipo_emision: 1,
                    ambiente: 1,
                    facturar_negativo: null,
                    moneda_id: null,
                    provincia_id: null,
                    ciudad_id: null,
                    email_facturacion: null,
                    leyenda_facturacion: null,
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
        methods: {
            guardar(form){
                this.$inertia.post(route('api.empresas.crear'), form, {
                    onSuccess: () => {
                        if(this.$page.errors){return;}
                        this.$alertify.success(this.$page.message);
                    }
                });
            }
        },
    }
</script>
