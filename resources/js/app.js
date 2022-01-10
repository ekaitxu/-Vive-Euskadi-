require('./bootstrap');

import Vue from 'vue'

// importar componente
import SobreNosotros from './components/SobreNosotros.vue';
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

// crear instancia vue
Vue.component('sobre-nosotros', require('./components/SobreNosotros.vue').default);
Vue.component('comp-admin', require('./components/adminComp.vue').default);

// creating a vue instance
const app = new Vue({
    el: '#app'
});