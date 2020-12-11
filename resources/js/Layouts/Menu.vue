<template>
    <div>
        <nav class="menu mt-6">
            <ul>
                <li>
                    <jet-inertia-link :href="route('dashboard')" :active="route().current('dashboard')">
                        <i class="fa fa-university favics" aria-hidden="true"></i> Inicio
                    </jet-inertia-link>
                </li>
                <li class="submenu">
                    <jet-inertia-link as="button"> 
                        <i class="fa fa-users-cog favics"></i> Administrar <i class="fas fa-sort-down ml-2 favics" style="margin-top: -6px;"></i>
                    </jet-inertia-link>
                    <ul>
                        <li class="cascas">
                            <jet-inertia-link :href="route('administrar.empresa.listar')" :active="route().current('administrar.empresa.listar')" class="rounded-t" as="submenu">
                                <i class="fa fa-briefcase favics"></i> Empresa
                            </jet-inertia-link>
                        </li>
                        <li class="cascas">
                            <jet-inertia-link :href="route('administrar.establecimientos.listar')" :active="route().current('administrar.establecimientos.listar')" as="submenu">
                                <i class="fa fa-home favics"></i> Establecimientos
                            </jet-inertia-link>
                        </li>
                        <li class="cascas">
                            <jet-inertia-link :href="route('administrar.puntos-emision.listar')" :active="route().current('administrar.puntos-emision.listar')" as="submenu">
                                <i class="fa fa-house-user favics"></i> Puntos de emision
                            </jet-inertia-link>
                        </li>
                        <li class="cascas">
                            <jet-inertia-link :href="route('administrar.usuarios.listar')" :active="route().current('administrar.usuarios.listar')" class="rounded-b" as="submenu">
                                <i class="fa fa-users favics"></i> Usuarios
                            </jet-inertia-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <jet-inertia-link :href="route('usuarios.visualizar')" :active="route().current('usuarios.visualizar')">
                        <i class="fa fa-users favics" aria-hidden="true"></i> Ejemplos
                    </jet-inertia-link>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
    import $ from 'jquery';
    import JetInertiaLink from '@/Jetstream/ResponsiveNavLink';
    export default {
        components: {
            JetInertiaLink
        },
        created() {
            setTimeout(() => {
                $(".submenu").find(".active").parents("div li ul").addClass("activo");
            },10);
        }
    }

    $(document).on("click", ".submenu", function() {
        if(!$(this).find(".active").length){
            $(this).children('ul').slideToggle();
        }
    });
    $(document).on("click", "ul", function(p) {
        p.stopPropagation();
    });
    
</script>

<style>
    .submenu ul{
        display: none;
    }
    .activo{
        display: block!important;
    }
    /*.cascas:before{
        content: "\B0";
        position: absolute;
        color: #fff;
        margin-top: 15px;
        font-size: 15px;
        left: 10px;
    }*/
    /*.cascas:after{
        content: "";
        position: absolute;
        color: #fff;
        font-size: 20px;
        left: 13.3px;
        border: 0.05px solid;
        width: 1px;
        height: 48px;
        margin-top: -49px;
    }*/
</style>