import { createApp } from 'vue';

import { createVuetify } from 'vuetify'; // Importe o createVuetify
import '@fortawesome/fontawesome-free/css/all.css';
import DataTableComponent  from './components/DataTableComponent.vue';
//import 'vuetify/dist/vuetify.min.css'; // Importe os estilos do Vuetify
//import 'material-design-icons-iconfont/dist/material-design-icons.css'; // Importe os ícones do Material Design

import './bootstrap';


//import PrimeVue from 'primevue/config';
//import Button from "primevue/button"
//import ColorPicker from 'primevue/colorpicker';
const app = createApp({});
/*app.use(PrimeVue, {
    unstyled: true
});
*/
//app.component('data-table-component', DataTableComponent);
//app.mount('#deulanceboard');