import { URL_BASE_API, formateador } from '../utils.js';
const API_ORDER_ADMIN = URL_BASE_API + '/admin/OrderAdminController.php';

document.addEventListener('DOMContentLoaded', () => {
    cargarResumen();
});

function cargarResumen() {
    const tabla = document.getElementById('tabla-resumen-pagos');
    if (!tabla) return;

    fetch(API_ORDER_ADMIN + '?action=getSummary')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                llenarTablaResumen(data.data);
            }
        });
}

function llenarTablaResumen(resumen) {
    const tabla = document.getElementById('tabla-resumen-pagos');
    const estados = ['pendiente', 'en proceso', 'completado', 'cancelado'];

    tabla.innerHTML = resumen.map(r => {
        const currentEstado = (r.estado || 'pendiente').toLowerCase();
        const estadoClase = getEstadoClase(currentEstado);
        
        let selectHtml = `<select class="table__estado ${estadoClase} select-estado-pago" data-id="${r.id_pedido}" style="border:none; cursor:pointer;">`;
        estados.forEach(est => {
            selectHtml += `<option value="${est}" ${currentEstado === est ? 'selected' : ''}>${est.charAt(0).toUpperCase() + est.slice(1)}</option>`;
        });
        selectHtml += `</select>`;

        return `
            <tr class="content__row">
                <td class="content__cell">#${r.id_pedido}</td>
                <td class="content__cell">${r.cliente}</td>
                <td class="content__cell content__cell--fecha">${r.fecha.split(' ')[0]}</td>
                <td class="content__cell">${formateador.format(r.total)}</td>
                <td class="content__cell">${r.metodo_pago || 'N/A'}</td>
                <td class="content__cell">${selectHtml}</td>
            </tr>
        `;
    }).join('');

    document.querySelectorAll('.select-estado-pago').forEach(select => {
        select.addEventListener('change', (e) => {
            const id = e.target.dataset.id;
            const nuevoEstado = e.target.value;
            
            // Actualizar color inmediatamente
            e.target.className = `table__estado ${getEstadoClase(nuevoEstado)} select-estado-pago`;
            
            actualizarEstadoPago(id, nuevoEstado);
        });
    });
}

function getEstadoClase(estado) {
    const map = {
        'pendiente': 'table__estado--pendiente',
        'en proceso': 'table__estado--enproceso',
        'completado': 'table__estado--completado',
        'cancelado': 'table__estado--inactivo'
    };
    return map[estado] || 'table__estado--pendiente';
}

function actualizarEstadoPago(id, estado) {
    fetch(API_ORDER_ADMIN, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'updateStatus', id_pedido: parseInt(id), estado: estado })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            alert("Estado del pago actualizado correctamente");
        } else {
            alert("Error al actualizar el estado: " + data.message);
            cargarResumen();
        }
    });
}
