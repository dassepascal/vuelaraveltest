
<template >
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Produits</th>
                            <th class="lg:text-right text-left pl-5 lg:pl-0">
                                <span class="lg:hidden" title="Quantité">Qtd</span>
                                <span class="hidden lg:inline">Quantité</span>
                            </th>
                            <th class="hidden text-right md:table-cell">Prix unitaire</th>
                            <th class="text-right">Prix total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="product in products" v-bind:key="product.id">

                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="">
                                        <img :src="product.associatedModel.image" class="w-20 rounded" alt="Thumbnail" />
                                    </a>
                                </td>
                                <td>
                                    <a href=""></a>
                                    <p class="mb-2 md:ml-4" v-text="product.name"></p>
                                    <form action="" method="POST">
                                        <button v-on:click.prevent="destroy(product.id)" class="text-gray-700 md:ml-4">
                                            <small>(Supprimer le produit)</small>
                                        </button>
                                    </form>
                                </td>
                                <td class="justify-center md:justify-end md:flex mt-6">
                                    <div class="relative flex flex-row w-full h-8 space-x-3x">
                                        <button v-on:click.prevent="decrease(product.id)">
                                            -</button>
                                        <input readonly :value="product.quantity"
                                            class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black mx-3" />
                                        <button v-on:click.prevent="increase(product.id)">
                                            +</button>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <span class="text-sm lg:text-base font-medium"
                                        v-text="formatPrice(product.price)"></span>
                                </td>
                                <td class="text-right">
                                    <span class="text-sm lg:text-base font-medium"
                                        v-text="formatPrice(product.price * product.quantity)"></span>
                                </td>
                            </tr>
                        </template>

                    </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <div class="p-4 bg-gray-100 rounded-full">
                    <h1 class="ml-2 font-bold uppercase">Order Details</h1>
                </div>
                <div class="p-4">
                    <div class="flex justify-between pt-4 border-b">
                        <div class="lg:px-4 jg:py-2 m-2 lg:text-lg font-bold text-center text-gray-800">
                            Total
                        </div>
                        <div class="lg:px-4 jg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                            {{ cartTotal }}
                        </div>
                    </div>
                    <a href="/checkout">
                        <button
                            class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                            <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                            </svg>
                            <span class="ml-2 mt-5px">Passer à la caisse</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup >
import { onMounted, computed } from 'vue';
import useProduct from '../composables/products/index.js';
import { formatPrice } from '../helpers';
import useEventBus from '../eventBus.js';
const { emit } = useEventBus();
const {
    products,
    getProducts,
    increaseQuantity,
    decreaseQuantity,
    destroyProduct,
    cartCount
} = useProduct();//rendu de la fonction useProduct

const cartTotal = computed(() => {
    let price = Object.values(products.value).reduce((acc, product) => acc += product.price * product.quantity, 0);
    return formatPrice(price)
})


const increase = async (id) => {
    await increaseQuantity(id);
    await getProducts();
    emit('cartCountUpdated', cartCount.value)
}


const decrease = async (id) => {
    await decreaseQuantity(id);
    await getProducts();
    emit('cartCountUpdated', cartCount.value)
}


const destroy = async (id) => {
    await destroyProduct(id);
    await getProducts();
    emit('cartCountUpdated', cartCount.value)
}

onMounted(async () => {
    await getProducts();

})


</script>
