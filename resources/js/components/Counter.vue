<script setup>
    import { ref } from 'vue'

    const count = ref(0)
</script>

<template>
    <div>hello</div>
    {{ count }}

    <button class="btn btn-blue" @click="count++">
        Add
    </button>
</template>

<style>
.btn{
    @apply font-bold py-2 px-4 rounded;
}
.btn-blue{
    @apply bg-blue-500 text-white;
}
.btn-blue:hover {
    @apply bg-blue-700;
  }
</style>
