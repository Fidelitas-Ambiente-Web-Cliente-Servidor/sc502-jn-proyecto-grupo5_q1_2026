import { crearCuerpoApi } from '../app.js';
const API_ORDER = '/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/controllers/OrderController.php';

$(function () {
    $('#btn-place-order').on('click', function (e) {
        e.preventDefault();

        const nombre = $('#input-name').val();
        const email = $('#input-email').val();
        const direccion = $('#input-address').val();
        const provincia = $('#input-provincia').val();

        if (!nombre || !email || !direccion) {
            alert("Por favor, complete todos los campos obligatorios.");
            return;
        }

        const datos = {
            action: 'placeOrder',
            nombre: nombre,
            email: email,
            direccion: `${provincia}, ${direccion}`
        };


        fetch(API_ORDER, crearCuerpoApi("POST", datos))
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    alert("¡Pedido realizado con éxito! Gracias por su compra.");
                    window.location.href = "index.php";
                } else {
                    alert("Error al procesar el pedido: " + data.message);
                }
            })
            .catch(err => console.error("Error:", err));
    });
});