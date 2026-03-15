<script setup>
defineProps({
    value: Number,
    text: String,
    title: String
})
</script>

<template>
    <div class="w-full bg-white p-10 rounded-[50px] grid grid-cols-[230px_auto] items-center lg:grid-cols-[100px_auto] lg:p-5">
        <div class="col-span-1 text-center">
            <span class="font-bold text-[120px] block w-full text-[#3b71a5] lg:text-5xl">{{ value }}</span>
        </div>
        <div class="text-left">
            <h3 class="text-black text-5xl font-bold mb-7 lg:text-base lg:mb-2">{{ title }}</h3>
            <p class="text-4xl text-[#797979] lg:text-sm">{{ text }}</p>
        </div>
    </div>
</template>