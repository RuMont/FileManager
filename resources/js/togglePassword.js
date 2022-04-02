const btn = document.querySelector('#togglePassword');
const passwordInput = document.querySelector('#password');

btn.addEventListener('mousedown', (e) => {
        passwordInput.type = "text";
})

btn.addEventListener('mouseup', (e) => {
    passwordInput.type = "password";
})