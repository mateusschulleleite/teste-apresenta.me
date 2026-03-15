<script setup>
import { onMounted, ref } from 'vue';
import Card from '../components/Card.vue';
import Page from '../components/Page.vue';
import axios from 'axios';

const pessoas = ref([]);
const fisicas = ref([]);
const juridicas = ref([]);

async function getPessoas() {
    try {
        const response = await axios.get('/api/pessoas');
        pessoas.value = response.data;
        fisicas.value = pessoas.value.filter(pessoa => pessoa.tipo == 1);
        juridicas.value = pessoas.value.filter(pessoa => pessoa.tipo == 2);
    } catch (error) {
        console.error('Erro ao buscar pessoas:', error);
    }
}

onMounted(() => {
    getPessoas();
});
</script>

<template>
    <Page title="Dashboard">
        <div class="grid gap-10 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
            <Card :value="pessoas.length" text="Quantidade de pessoas cadastradas no sistema." title="Pessoas">
            </Card>
            <Card :value="fisicas.length" text="Quantidade de pessoas físicas cadastradas no sistema." title="Cpf">
            </Card>
            <Card :value="juridicas.length" text="Quantidade de pessoas jurídicas cadastradas no sistema." title="Cnpj">
            </Card>
        </div>
    </Page>
</template>
