<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Button from '../components/Button.vue';
import Input from '../components/Input.vue';
import Label from '../components/Label.vue';
import Logo from '../components/Logo.vue';
import { useAlert } from '../composables/useAlert';
import Alert from '../components/Alert.vue';

const { alerta } = useAlert();
const email = ref('');
const password = ref('');

async function login(){
  try{
    const response = await axios.post('/login',{
      email: email.value,
      password: password.value
    })

    if(response.data.success == true) {
        return window.location.href = "/dashboard";
    } 

    alerta("Email ou senha inválidos!", "aviso");
  }catch(error){
    alerta("Email ou senha inválidos!", "aviso");
  }
}
</script>

<template>
    <div class="min-h-screen min-w-screen flex items-center justify-center p-15">
        <div class="flex flex-col items-center w-full lg:w-110 ">   
            <Logo></Logo>

            <h1 class="text-5xl font-semibold text-[#0072a8] mb-20 lg:text-2xl lg:mb-10">Entre na sua conta</h1>
            <p class="text-[33px] font-normal text-[#868686] w-full text-start mb-10 lg:text-lg lg:mb-2">
                Faça login para começar a gerenciar pessoas.
            </p>

            <form @submit.prevent="login" class="w-full mt-5">
                <fieldset class="flex flex-col">
                    <Label text="Email">Email</Label>
                    <Input placeholder="Digite seu email" type="email" v-model="email"/>

                    <Label text="Senha" type="password"></Label>
                    <Input placeholder="Digite sua senha" type="password" v-model="password"/>

                    <Button class="mt-10 p-7! lg:p-3! lg:mt-5 lg:text-base!" text="Entrar" type="submit">Entrar</Button>
                </fieldset>
            </form>
        </div>

        <Alert></Alert>
    </div>
</template>


