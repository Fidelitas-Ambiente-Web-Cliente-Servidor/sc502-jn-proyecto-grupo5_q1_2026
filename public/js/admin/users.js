import { URL_BASE_API } from '../utils.js';
const API_USER_ADMIN = URL_BASE_API + '/admin/UserAdminController.php';

document.addEventListener('DOMContentLoaded', () => {
    cargarUsuarios();
    inicializarBusqueda();
});

function cargarUsuarios() {
    const tabla = document.getElementById('tabla-usuarios');
    fetch(API_USER_ADMIN + '?action=getAll')
        .then(res => res.json())
        .then(data => {
            if (data.status !== 'success') {
                tabla.innerHTML = '<tr><td colspan="5" style="text-align:center;">Error al cargar usuarios</td></tr>';
                return;
            }
            if (data.data.length === 0) {
                tabla.innerHTML = '<tr><td colspan="5" style="text-align:center;">No hay usuarios registrados</td></tr>';
                return;
            }
            tabla.innerHTML = data.data.map(usuario => crearFilaUsuario(usuario)).join('');
            asignarEventosFilas();
        })
        .catch(() => {
            tabla.innerHTML = '<tr><td colspan="5" style="text-align:center;">Error de conexión</td></tr>';
        });
}

function crearFilaUsuario(usuario) {
    const estadoTexto = usuario.estado == 1 ? 'Activo' : 'Inactivo';
    const estadoClase = usuario.estado == 1 ? 'table__estado--completado' : 'table__estado--inactivo';
    const rolClase = 'table__rol--' + (usuario.rol || 'cliente').toLowerCase();

    return `
        <tr class="content__row" data-id="${usuario.id_usuario}" data-estado="${usuario.estado}">
            <td class="content__cell">${usuario.nombre} ${usuario.apellidos}</td>
            <td class="content__cell">${usuario.email}</td>
            <td class="content__cell">
                <select class="select-rol" data-id="${usuario.id_usuario}" style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc;">
                    <option value="cliente" ${usuario.rol === 'cliente' ? 'selected' : ''}>Cliente</option>
                    <option value="admin" ${usuario.rol === 'admin' ? 'selected' : ''}>Administrador</option>
                    <option value="vendedor" ${usuario.rol === 'vendedor' ? 'selected' : ''}>Vendedor</option>
                </select>
            </td>
            <td class="content__cell">
                <span class="table__estado ${estadoClase}">${estadoTexto}</span>
            </td>
            <td class="content__cell">
                <div class="table__actions">
                    <button class="table__action-btn table__action-btn--editar btn-toggle-estado"
                        data-id="${usuario.id_usuario}"
                        data-estado="${usuario.estado}"
                        title="${usuario.estado == 1 ? 'Desactivar' : 'Activar'}">
                        <i class="bi bi-${usuario.estado == 1 ? 'toggle-on' : 'toggle-off'}"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
}

function asignarEventosFilas() {
    document.querySelectorAll('.select-rol').forEach(select => {
        select.addEventListener('change', function () {
            const idUsuario = this.dataset.id;
            const nuevoRol = this.value;
            fetch(API_USER_ADMIN, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'updateRole', id_usuario: parseInt(idUsuario), rol: nuevoRol })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status !== 'success') alert('Error al actualizar el rol');
            })
            .catch(() => alert('Error de conexión'));
        });
    });

    document.querySelectorAll('.btn-toggle-estado').forEach(btn => {
        btn.addEventListener('click', function () {
            const idUsuario = this.dataset.id;
            const estadoActual = parseInt(this.dataset.estado);
            const nuevoEstado = estadoActual === 1 ? 0 : 1;

            fetch(API_USER_ADMIN, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'updateStatus', id_usuario: parseInt(idUsuario), estado: nuevoEstado })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    cargarUsuarios();
                } else {
                    alert('Error al actualizar el estado');
                }
            })
            .catch(() => alert('Error de conexión'));
        });
    });
}

function inicializarBusqueda() {
    const inputBusqueda = document.querySelector('.table__search-input');
    if (!inputBusqueda) return;

    inputBusqueda.addEventListener('input', function () {
        const termino = this.value.toLowerCase();
        const filas = document.querySelectorAll('#tabla-usuarios .content__row');
        filas.forEach(fila => {
            const texto = fila.textContent.toLowerCase();
            fila.style.display = texto.includes(termino) ? '' : 'none';
        });
    });
}
