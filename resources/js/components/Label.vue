<script setup>
defineProps({
    text: String,
});
</script>

<template>
    <label class="text-3xl font-semibold mb-2 lg:text-base">{{ text }}</label>
</template>
