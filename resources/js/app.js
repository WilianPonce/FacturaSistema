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
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueAlertify from 'vue-alertify';
import vSelect from 'vue-select';
import InputGeneral from './Components/Simples/Input';
import LabelGeneral from './Components/Simples/Label';
import ErrorGeneral from './Components/Simples/InputError';
import EstadoGeneral from './Components/Simples/Estado';
import SelectGeneral from './Components/Simples/Select';
import RadioGeneral from './Components/Simples/Radio';
import AppLayout from './Layouts/AppLayout';
import TablaSimpleGeneral from './Components/Compuestos/TablaSimple';

import 'vuesax/dist/vuesax.css';
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect);
Vue.component('InputGeneral', InputGeneral);
Vue.component('LabelGeneral', LabelGeneral);
Vue.component('ErrorGeneral', ErrorGeneral);
Vue.component('EstadoGeneral', EstadoGeneral);
Vue.component('SelectGeneral', SelectGeneral);
Vue.component('RadioGeneral', RadioGeneral);
Vue.component('AppLayout', AppLayout);
Vue.component('TablaSimpleGeneral', TablaSimpleGeneral);

Vue.use(VueAlertify);
Vue.use(VueSweetalert2);
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
