<script setup></script>

<template>
    <div class="absolute w-full h-full top-0 left-0 bg-[#00000054] flex items-center justify-center flex-col z-3">
        <div class="loader"></div>
    </div>
</template>

<style>
    .loader {
        display: flex;
        justify-content: center;
        align-items: center;
        top: 0;
        left: 0;
        width: 100px;
        height: 100px;
    }

    .loader::after {
        content: "";
        width: 100px;
        height: 100px;
        border: 10px solid #dddddd;
        border-top-color: #3b71a5;
        border-radius: 50%;
        animation: loading 0.75s ease-out infinite;
    }

    @media (min-width: 1024px) {
        .loader::after {
            width: 70px;
            height: 70px;
            border: 8px solid #dddddd;
            border-top-color: #3b71a5;
        }
    }

    @keyframes loading {
        from {
            transform: rotate(0turn);
        }

        to {
            transform: rotate(1turn);
        }
    }
</style>