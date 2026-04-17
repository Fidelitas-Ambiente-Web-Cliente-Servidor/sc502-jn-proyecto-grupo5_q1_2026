import * as UTILS from '/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/public/js/app.js';

const API_CART = UTILS.URLBASE + '/controllers/clients/CartController.php';

$(function () {

    actualizarContadorUI();


    $(document).on('click', '.product-card__btn', function (e) {
        e.preventDefault();

        const idBtn      = $(this).attr('id');
        const idProducto = idBtn.match(/\d+/)[0];
        const $btn       = $(this);

        $btn.prop('disabled', true);

        fetch(API_CART, UTILS.crearCuerpoApi('POST', {
            action:      'add',
            id_producto: idProducto
        }))
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                actualizarContadorUI();
                mostrarFeedback($btn, 'success', data.message);
            } else {
                mostrarFeedback($btn, 'error', data.message);
            }
        })
        .catch(() => mostrarFeedback($btn, 'error', 'Error de conexión'));
    });


    $(document).on('click', '.btn-plus', function () {
        const id = $(this).closest('tr').data('id');
        fetch(API_CART, UTILS.crearCuerpoApi('POST', {
            action:      'increase',
            id_producto: id
        }))
        .then(res => res.json())
        .then(data => { if (data.status === 'success') location.reload(); });
    });


    $(document).on('click', '.btn-minus', function () {
        const id = $(this).closest('tr').data('id');
        fetch(API_CART, UTILS.crearCuerpoApi('POST', {
            action:      'decrease',
            id_producto: id
        }))
        .then(res => res.json())
        .then(data => { if (data.status === 'success') location.reload(); });
    });


    $(document).on('click', '.btn-remove', function () {
        const id = $(this).closest('tr').data('id');
        fetch(API_CART, UTILS.crearCuerpoApi('POST', {
            action:      'remove',
            id_producto: id
        }))
        .then(res => res.json())
        .then(data => { if (data.status === 'success') location.reload(); });
    });

});


function actualizarContadorUI() {
    fetch(`${API_CART}?action=getCount`)
        .then(res => res.json())
        .then(data => {
            const $badge = $('#cart-count');
            if (data.count > 0) {
                $badge.text(data.count).show();
            } else {
                $badge.hide();
            }
        });
}

function mostrarFeedback($btn, tipo, mensaje) {
    const textoOriginal = '<i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO';

    if (tipo === 'success') {
        $btn.html('<i class="bi bi-check-lg"></i> ' + mensaje);
    } else {
        $btn.html('<i class="bi bi-x-lg"></i> ERROR');
    }

    setTimeout(() => {
        $btn.html(textoOriginal).prop('disabled', false);
    }, 1500);
}