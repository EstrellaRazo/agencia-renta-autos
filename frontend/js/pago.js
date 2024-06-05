// Variables globales para almacenar los datos del archivo JSON
let url, marca, modelo, fechaRenta, fechaDev, costo;

//Cargamos elementos
const imagenPago = document.getElementById('img-auto-pago');
const marcaPago = document.getElementById('pago-marca');
const modeloPago = document.getElementById('pago-modelo');
const fechaRentaPago = document.getElementById('pago-fecha-renta');
const fechaDevPago = document.getElementById('pago-fecha-devolucion');
const costoPago = document.getElementById('pago-costo')

//form de pago
const formPago = document.getElementById('formPago') || null

document.addEventListener('DOMContentLoaded', () => {
    archivoJson()
})

const archivoJson = () => {
    var url = '../backend/auto.json';
    // Usar fetch para obtener el archivo JSON
    fetch(url)
    .then(response => response.json()) // Convertir la respuesta a JSON
    .then(data => {
        // Almacenar los datos en una variable
        url = data.url
        marca = data.marca
        modelo = data.modelo
        precio = data.precio

        // Utilizar los datos como desees
        console.log('URL:', url);
        rentaJson()
    })
    .catch(error => console.error('Error al cargar el archivo JSON:', error));
}

const rentaJson = () => {
    var url = '../backend/renta.json';
    // Usar fetch para obtener el archivo JSON
    fetch(url)
    .then(response => response.json()) // Convertir la respuesta a JSON
    .then(data => {
        // Almacenar los datos en una variable
        fechaRenta = data.fechaRenta
        fechaDev = data.fechaDev
        costo = data.costo

        cambiarTexto()
    })
    .catch(error => console.error('Error al cargar el archivo JSON:', error));
}

function cambiarTexto() {
    imagenPago.setAttribute('src', url)
    marcaPago.textContent = marca
    modeloPago.textContent = modelo
    costoPago.textContent = costo
    fechaRentaPago.textContent = fechaRenta
    fechaDevPago.textContent = fechaDev
}

if (formPago) {
    formPago.addEventListener('submit', (event) => {
      console.log('@@@ submit')
      event.preventDefault()
      const form = new FormData(formPago)
  
      fetch('../backend/pago.php', {
        method: 'POST',
        body: form
      })
      .then((response) => response.json())
      .then((res) => {
        console.log('@@ res => ', res)
        if (res.message === 'Pago Agregado Satisfactoriamente') {
          window.location.href = '../frontend/index.html'
          alert('Tu pago se realizó corectamente. \n¡Disfruta tu viaje!')
        }
      })
      .catch((err) => {
        console.log('@@ err => ', err)
      })
    })
}