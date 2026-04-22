import { URL_BASE_API, formateador } from '../utils.js';
const API_DASHBOARD = URL_BASE_API + '/admin/DashboardController.php';

document.addEventListener('DOMContentLoaded', () => {
    cargarEstadisticas();
});

function cargarEstadisticas() {
    fetch(API_DASHBOARD + '?action=getStats')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                actualizarTarjetas(data.data.stats);
                actualizarTablaRecientes(data.data.recent_orders);
            }
        })
        .catch(err => console.error("Error al cargar dashboard:", err));
}

function actualizarTarjetas(stats) {
    // Total Ventas
    const cardVentas = document.getElementById('ventas-total');
    if (cardVentas) cardVentas.textContent = formateador.format(stats.total_ventas);

    // Total Pedidos
    const cardPedidos = document.getElementById('pedidos-total');
    if (cardPedidos) cardPedidos.textContent = stats.total_pedidos;

    // Usuarios
    const cardUsuarios = document.getElementById('usuarios-total');
    if (cardUsuarios) cardUsuarios.textContent = stats.total_usuarios;

    // Productos
    const cardProductos = document.getElementById('productos-total');
    if (cardProductos) cardProductos.textContent = stats.total_productos;
}

function actualizarTablaRecientes(pedidos) {
    const tbody = document.querySelector('.table__content');
    if (!tbody) return;

    if (pedidos.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" style="text-align:center;">No hay pedidos recientes</td></tr>';
        return;
    }

    tbody.innerHTML = pedidos.map(pedido => {
        const estadoClaseMap = {
            'pendiente': 'table__estado--pendiente',
            'enproceso': 'table__estado--enproceso',
            'completado': 'table__estado--completado',
            'cancelado': 'table__estado--inactivo'
        };
        const estadoClase = estadoClaseMap[pedido.estado] || 'table__estado--pendiente';
        const fecha = pedido.fecha ? pedido.fecha.split(' ')[0] : 'N/A';

        return `
            <tr class="content__row">
                <td class="content__cell">#${pedido.id_pedido}</td>
                <td class="content__cell">${pedido.cliente || 'Sin nombre'}</td>
                <td class="content__cell content__cell--fecha">${fecha}</td>
                <td class="content__cell">${formateador.format(pedido.total)}</td>
                <td class="content__cell">
                    <span class="table__estado ${estadoClase}">${pedido.estado}</span>
                </td>
            </tr>
        `;
    }).join('');
}
