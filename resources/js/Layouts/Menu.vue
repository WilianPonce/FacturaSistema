<template>
    <div>
        <nav class="menu mt-6">
            <ul>
                <li>
                    <jet-inertia-link :href="route('dashboard')" :active="route().current('dashboard')">
                        <i class="fa fa-university favics" aria-hidden="true"></i> Inicio
                    </jet-inertia-link>
                </li>
                <li class="submenu" v-if="permisos.administrar.administrar">
                    <jet-inertia-link as="button">
                        <i class="fa fa-users-cog favics"></i> Administrar <i class="fas fa-sort-down ml-2 favics" style="margin-top: -6px;"></i>
                    </jet-inertia-link>
                    <ul class="subul">
                        <li class="cascas" v-if="permisos.administrar.empresas">
                            <jet-inertia-link :href="route('administrar.empresas.listar')" :active="route().current('administrar.empresas.listar')" class="rounded-t" as="submenu">
                                <i class="fa fa-briefcase favics"></i> Empresa
                            </jet-inertia-link>
                        </li>
                        <li class="cascas" v-if="permisos.administrar.establecimientos">
                            <jet-inertia-link :href="route('administrar.establecimientos.listar')" :active="route().current('administrar.establecimientos.listar')" as="submenu">
                                <i class="fa fa-home favics"></i> Establecimientos
                            </jet-inertia-link>
                        </li>
                        <li class="cascas" v-if="permisos.administrar.puntos_emision">
                            <jet-inertia-link :href="route('administrar.puntos_emision.listar')" :active="route().current('administrar.puntos_emision.listar')" as="submenu">
                                <i class="fa fa-house-user favics"></i> Puntos de emision
                            </jet-inertia-link>
                        </li>
                        <li class="cascas" v-if="permisos.administrar.usuarios">
                            <jet-inertia-link :href="route('administrar.usuarios.listar')" :active="route().current('administrar.usuarios.listar')" class="rounded-b" as="submenu">
                                <i class="fa fa-users favics"></i> Usuarios
                            </jet-inertia-link>
                        </li>
                        <li class="cascas" v-if="permisos.administrar.roles">
                            <jet-inertia-link :href="route('administrar.roles.listar')" :active="route().current('administrar.roles.listar')" class="rounded-b" as="submenu">
                                <i class="fa fa-users favics"></i> Roles
                            </jet-inertia-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
    import $ from 'jquery';
    import JetInertiaLink from '@/Jetstream/ResponsiveNavLink';
    export default {
        methods: {
            permisos_lista(){
                this.permisos = {
                    administrar: {
                        administrar:false,
                        empresas: this.can('empresas.listar'),
                        establecimientos: this.can('establecimientos.listar'),
                        puntos_emision: this.can('puntos_emision.listar'),
                        usuarios: this.can('usuarios.listar'),
                        roles: this.can('roles.listar'),
                    }
                };
                this.menus();
            },
            menus(){
                if(/true/i.test(JSON.stringify(this.permisos.administrar)))
                    this.permisos.administrar.administrar = true;
            }
        },
        data() {
            return {
                permisos:{}
            }
        },
        components: {
            JetInertiaLink
        },
        created() {
            setTimeout(() => {
                $(".submenu").find(".active").parents("div li ul").addClass("activo");
            },1);
            this.permisos_lista();
        }
    }
    $(document).on("click", ".submenu", function() {
        //if(!$(this).find(".active").length){
            $(this).children('ul').slideToggle();
        //}
    });
    $(document).on("click", "ul", function(p) {
        p.stopPropagation();
    });
</script>

<style>
    .subul{
        display: none;
    }
    .activo{
        display: block;
    }
</style>

