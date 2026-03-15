import { ref } from "vue";

const showAlert = ref(false);
const alertMessage = ref("");
const type = ref("");

export function useAlert() {

  function alerta(message, messageType) {
    alertMessage.value = message;
    showAlert.value = true;
    type.value = messageType ? messageType : "ok";

    setTimeout(() => {
      showAlert.value = false;
    }, 3000)
  }

  return {
    showAlert,
    alertMessage,
    type,
    alerta
  }
}
