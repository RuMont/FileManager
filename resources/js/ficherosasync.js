const btn1 = document.querySelector('#btncheck1');
const btn2 = document.querySelector('#btncheck2');
const btn3 = document.querySelector('#btncheck3');

const submit = document.querySelector('#submitbtn');

const token = document.querySelector("#token");

const message = document.querySelector("#message");

submit.addEventListener('click', async (e) => {
    var arr = [];

    btn1.checked && arr.push("ventas");
    btn2.checked && arr.push("clientes");
    btn3.checked && arr.push("proveedores");

    e.preventDefault();

    if (arr.length > 0) {
        const res = await fetch("./files", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token.value
            },
            body: JSON.stringify(arr)
        });

        const response = await res.json();

        if (response) {
            message.innerText = "Los ficheros se han generado con éxito"
        } else {
            message.innerText = "Algo ha fallado en el servidor..."
        }
    } else {
        message.innerText = "Debe de seleccionar al menos un tipo de fichero"
    }
})
