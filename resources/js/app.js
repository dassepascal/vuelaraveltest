import './bootstrap';
import { createApp } from 'vue';
import BurgerMenu from './components/BurgerMenu.vue';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});
// app.component('burger-menu', BurgerMenu);


app.mount('#app');
