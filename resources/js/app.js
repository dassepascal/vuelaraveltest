import './bootstrap';
import { createApp } from 'vue';
import Counter from './components/Counter.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});

app.component('counter', Counter);
app.mount('#app');
