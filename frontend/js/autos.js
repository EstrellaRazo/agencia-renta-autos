const sectionCards = document.getElementById('section-cards')
const card = document.getElementById('card').content

const fragment = document.createDocumentFragment()


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
        clone.querySelector('.asientos').textContent = auto.asientos
        clone.querySelector('.puertas').textContent = auto.puertas
        const trans = clone.querySelector('.transmision')
        if (auto.transmision === 'manual') {
            trans.textContent = 'M';
        } else if (auto.transmision === 'automatica') {
            trans.textContent = 'A';
        }
        clone.querySelector('.precio').textContent = auto.precio

        const btnPago = clone.querySelector('.btnPago')
        btnPago.addEventListener('click', () => {
            window.location.href = `../frontend/pagar.html?id=${btnPago.dataset.id}`
        })

        fragment.appendChild(clone)
    })
    sectionCards.appendChild(fragment)
}

/*const pintarUsuarios = usuarios => {
    usuariosBody.innerHTML = ''
    usuarios.forEach((user) => {
        const clone = rowUsuarios.cloneNode(true)

        clone.querySelectorAll('td')[0].textContent = user.id
        clone.querySelectorAll('td')[1].textContent = user.nombre
        clone.querySelectorAll('td')[2].textContent = user.apaterno
        clone.querySelectorAll('td')[3].textContent = user.amaterno
        clone.querySelectorAll('td')[4].textContent = user.direccion
        clone.querySelectorAll('td')[5].textContent = user.telefono
        clone.querySelectorAll('td')[6].textContent = user.correo
        clone.querySelectorAll('td')[7].textContent = user.usuario
        
        clone.querySelector('.btn-danger').dataset.id = user.id
        clone.querySelector('.btn-warning').dataset.id = user.id

        const btnBorrar = clone.querySelector('.btn-danger')
        btnBorrar.addEventListener('click', () => {
            console.log('@@ btnBorrar => ', btnBorrar.dataset.id)
            borrarUsuario(btnBorrar.dataset.id)
        })
        
        const btnActualizar = clone.querySelector('.btn-warning')
        btnActualizar.addEventListener('click', () => {
            window.location.href = `../frontend/actualizar.html?id=${btnActualizar.dataset.id}`
        })

        fragment.appendChild(clone)
    })
    usuariosBody.appendChild(fragment)
}*/