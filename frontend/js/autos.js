const sectionCards = document.getElementById('section-cards')
const card = document.getElementById('card').content

const fragment = document.createDocumentFragment()

const formAuto = document.getElementById('form-auto') || null


//Metodos
document.addEventListener('DOMContentLoaded', () => {
    loadAllAutos()
})

const loadAllAutos = () => {
    fetch(`../backend/autos.php?accion=todos`)
        .then((res) => res.json())
        .then((data) => {
            console.log('@@@ data => ', data)
            if(data.autos && data.autos.length > 0){
                pintarAutos(data.autos)
            }
        })
        .catch((err) => {
            console.log('@@@ err => ', err)
        })
}

const pintarAutos = autos => {
    sectionCards.innerHTML = ''
    autos.forEach((auto) => {
        const clone = card.cloneNode(true)

        clone.querySelector('.img-auto').setAttribute('src', auto.url)
        clone.querySelector('.marca').textContent = auto.marca
        clone.querySelector('.modelo').textContent = auto.modelo
        clone.querySelector('.categoria').textContent = auto.categoria
        clone.querySelector('.asientos').textContent = auto.plazas
        clone.querySelector('.puertas').textContent = auto.puertas
        const trans = clone.querySelector('.transmision')
        trans.textContent = auto.transmision === 'manual' ? 'M' : 'A';
        clone.querySelector('.precio').textContent = auto.precio

        clone.querySelector('.btn-elegir').dataset.id = auto.id

        const btnElegir = clone.querySelector('.btn-elegir')
        btnElegir.addEventListener('click', () => {
            console.log('@@ btnElegir => ', btnElegir.dataset.id)
            obtenerAutoPorId(btnElegir.dataset.id)
        })

        fragment.appendChild(clone)
    })
    sectionCards.appendChild(fragment)
}

const obtenerAutoPorId = id => {
    fetch('../backend/autos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}&accion=obtener`
    })

    .then((res) => res.json())
    .then((res) => {
        console.log('@@@ res => ', res)
    })
    .catch((err) => {
        console.log('@@@ err => ', err)
    })
}

const mostrarModal = () => {
    document.getElementById("modal").style.display = "block";
}

const cerrarModal = () => {
    document.getElementById("modal").style.display = "none";
}

if (formAuto) {
    formAuto.addEventListener('submit', (event) => {
      console.log('@@@ submit')
      event.preventDefault()
      const form = new FormData(formAuto)
  
      fetch('../backend/autos.php', {
        method: 'POST',
        body: form
      })
      .then((response) => response.json())
      .then((res) => {
        console.log('@@ res => ', res)
        if (res.message === 'Auto Agregado Satisfactoriamente') {
          window.location.href = '../frontend/autos.html'
        }
      })
      .catch((err) => {
        console.log('@@ err => ', err)
      })
    })
}


