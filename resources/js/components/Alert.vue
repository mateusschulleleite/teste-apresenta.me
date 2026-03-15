<script setup>
import { useAlert } from "../composables/useAlert";

const { showAlert, alertMessage, type } = useAlert();
</script>

<template>
  <div
    v-if="showAlert"
    :class="[
      'fixed bottom-10 right-5 text-white px-8 py-6 rounded shadow-lg z-3 text-4xl lg:text-base lg:py-3 lg:bottom-5',
      type === 'ok' ? 'bg-green-500' : 'bg-yellow-500'
    ]"
  >
    {{ alertMessage }}
  </div>
</template>