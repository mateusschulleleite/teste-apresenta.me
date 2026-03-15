<script setup>
const props = defineProps({
    modelValue: String,
});

const emit = defineEmits(["update:modelValue"]);
</script>

<template>
    <input
        :value="modelValue"
        @input="emit('update:modelValue', $event.target.value)"
        class="text-[30px] p-6 rounded border border-[#C4C4C4] mb-10 w-full lg:p-2.5 lg:text-base lg:mb-5"
    />
</template>
