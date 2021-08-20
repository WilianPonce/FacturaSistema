<template>
    <app-layout v-model="user">
        <form @submit.prevent="guardar()">
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="name" value="nombre" />
                            <input-general id="name" type="text" class="block w-full capitalize" v-model="form.name" autocomplete="name" />
                            <error-general :message="form.error('name')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="email" value="Correo electrónico" />
                            <input-general id="email" type="text" class="block w-full" v-model="form.email" autocomplete="email" />
                            <error-general :message="form.error('email')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="telefono" value="Teléfono" />
                            <input-general id="telefono" type="text" class="block w-full" v-model="form.telefono" autocomplete="telefono" />
                            <error-general :message="form.error('telefono')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="celular" value="Celular" />
                            <input-general id="celular" type="text" class="block w-full" v-model="form.celular" autocomplete="celular" />
                            <error-general :message="form.error('celular')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="tipo_sangre" value="Tipo de sangre" />
                            <input-general id="tipo_sangre" type="text" class="block w-full" v-model="form.tipo_sangre" autocomplete="tipo_sangre" />
                            <error-general :message="form.error('tipo_sangre')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="direccion" value="Direccion" />
                            <input-general id="direccion" type="text" class="block w-full capitalize" v-model="form.direccion" autocomplete="direccion" />
                            <error-general :message="form.error('direccion')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="nombre_familiar" value="Nombre de familiar" />
                            <input-general id="nombre_familiar" type="text" class="block w-full capitalize" v-model="form.nombre_familiar" autocomplete="nombre_familiar" />
                            <error-general :message="form.error('nombre_familiar')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="contacto_familiar" value="Contacto de familiar" />
                            <input-general id="contacto_familiar" type="text" class="block w-full" v-model="form.contacto_familiar" autocomplete="contacto_familiar" />
                            <error-general :message="form.error('contacto_familiar')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="password" value="Contraseña" />
                            <input-general id="password" type="password" class="block w-full" v-model="form.password" autocomplete="password" />
                            <error-general :message="form.error('password')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="confirm_password" value="Confirmar contraseña" />
                            <input-general id="confirm_password" type="password" class="block w-full" v-model="form.confirm_password" autocomplete="confirm_password" />
                            <error-general :message="form.error('confirm_password')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="rol" value="Elegir Rol" />
                            <select v-model="form.rol" class="form-input shadow-none rounded-none focus:outline-none borde w-full">
                                <option v-for="tr in roles" :key="tr.id" :value="tr.id">{{tr.name}}</option>
                            </select>
                            <error-general :message="form.error('rol')"/>
                        </div>
                    </div>

                    <!--<div class="divider col-span-12"><span>Permisos</span></div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-4" v-for="(tr, index) in permisos" :key="index">
                            <label :name="tr.name" class="align inline-flex items-center mt-3 cursor-pointer">
                                <input :name="tr.name" type="checkbox" :value="tr.id" class="cursor-pointer form-radio h-5 w-5 text-gray-600" v-model="form.permisos">
                                <span class="ml-2 text-gray-700">{{ tr.name }}</span>
                            </label>
                        </div>
                    </div>-->
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6 pb-6 pt-8">
                    <inertia-link :href="route('administrar.usuarios.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
            user: Object,
            roles: Array
        },
        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'POST',
                    name: null,
                    email: null,
                    telefono: null,
                    celular: null,
                    tipo_sangre: null,
                    direccion: null,
                    nombre_familiar: null,
                    contacto_familiar: null,
                    password: null,
                    confirm_password: null,
                    rol:null,
                }, {
                    resetOnSuccess: false,
                })
            }
        },
        methods: {
            guardar(){
                this.form.post(route('api.usuarios.crear'), {
                    preserveScroll: false,
                    onSuccess: page => {
                        if (Object.keys(page.props.errors).length === 0) {
                            this.$alertify.success(this.$page.message);
                            this.$inertia.visit(route('administrar.usuarios.listar'));
                        }
                    },
                });
            }
        }
    }
</script>
