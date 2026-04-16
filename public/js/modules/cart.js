import * as UTILS from '../app.js';
const API_CART = UTILS.URLBASE + '/controllers/clients/CartController.php'

$(function () {
    actualizarContadorUI();

    $(document).on('click', '.product-card__btn', function (e) {
        e.preventDefault();
        const idBtn = $(this).attr('id');
        const idProducto = idBtn.match(/\d+/)[0]; 

        const datos = {
            action: 'add',
            id_producto: idProducto
        };

        fetch(API_CART, UTILS.crearCuerpoApi("POST", datos))
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    actualizarContadorUI(); 
                    alert(data.message);
                }
            });
    });

    $(document).on('click', '.btn-plus, .btn-minus', function () {
        const row = $(this).closest('tr');
        const id = row.data('id');
        const action = $(this).hasClass('btn-plus') ? 'increase' : 'decrease';

        const datos = { action, id_producto: id };

        fetch(API_CART, crearCuerpoApi("POST", datos))
            .then(res => res.json())
            .then(data => {
                if(data.status === "success") location.reload(); 
            });
    });

    $(document).on('click', '.btn-remove', function () {
        const row = $(this).closest('tr');
        const id = row.data('id');

        if(confirm("¿Seguro que deseas eliminar este producto?")) {
            const datos = { action: 'remove', id_producto: id };
            fetch(API_CART, crearCuerpoApi("POST", datos))
                .then(res => res.json())
                .then(data => {
                    if(data.status === "success") location.reload();
                });
        }
    });

    $(document).on('click', '.btn-plus, .btn-minus', function () {
    const row = $(this).closest('tr');
    const id = row.data('id');
    const action = $(this).hasClass('btn-plus') ? 'increase' : 'decrease';

    fetch(API_CART, crearCuerpoApi("POST", { action, id_producto: id }))
        .then(res => res.json())
        .then(data => { if(data.status === "success") location.reload(); });
});

$(document).on('click', '.btn-remove', function () {
    const row = $(this).closest('tr');
    const id = row.data('id');

    fetch(API_CART, crearCuerpoApi("POST", { action: 'remove', id_producto: id }))
        .then(res => res.json())
        .then(data => { if(data.status === "success") location.reload(); });
});
});

function actualizarContadorUI() {
    fetch(`${API_CART}?action=getCount`)
        .then(res => res.json())
        .then(data => {
            const badge = $('#cart-count');
            if (data.count > 0) {
                badge.text(data.count).show(); 
            } else {
                badge.hide(); 
            }
        });
}