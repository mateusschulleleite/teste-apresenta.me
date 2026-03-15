<script setup>
import { UserGroupIcon, XMarkIcon } from "@heroicons/vue/16/solid";
import { HomeIcon, UserIcon } from "@heroicons/vue/16/solid";
import Logo from "./Logo.vue";

const props = defineProps({
    aberto: Boolean,
});
const emit = defineEmits(['toggleMenu']);

function toggleMenu(){
  emit('toggleMenu')
}
</script>

<template>
    <aside
        :class="[
            'absolute w-[70vw] min-h-screen bg-white p-20 top-0 transition-all z-2 border-[#ECECEE] lg:row-span-2 lg:relative lg:left-0 lg:w-full lg:border-r-2 lg:p-8',
            aberto ? 'left-0' : 'left-[-100%]',
        ]"
    >
        <div @click="toggleMenu" class="absolute right-[-119px] bg-white lg:hidden">
            <XMarkIcon class="w-30 h-30 text-[#3b71a5]"></XMarkIcon>
        </div>

        <Logo></Logo>

        <nav>
            <ul>
                <li>
                    <a href="/dashboard" class="flex items-center gap-3 py-4 lg:py-3">
                        <div>
                            <HomeIcon
                                class="w-22 h-22 text-[#3b71a5] lg:w-8 lg:h-8"
                            ></HomeIcon>
                        </div>
                        <span class="text-5xl font-light lg:text-lg">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/pessoas" class="flex items-center gap-3 py-4 lg:py-3">
                        <div>
                            <UserGroupIcon
                                class="w-22 h-22 text-[#3b71a5] lg:w-8 lg:h-8"
                            ></UserGroupIcon>
                        </div>
                        <span class="text-5xl font-light lg:text-lg">Pessoas</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
</template>
