<script setup>
defineProps({
  modelValue: String
});
defineEmits(['update:modelValue']);
</script>

<template>
  <select
    :value="modelValue"
    @change="$emit('update:modelValue', $event.target.value)"
    class="disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed text-black border border-[#3b71a5] block w-full p-5 rounded text-4xl h-20.5 lg:text-base lg:h-10.5 lg:p-1"
  >
    <slot></slot>
  </select>
</template>
