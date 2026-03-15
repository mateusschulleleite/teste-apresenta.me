<script setup>
defineProps({
  modelValue: String
})

defineEmits(['update:modelValue'])
</script>

<template>
  <input  
    required
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    class="disabled:bg-gray-100 disabled:text-gray-600 disabled:cursor-not-allowed border border-[#3b71a5] block w-full p-5 rounded text-4xl mb-10 placeholder:text-3xl placeholder:font-light lg:p-2 lg:text-base lg:mb-5 lg:placeholder:text-base"
  />
</template>
