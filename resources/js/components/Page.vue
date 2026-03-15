<script setup>
import { ref } from 'vue';
import Aside from './Aside.vue';
import Header from './Header.vue';
import Main from './Main.vue';

defineProps({
    title: String
})

const menuAberto = ref(false);

function toggleMenu() {
    menuAberto.value = !menuAberto.value;
}

</script>
<template>
    <div class="page min-h-screen max-h-screen grid grid-rows-[auto_1fr] lg:grid-cols-[300px_auto] lg:grid-rows-[auto_1fr]">
        <Aside @toggleMenu="toggleMenu" :aberto="menuAberto"></Aside>
        <Header @toggleMenu="toggleMenu" :title="title"></Header>
        <Main>
            <slot></slot>
        </Main>
    </div>
</template>