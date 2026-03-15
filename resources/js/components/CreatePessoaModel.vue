<script setup>
import { UserIcon } from "@heroicons/vue/16/solid";
import Modal from "./Modal.vue";
import LabelModel from "./LabelModel.vue";
import InputModel from "./InputModel.vue";
import SelectModel from "./SelectModel.vue";
import Loading from "./Loading.vue";
import { onMounted, ref, watch } from "vue";
import axios from "axios";
import ButtonModel from "./ButtonModel.vue";
import { useAlert } from "../composables/useAlert"

const props = defineProps({
  modo: String,
  pessoa: Object
})

const emit = defineEmits(["close", "update"])
const { alerta } = useAlert();
const titulo = ref("Incluir Pessoa")
const nome = ref("");
const tipo = ref("");
const cpfCnpj = ref("");
const telefone = ref("");
const email = ref("");
const loading = ref(false);

onMounted(() => {
  if(props.modo === "create") {
    return;
  } else if(props.modo == "view") {
    titulo.value = "Visualizar Pessoa";
  } else {
    titulo.value = "Alterar Pessoa";
  }

  nome.value = props.pessoa.nome
  tipo.value = props.pessoa.tipo
  cpfCnpj.value = props.pessoa.cpf_cnpj
  telefone.value = props.pessoa.telefone
  email.value = props.pessoa.email
}) 

async function createPessoa() {
  try {
    loading.value = true;

    const response = await axios.post("/api/pessoas", {
      nome: nome.value,
      tipo: tipo.value,
      cpf_cnpj: cpfCnpj.value,
      telefone: telefone.value,
      email: email.value
    });

    if(response.data.success) {
      alerta("Pessoa incluída com sucesso!");
      emit('update');
      limpaCampos();
    }
  } catch (error) {
      alerta("Erro ao incluir pessoa!");
  } finally {
    loading.value = false;
  }
}

async function updatePessoa() {
  try {
    loading.value = true;

    const response = await axios.put(`/api/pessoas/${props.pessoa.id}`, {
      nome: nome.value,
      tipo: tipo.value,
      cpf_cnpj: cpfCnpj.value,
      telefone: telefone.value,
      email: email.value
    });

    if(response.data.success) {
      emit('update');
      emit('close');
      alerta("Pessoa alterada com sucesso!");
    }
  }catch (error) {
    console.log("Erro ao atualizar pessoa", error);
  }finally {
    loading.value = false;
  }
}

function limpaCampos() {
    nome.value = "";
    tipo.value = "";
    cpfCnpj.value = "";
    telefone.value = "";
    email.value = "";
}
</script>

<template>
  <Modal>
    <div class="flex items-center gap-7 overflow-hidden border-b border-[#3b71a5] lg:gap-4">
      <div class="bg-[#3b71a5] p-2 lg:p-1">
        <UserIcon class="w-20 h-20 text-white lg:w-10 lg:h-10" />
      </div>

      <span class="text-4xl lg:text-lg">{{ titulo }}</span>
    </div>
    
    <div class="p-10 lg:p-5">
      <form @submit.prevent="modo === 'update' ? updatePessoa() : createPessoa()">
        <fieldset>
          <LabelModel>Nome Completo</LabelModel>
          <InputModel
            :disabled="modo === 'view'"
            v-model="nome"
            placeholder="Digite seu nome completo"
          />

          <fieldset class="grid grid-cols-2 gap-6">
            <div>
              <LabelModel>Tipo</LabelModel>

              <SelectModel :disabled="modo === 'view'" v-model="tipo">
                <option value="">Selecione</option>
                <option value="1">Física</option>
                <option value="2">Jurídica</option>
              </SelectModel>
            </div>

            <div>
              <LabelModel>CPF/CNPJ</LabelModel>

              <InputModel
                :disabled="modo === 'view'"
                v-model="cpfCnpj"
                placeholder="Digite seu CPF/CNPJ"
              />
            </div>
          </fieldset>

          <LabelModel>Telefone</LabelModel>
          <InputModel
           :disabled="modo === 'view'"
            v-model="telefone"
            placeholder="Digite seu telefone"
          />

          <LabelModel>Email</LabelModel>
          <InputModel
            :disabled="modo === 'view'"
            v-model="email"
            class="mb-0!"
            placeholder="Digite seu email"
          />
        </fieldset>

        <div class="flex gap-3 mt-6">
          <ButtonModel
           :disabled="modo === 'view'"
            type="submit"
          >
            {{ modo === "update" ? "Alterar" : "Incluir" }}
          </ButtonModel>

          <ButtonModel
            @click="emit('close')"
            type="button"
            class="bg-transparent text-[#3b71a5]!"
          >
            Cancelar
          </ButtonModel>
        </div>
      </form>
    </div>

    <Loading v-if="loading" />
  </Modal>
</template>
