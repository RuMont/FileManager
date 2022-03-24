const btn1 = document.querySelector('#btncheck1');
const btn2 = document.querySelector('#btncheck2');
const btn3 = document.querySelector('#btncheck3');
const date1 = document.querySelector('#date1');
const date2 = document.querySelector('#date2');
const message = document.querySelector("#message");
const submit = document.querySelector('#submitbtn');
const token = document.querySelector("#token");


// Click en generar ficheros
submit.addEventListener('click', async (e) => {
    e.preventDefault();

    // Si un checkbox es pulsado, la propiedad correspondiente se pone true
    var object = {
        ventas: btn1.checked && true,
        clientes: btn2.checked && true,
        proveedores: btn3.checked && true
    };

    // Si no están puestas las fechas, sale del listener
    if (!date1.value || !date2.value) {
        message.innerText = 'Seleccione las fechas antes de generar los ficheros';
        return;
    }

    if (object) {
        // Por cada propiedad en true de object se genera un archivo
        for (const [key, value] of Object.entries(object)) {
            if (value) {
                // A la ruta se accede con autenticación, por lo que hay que pasarle el csrf_token()
                const resp = await fetch("./dashboard/files", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token.value,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        date1: date1.value,
                        date2: date2.value,
                        fichero: key
                    })
                });

                // Si el servidor da respuesta se genera el archivo
                if (resp) {
                    message.innerText = "Los ficheros se han generado con éxito";
                    const blob = await resp.blob();
                    await download(blob, key + '.txt', "text/plain");
                } else {
                    message.innerText = "Algo ha fallado en el servidor...";
                }
            }
        }
    } else {
        message.innerText = "Debe de seleccionar al menos un tipo de fichero";
    }
})
