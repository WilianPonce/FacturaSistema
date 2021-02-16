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
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="nombre" value="Nombre" />
                            <input-general id="nombre" type="text" class="block w-full capitalize" v-model="form.nombre" autocomplete="nombre" />
                            <error-general :message="form.error('nombre')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="url_web" value="URL Web" />
                            <input-general id="url_web" type="text" class="block w-full" v-model="form.url_web" autocomplete="url_web" />
                            <error-general :message="form.error('url_web')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-5">
                            <label-general for="nombre_comercail" value="Nombre Comercial" />
                            <input-general id="nombre_comercail" type="text" class="block w-full capitalize" v-model="form.nombre_comercial" autocomplete="nombre_comercail" />
                            <error-general :message="form.error('nombre_comercail')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-5">
                            <label-general for="direccion" value="Dirección" />
                            <input-general id="direccion" type="text" class="block w-full capitalize" v-model="form.direccion" autocomplete="direccion" />
                            <error-general :message="form.error('direccion')"/>
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="estado" value="Estado" />
                            <estado-general v-model="form.estado"/>
                            <error-general :message="form.error('estado')"/>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6 pb-6 pt-8">
                    <inertia-link :href="route('administrar.establecimientos.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
            response: Object
        },
        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'PUT',
                    id: null,
                    nombre: null,
                    serie: null,
                    url_web: null,
                    nombre_comercial: null,
                    direccion: null,
                    estado: true,
                }, {
                    resetOnSuccess: false,
                }),
            }
        },
        methods: {
            guardar(){
                this.form.post(route('api.establecimientos.editar', this.form.id), {
                    preserveScroll: false,
                    onSuccess: page => {
                        if (Object.keys(page.props.errors).length === 0) {
                            this.$alertify.success(this.$page.message);
                            this.$inertia.visit(route('administrar.establecimientos.listar'));
                        }
                    },
                });
            }
        },
        created(){
            this.form.id = this.response.id;
            this.form.nombre = this.response.nombre;
            this.form.serie = this.response.serie;
            this.form.url_web = this.response.url_web;
            this.form.nombre_comercial = this.response.nombre_comercial;
            this.form.direccion = this.response.direccion;
            this.form.estado = this.response.estado;
        }
    }
</script>
