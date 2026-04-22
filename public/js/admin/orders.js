import { URL_BASE_API, formateador } from '../utils.js';
const API_ORDER_ADMIN = URL_BASE_API + '/admin/OrderAdminController.php';

document.addEventListener('DOMContentLoaded', () => {
    cargarPedidos();
    inicializarFiltros();
});

function cargarPedidos() {
    const tabla = document.getElementById('tabla-pedidos');
    if (!tabla) return;

    fetch(API_ORDER_ADMIN + '?action=getAll')
        .then(res => res.json())
        .then(data => {
            if (data.status !== 'success') {
                tabla.innerHTML = '<tr><td colspan="6" style="text-align:center;">Error al cargar pedidos: ' + data.message + '</td></tr>';
                return;
            }
            if (!data.data || data.data.length === 0) {
                tabla.innerHTML = '<tr><td colspan="6" style="text-align:center;">No hay pedidos registrados</td></tr>';
                return;
            }
            tabla.innerHTML = data.data.map(pedido => crearFilaPedido(pedido)).join('');
            asignarEventosFilas();
        })
        .catch(err => {
            console.error(err);
            tabla.innerHTML = '<tr><td colspan="6" style="text-align:center;">Error de conexión</td></tr>';
        });
}

function crearFilaPedido(p) {
    const id = p.id_pedido || p.ID_PEDIDO || 'N/A';
    const cliente = p.cliente || p.CLIENTE || 'Sin nombre';
    const fechaCompleta = p.fecha || p.FECHA || '';
    const fecha = fechaCompleta.split(' ')[0] || 'N/A';
    const total = p.total || p.TOTAL || 0;
    const estado = (p.estado || p.ESTADO || 'pendiente').toLowerCase();

    const estadoClaseMap = {
        'pendiente': 'table__estado--pendiente',
        'enproceso': 'table__estado--enproceso',
        'completado': 'table__estado--completado',
        'cancelado': 'table__estado--inactivo'
    };
    const estadoClase = estadoClaseMap[estado] || 'table__estado--pendiente';
    const totalFormateado = formateador.format(total);

    return `
        <tr class="content__row" data-id="${id}" data-estado="${estado}">
            <td class="content__cell">#${id}</td>
            <td class="content__cell">${cliente}</td>
            <td class="content__cell">${fecha}</td>
            <td class="content__cell">${totalFormateado}</td>
            <td class="content__cell">
                <span class="table__estado ${estadoClase}">${estado}</span>
            </td>
            <td class="content__cell">
                <select class="select-estado-pedido" data-id="${id}" style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc;">
                    <option value="pendiente" ${estado === 'pendiente' ? 'selected' : ''}>Pendiente</option>
                    <option value="enproceso" ${estado === 'enproceso' ? 'selected' : ''}>En proceso</option>
                    <option value="completado" ${estado === 'completado' ? 'selected' : ''}>Completado</option>
                    <option value="cancelado" ${estado === 'cancelado' ? 'selected' : ''}>Cancelado</option>
                </select>
            </td>
        </tr>
    `;
}

function asignarEventosFilas() {
    document.querySelectorAll('.select-estado-pedido').forEach(select => {
        select.addEventListener('change', function () {
            const idPedido = this.dataset.id;
            const nuevoEstado = this.value;

            fetch(API_ORDER_ADMIN, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'updateStatus', id_pedido: parseInt(idPedido), estado: nuevoEstado })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    cargarPedidos();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(() => alert('Error de conexión'));
        });
    });
}

function inicializarFiltros() {
    const inputBusqueda = document.getElementById('input-buscar-pedido');
    const selectEstado = document.getElementById('input-filtro-estado');

    function filtrar() {
        const termino = inputBusqueda ? inputBusqueda.value.toLowerCase() : '';
        const estadoFiltro = selectEstado ? selectEstado.value : '';
        const filas = document.querySelectorAll('#tabla-pedidos .content__row');

        filas.forEach(fila => {
            const texto = fila.textContent.toLowerCase();
            const estadoFila = fila.dataset.estado;
            const coincideTexto = texto.includes(termino);
            const coincideEstado = !estadoFiltro || estadoFila === estadoFiltro;
            fila.style.display = (coincideTexto && coincideEstado) ? '' : 'none';
        });
    }

    if (inputBusqueda) inputBusqueda.addEventListener('input', filtrar);
    if (selectEstado) selectEstado.addEventListener('change', filtrar);
}
