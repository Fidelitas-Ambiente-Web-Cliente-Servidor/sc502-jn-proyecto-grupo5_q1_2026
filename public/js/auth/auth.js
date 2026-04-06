import { crearCuerpoApi } from '/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/public/js/api.js';
const URLBASE = '/Proyecto/sc502-jn-proyecto-grupo5_q1_2026'
const APICONTROLLER = URLBASE + '/controllers/auth/AuthController.php'



$(function () {
    logout();
    login();
})


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

        fetch(APICONTROLLER,
            {
                method: 'POST',
                headers: {
                    'content-type' : 'application/json'
                },
                body: JSON.stringify(datos)
            }
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
    if (data.status === "success") {
        window.location.href = "index.php"
    } else {
        alert(data.message);
    }
}

/* function logout() */