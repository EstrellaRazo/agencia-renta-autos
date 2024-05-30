const loginForm = document.getElementById('loginForm') || null
const registrarForm = document.getElementById('registrarForm') || null
//const btnSignUp = document.getElementById('signUp') || null

if (loginForm) {
  loginForm.addEventListener('submit', (event) => {
    console.log('@@@ submit')
    event.preventDefault()
    const form = new FormData(loginForm)

    fetch('../backend/index.php', {
      method: 'POST',
      body: form
    })
    .then((response) => response.json())
    .then((res) => {
      console.log('@@ res => ', res)
      if (res.message === 'Inicio Satisfactorio') {
        window.location.href = '../frontend/index.html'
      }
    })
    .catch((err) => {
      console.log('@@ error => ', err)
    })
  })
}

if (registrarForm) {
    registrarForm.addEventListener('submit', (event) => {
      console.log('@@@ submit')
      event.preventDefault()
      const form = new FormData(registrarForm)
  
      fetch('../backend/index.php', {
        method: 'POST',
        body: form
      })
      .then((response) => response.json())
      .then((res) => {
        console.log('@@ res => ', res)
        if (res.message === 'Usuario Registrado Satisfactoriamente') {
          window.location.href = '../frontend/inicio-sesion.html'
        }
      })
      .catch((err) => {
        console.log('@@ err => ', err)
      })
    })
  }