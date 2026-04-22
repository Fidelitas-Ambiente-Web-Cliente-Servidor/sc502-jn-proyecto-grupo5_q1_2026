
import { crearCuerpoApi } from '/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/public/js/utils.js';
export const URLBASE = "/Proyecto/sc502-jn-proyecto-grupo5_q1_2026";
export const APICONTROLLER = URLBASE + '/app/controllers/auth/AuthController.php'
export const DISPLAY_INLINE_BLOCK = "inline-block";
export const DISPLAY_NONE = "none";



document.addEventListener('DOMContentLoaded', () => {
    login();
    logout();
    register();
});

function login() {
    let formlogin = document.getElementById('form-login');
    if (!formlogin) return;
    formlogin.addEventListener('submit', function (e) {
        e.preventDefault();
        let email = document.getElementById('input-email');
        let password = document.getElementById('input-password');
        const datos = {
            action: 'login',
            user: email.value,
            password: password.value
        };
        fetch(APICONTROLLER, crearCuerpoApi("POST", datos))
            .then(response => response.json())
            .then(data => {
                console.log(data);
                validarRespuestaLogin(data);
            });
    });
}

function logout() {
    let btnLogout = document.getElementById('btn-logout');
    if (!btnLogout) return;
    btnLogout.addEventListener('click', function (e) {
        e.preventDefault();
        fetch(`${APICONTROLLER}?action=logout`, crearCuerpoApi("GET", null))
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    window.location.href = 'index.php';
                } 
            });
    });
} 

function validarRespuestaLogin(data) {
    if (data.status !== "success") return generarMensajeError(DISPLAY_INLINE_BLOCK, data.message);
    const rol = (data.data?.rol ?? 'cliente').toLowerCase();
    if (rol === 'administrador' || rol === 'admin') {
        window.location.href = URLBASE + "/index.php?page=dashboard";
    } else if (rol === 'vendedor') {
        window.location.href = URLBASE + "/index.php?page=seller-inventory";
    } else {
        window.location.href = URLBASE + "/index.php?page=home";
    }
}

function register() {
    let formRegister = document.getElementById('form-register');
    if (!formRegister) return;
    formRegister.addEventListener('submit', function (e) {
        e.preventDefault();
        let inputName = document.getElementById('input-name');
        let inputLastName = document.getElementById('input-last_name');
        let inputEmail = document.getElementById('input-email');
        let inputPassword = document.getElementById('input-password');
        let inputConfirmPassword = document.getElementById('input-confirm-password');
        if ((inputPassword.value !== inputConfirmPassword.value)) return generarMensajeError(DISPLAY_INLINE_BLOCK, "Las contaseñas no coinciden");
        generarMensajeError(DISPLAY_NONE, "");    

        const datos = {
            action: "register",
            nombre: inputName.value,
            apellidos: inputLastName.value,
            email: inputEmail.value,
            password: inputConfirmPassword.value
        };

        fetch(APICONTROLLER, crearCuerpoApi("POST", datos))
            .then(response => response.json())
            .then(data =>  {
                if (data.status === "error") return generarMensajeError(DISPLAY_INLINE_BLOCK, data.message);
                window.location.href = "index.php?page=login";
            });
    });
}

function generarMensajeError(display, menssajeError) {
    let spanError = document.getElementById('login-message-error');
    if (!spanError) return;
    spanError.textContent = "";
    spanError.style.display = display;
    spanError.textContent = menssajeError;
}