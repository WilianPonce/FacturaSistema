require('./bootstrap');

require('moment');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import Vuesax from 'vuesax';
import 'vuesax/dist/vuesax.css';
import InfiniteLoading from 'vue-infinite-loading';
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs';
import AppLayout from './Layouts/AppLayout';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueAlertify from 'vue-alertify';

import 'vuesax/dist/vuesax.css';

Vue.use(VueAlertify);
Vue.use(VueSweetalert2);
Vue.component("AppLayout", AppLayout);
Vue.use(LaravelPermissionToVueJS);
Vue.use(Vuesax);
Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(InfiniteLoading);

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
