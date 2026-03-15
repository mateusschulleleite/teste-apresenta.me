import { ref } from "vue"

const showAlert = ref(false)
const alertMessage = ref("")

export function useAlert() {

  function alerta(message) {
    alertMessage.value = message
    showAlert.value = true

    setTimeout(() => {
      showAlert.value = false
    }, 3000)
  }

  return {
    showAlert,
    alertMessage,
    alerta
  }
}
