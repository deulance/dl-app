//import { createApp } from 'vue';
/*
import { createVuetify } from 'vuetify'; // Importe o createVuetify
import '@fortawesome/fontawesome-free/css/all.css';
//import DataTableComponent  from './components/DataTable.vue';
//import 'vuetify/dist/vuetify.min.css'; // Importe os estilos do Vuetify
//import 'material-design-icons-iconfont/dist/material-design-icons.css'; // Importe os ícones do Material Design

import './bootstrap';


//import PrimeVue from 'primevue/config';
//import Button from "primevue/button"
//import ColorPicker from 'primevue/colorpicker';
//const app = createApp({});
import Vue from 'vue';
import DataTable from './components/DataTable.vue';

Vue.component('data-table', DataTable);

const app = new Vue({
    el: '#app',
});*/
import { createApp } from 'vue';
import DataTable from './components/DataTable.vue';

const app = createApp({});

app.component('data-table', DataTable);

app.mount('#deulance');
/*app.use(PrimeVue, {
    unstyled: true
});
*/
//app.component('data-table-component', DataTableComponent);
//app.mount('#deulanceboard');