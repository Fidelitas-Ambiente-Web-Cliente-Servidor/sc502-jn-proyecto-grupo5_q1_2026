
import { crearCuerpoApi } from '/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/public/js/utils.js';
export const URLBASE = "/Proyecto/sc502-jn-proyecto-grupo5_q1_2026";
export const APICONTROLLER = URLBASE + '/controllers/auth/AuthController.php'
export const DISPLAY_INLINE_BLOCK = "inline-block";
export const DISPLAY_NONE = "none";



/* $(function () {
    
    logout();
    login();
    register();
}) */


function login() {
    let formlogin = $('#form-login');
    formlogin.on('submit', function (e) {
        e.preventDefault();
        let email = $('#input-email');
        let password = $('#input-password');
        const datos = {
            action: 'login',
            user: email.val(),
            password: password.val()
        };
        fetch(APICONTROLLER,crearCuerpoApi("POST",datos)
        ).then(response => response.json())
            .then(data => {
                validarRespuestaLogin(data);
        })
    });
}

function logout() {
    let btnLogout = $('#btn-logout');
    btnLogout.on('click', function (e) {
        e.preventDefault();
        fetch(`${ APICONTROLLER }?action=logout`, crearCuerpoApi("GET", null))
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    window.location.href = 'index.php'
                } 
            })
    })
} 

function validarRespuestaLogin(data) {
    if (data.status !== "success") return generarMensajeError(DISPLAY_INLINE_BLOCK, data.message);
    window.location.href = "index.php";
}

function register() {
    let formRegister = $('#form-register');
    formRegister.on('submit', function (e) {
        e.preventDefault();
        let inputName = $('#input-name');
        let inputLastName = $('#input-last_name');
        let inputEmail = $('#input-email');
        let inputPassword = $('#input-password');
        let inputConfirmPassword = $('#input-confirm-password');
        if ((inputPassword.val() !== inputConfirmPassword.val())) return generarMensajeError(DISPLAY_INLINE_BLOCK, "Las contaseñas no coinciden");
        generarMensajeError(DISPLAY_NONE, "");    

        const datos = {
            action: "register",
            nombre: inputName.val(),
            apellidos: inputLastName.val(),
            email: inputEmail.val(),
            password: inputConfirmPassword.val()
        }

        fetch(APICONTROLLER, crearCuerpoApi("POST", datos))
            .then(response => response.json())
            .then(data =>  {
                console.log(data);
                if (data.status === "error") return generarMensajeError(DISPLAY_INLINE_BLOCK, data.message);
                window.location.href = "index.php?page=login"
        } )
        
    })
}

function generarMensajeError(display, $menssajeError) {
    let spanError = $('#login-message-error');
    spanError.text("");
    spanError.css('display', display)
    spanError.text($menssajeError);
}