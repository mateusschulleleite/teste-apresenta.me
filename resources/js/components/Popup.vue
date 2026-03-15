<script setup>
import Button from './Button.vue';
const emit = defineEmits(["close", "delete"])

</script>

<template>
    <div class="absolute w-full h-full top-0 left-0 z-1 flex items-center justify-center bg-[#0000002a]">
        <div class="bg-white w-[90%] p-10 lg:max-w-125 lg:p-7">
            <span class="text-5xl font-semibold block mb-7 lg:text-lg lg:mb-1">Confirmar exclusão?</span>
            <span class="text-4xl font-light block leading-12 lg:text-base lg:leading-5">Tem certeza que deseja excluir esta pessoa? <br>Essa ação não poderá ser desfeita.</span>
            <div class="flex gap-4 mt-12 lg:mt-6 lg:gap-2">
                <Button @click="emit('delete')">
                    Confirmar
                </Button>
                <Button @click="emit('close')" class="bg-transparent border border-[#3b71a5] text-[#3b71a5]!">
                    Cancelar
                </Button>
            </div>
        </div>
    </div>
</template>