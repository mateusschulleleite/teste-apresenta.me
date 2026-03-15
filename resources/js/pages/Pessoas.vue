<script setup>
import { onMounted, ref } from "vue";
import Aside from "../components/Aside.vue";
import Header from "../components/Header.vue";
import Main from "../components/Main.vue";
import Button from "../components/Button.vue";
import {
    EyeIcon,
    PencilIcon,
    PlusIcon,
    TrashIcon,
} from "@heroicons/vue/16/solid";
import CreatePessoaModel from "../components/CreatePessoaModel.vue";
import axios from "axios";
import Alert from "../components/Alert.vue";
import Popup from "../components/Popup.vue";
import Loading from "../components/Loading.vue";
import { useAlert } from "../composables/useAlert";
import Page from "../components/Page.vue";

const modal = ref(false);
const pessoaSelecionada = ref(null);
const modo = ref("create");
const pessoas = ref([]);
const popup = ref(false);
const loading = ref(false);
const { alerta } = useAlert()



async function getPessoas() {
  const response = await axios.get("/api/pessoas");
  pessoas.value = response.data;
}

onMounted(() => {
  getPessoas();
});

function viewPessoa(pessoa) {
    modal.value = true;
    pessoaSelecionada.value = pessoa;
    modo.value = "view";
}

function updatePessoa(pessoa) {
    modal.value = true;
    pessoaSelecionada.value = pessoa;
    modo.value = "update";
}

function deletePessoaPopup(pessoa) {
    pessoaSelecionada.value = pessoa;
    popup.value = true;
}

async function deletePessoa() {
  try {
    loading.value = true;
    const response = await axios.delete(`/api/pessoas/${pessoaSelecionada.value.id}`);

    if(response.data.success) {
      alerta("Pessoa excluída com sucesso");
      getPessoas();
    }
  }catch (error) {
    console.log("Erro ao excluir", error);
  }finally {
    popup.value = false;
    loading.value = false;
  }
}

</script>

<template>
    <Page title="Pessoas">
        <div class="h-full flex flex-col overflow-hidden">
            <div class="flex mb-10 lg:mb-5">
                <Button @click="modal = true; modo = 'create'" class="flex items-center px-6 py-4 lg:px-2 lg:py-2">
                    <div>
                        <PlusIcon class="w-12 h-12 lg:w-5 lg:h-5"></PlusIcon>
                    </div>
                    <span class="lg:text-base">Adicionar</span>
                </Button>
            </div>

            <div class="flex-1 p-10 bg-white lg:p-5 overflow-y-scroll">
                <table class="table-fixed w-full">
                    <thead class="text-[#718EBF] border-b-2 border-[#E6EFF5] w-full">
                        <tr class="grid grid-cols-8">
                            <th class="text-left p-4 text-4xl font-medium col-span-1 lg:text-base">
                                ID  
                            </th>  
                            <th class="text-left p-4 text-4xl font-medium col-span-3 lg:text-base">
                                Nome  
                            </th>  
                            <th class="text-left p-4 text-4xl font-medium col-span-2 lg:text-base">
                                Email  
                            </th>  
                            <th class="text-right p-4 text-4xl font-medium col-span-2 lg:text-base">
                                Ações
                            </th>
                        </tr>
                    </thead>

                    <tbody>   
                        <tr v-for="pessoa in pessoas" :key="pessoa.id" class="border-b-2 border-[#E6EFF5] grid grid-cols-8">
                            <td class="truncate py-9 px-4 text-4xl col-span-1 lg:text-base lg:py-3 lg:px-4">{{ pessoa.id }}</td>
                            <td class="truncate py-9 px-4 text-4xl col-span-3 lg:text-base lg:py-3 lg:px-4">{{ pessoa.nome }}</td>
                            <td class="truncate py-9 px-4 text-4xl col-span-2 lg:text-base lg:py-3 lg:px-4">{{ pessoa.email }}</td>
                            <td class="truncate py-9 px-4 text-4xl flex items-center justify-end col-span-2 lg:text-base lg:py-3 lg:px-4">
                                <div>
                                    <PencilIcon
                                        @click="updatePessoa(pessoa)"
                                        class="w-12 h-12 text-[#3b71a5] cursor-pointer lg:w-6 lg:h-6"
                                    ></PencilIcon>
                                </div>
                                <div>
                                    <EyeIcon
                                        @click="viewPessoa(pessoa)"
                                        class="w-12 h-12 text-[#3b71a5] cursor-pointer lg:w-6 lg:h-6"
                                    ></EyeIcon>
                                </div>
                                <div>
                                    <TrashIcon @click="deletePessoaPopup(pessoa)"
                                        class="w-12 h-12 text-[#F00] cursor-pointer lg:w-6 lg:h-6"
                                    ></TrashIcon>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <CreatePessoaModel v-if="modal" @close="modal = false" @update="getPessoas()" :modo="modo" :pessoa="pessoaSelecionada"></CreatePessoaModel>
        <Alert></Alert>
        <Popup v-if="popup" @close="popup = false" @delete="deletePessoa()"></Popup>
        <Loading v-if="loading"></Loading>
    </Page>


</template>
