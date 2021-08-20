<template>
    <app-layout v-model="user">
        <form @submit.prevent="guardar()">
            <div class="shadow sm:rounded-md sm:overflow-hidden" id="shadow">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-12">
                            <label-general for="name" value="nombre del nuevo rol" />
                            <input-general id="name" type="text" class="block w-full capitalize" v-model="form.name" autocomplete="name" />
                            <error-general :message="form.error('name')"/>
                        </div>
                    </div>

                    <div class="divider col-span-12"><span>Permisos</span></div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-6 sm:col-span-4" v-for="(tr, index) in permisos" :key="index">
                            <label :name="tr.name" class="inline-flex mt-3 cursor-pointer">
                                <input :name="tr.name" type="checkbox" :value="tr.id" class="cursor-pointer form-radio h-5 w-5 text-gray-600" v-model="form.permisos">
                                <span class="ml-2 text-gray-700">{{ tr.name }}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6 pb-6 pt-8">
                    <inertia-link :href="route('administrar.roles.listar')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
            permisos: Array
        },
        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'POST',
                    name: null,
                    permisos: []
                }, {
                    resetOnSuccess: false,
                })
            }
        },
        methods: {
            guardar(){
                this.form.post(route('api.roles.crear'), {
                    preserveScroll: false,
                    onSuccess: page => {
                        if (Object.keys(page.props.errors).length === 0) {
                            this.$alertify.success(this.$page.message);
                            this.$inertia.visit(route('administrar.roles.listar'));
                        }
                    },
                });
            }
        }
    }
</script>
