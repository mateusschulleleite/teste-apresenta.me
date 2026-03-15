<script setup></script>

<template>
    <div class="absolute top-0 left-0 bg-[#00000034] w-full h-full flex items-center justify-center z-1">
        <div class="w-[90%] bg-white rounded grid grid-rows-[auto_1fr] relative lg:w-150 lg:grid-rows-[auto_1fr]">
            <slot></slot>
        </div>
    </div>
</template>