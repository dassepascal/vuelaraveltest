import './bootstrap';
import { createApp } from 'vue';
import AddToCart from './components/AddToCart.vue';
import NavbarCart from './components/NavbarCart.vue';


import Alpine from 'alpinejs';
import Toaster from '@meforma/vue-toaster';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});

app.use(Toaster).provide('toast', app.config.globalProperties.$toast);

app.component('add-to-cart', AddToCart);
app.component('navbar-cart',NavbarCart);


app.mount('#app');
