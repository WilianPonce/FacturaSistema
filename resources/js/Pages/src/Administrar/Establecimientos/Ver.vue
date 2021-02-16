<template>
    <app-layout v-model="user">
        <form @submit.prevent="guardar()">
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="serie" value="Serie" />
                            <input-general disabled id="serie" type="text" class="block w-full capitalize" v-model="form.serie" autocomplete="serie" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label-general for="nombre" value="Nombre" />
                            <input-general disabled id="nombre" type="text" class="block w-full capitalize" v-model="form.nombre" autocomplete="nombre" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label-general for="url_web" value="URL Web" />
                            <input-general disabled id="url_web" type="text" class="block w-full" v-model="form.url_web" autocomplete="url_web" />
                        </div>
                        <div class="col-span-6 sm:col-span-5">
                            <label-general for="nombre_comercail" value="Nombre Comercial" />
                            <input-general disabled id="nombre_comercail" type="text" class="block w-full capitalize" v-model="form.nombre_comercial" autocomplete="nombre_comercail" />
                        </div>
                        <div class="col-span-6 sm:col-span-5">
                            <label-general for="direccion" value="Dirección" />
                            <input-general disabled id="direccion" type="text" class="block w-full capitalize" v-model="form.direccion" autocomplete="direccion" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label-general for="estado" value="Estado" />
                            <estado-general disabled v-model="form.estado"/>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6 pb-6 pt-8">
                    <inertia-link :href="route('administrar.establecimientos.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancelar
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
            form: Object
        },
    }
</script>
