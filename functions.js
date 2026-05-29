const btnlogin = document.getElementById('btn-login');
const btnregister = document.getElementById('btn-register');
const loginDiv = document.getElementById('nome_login');
const registerDiv = document.getElementById('nome_register');

btnlogin.addEventListener('click', () => {
    loginDiv.hidden = false;
    registerDiv.hidden = true;
});

btnregister.addEventListener('click', () => {
    loginDiv.hidden = true;
    registerDiv.hidden = false;
});