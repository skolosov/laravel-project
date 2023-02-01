import './bootstrap';

import StorageLocationsTable from "./components/StorageLocationsTable.vue";
import StorageLocationCreateForm from "./components/StorageLocationCreateForm.vue";


import './routes';
import { createApp } from "vue";
import Antd from 'ant-design-vue';


window.APP_URI = window.location.origin;

console.log(APP_URI);

const app = createApp({});

app.use(Antd);

app.component('storage-locations-table', StorageLocationsTable);
app.component('storage-locations-create', StorageLocationCreateForm);
app.mount('#app');
