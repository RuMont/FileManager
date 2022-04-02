const form = document.querySelector('form');
const message = document.querySelector("#message");

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    // Recogemos todos los datos del formulario para enviarlos por ajax
    const data = Object.fromEntries(new FormData(e.target));

    // Petición ajax para comprobar si existe el usuario en la db
    const resp = await fetch('./ajax_auth', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    const isLogged = await resp.text(); // Booleano que nos indica si existe

    if (isLogged === false) {
        message.innerText = "Las credenciales no son válidas";
    } else {
        form.submit();
    }
})