let url = "http://localhost:8080/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/";
$(function () {
    
    login();
})


function login() {
    let formlogin = $('#form-login');
    const urlBase = "http://localhost:8080/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/controllers/auth/AuthController.php";
    formlogin.on('submit', function (e) {
        e.preventDefault();
        
        let email = $('#input-email');
        let password = $('#input-password');

        $.post(
            urlBase,
            {
                email: email.val(),
                password: password.val(),
                action: 'login'
            },
            function (data) {
                let response = data;
                if (response.code === 200) {
                    window.location.href = url + response.redirect;
                } else {
                    alert(response.message);
                }
            }), "json";
    });
}