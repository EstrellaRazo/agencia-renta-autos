const formRenta = document.getElementById('formRenta') || null

if (formRenta) {
    formRenta.addEventListener('submit', (event) => {
      console.log('@@@ submit', event)
      event.preventDefault()
      const form = new FormData(formRenta)
  
      fetch('../backend/renta.php', {
        method: 'POST',
        body: form
      })
      .then((response) => response.json())
      .then((res) => {
        console.log('@@ res => ', res)

        if (res.message === 'renta Agregada Satisfactoriamente') {
          console.log("Renta agregada");
        }
      })
      .catch((err) => {
        console.log('@@ err => ', err)
      })
    })
}
