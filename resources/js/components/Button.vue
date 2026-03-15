<script setup>
defineProps({
    text: String
})
</script>
<template>
    <button class="bg-[#3b71a5] text-4xl rounded text-white p-8 cursor-pointer font-semibold sm:p-6 sm:text-3xl lg:text-sm lg:p-2"><slot></slot></button>
</template>