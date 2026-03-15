<script setup>
import { ArrowLeftStartOnRectangleIcon, Bars3Icon } from '@heroicons/vue/16/solid';
import axios from 'axios';

const emit = defineEmits(['toggleMenu'])
const props = defineProps({
    title: String,
});

function toggleMenu(){
  emit('toggleMenu');
}

async function logout() {
  try {
    await axios.post("/logout", {}, { withCredentials: true });
    window.location.href = "/login";
  }catch (e) {
    console.error("Erro ao fazer logout", e);
  }
}
</script>

<template>
    <header class="flex justify-between items-center p-10 border-b-2 border-[#ECECEE] lg:p-7">
        <div @click="toggleMenu" class="lg:hidden">
            <Bars3Icon class="w-19 h-19 text-[#3b71a5]"/>
        </div>
        <div>
            <h1 class="text-[#2a2a2a] text-5xl font-light lg:text-lg lg:font-medium">{{ title }}</h1>
        </div>
        <div @click="logout" class="flex gap-2 items-center cursor-pointer">
            <ArrowLeftStartOnRectangleIcon class="w-18 h-18 text-[#3b71a5] lg:w-8 lg:h-8"></ArrowLeftStartOnRectangleIcon>
            <span class="text-4xl lg:text-base">Sair</span>
        </div>
    </header>
</template>