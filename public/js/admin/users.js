import { URL_BASE_API } from '../utils.js';
const API_USER_ADMIN = URL_BASE_API + '/admin/UserAdminController.php';

document.addEventListener('DOMContentLoaded', () => {
    cargarUsuarios();
    inicializarBuscador();
});

function cargarUsuarios() {
    fetch(API_USER_ADMIN + '?action=getAll')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                llenarTablaUsuarios(data.data);
            }
        })
        .catch(err => console.error(err));
}

function llenarTablaUsuarios(usuarios) {
    const tbody = document.querySelector('.table__content');
    if (!tbody) return;

    if (!usuarios || usuarios.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;">No hay usuarios registrados</td></tr>';
        return;
    }

    tbody.innerHTML = usuarios.map(u => {
        const id = u.id_usuario || u.ID_USUARIO || u.id || u.ID || 'N/A';
        const nombre = u.nombre || u.NOMBRE || '';
        const apellidos = u.apellidos || u.APELLIDOS || '';
        const email = u.email || u.EMAIL || 'N/A';
        const rol = u.rol || u.ROL || 'cliente';
        const estado = (u.estado !== undefined) ? u.estado : (u.ESTADO !== undefined ? u.ESTADO : 1);

        return `
            <tr class="content__row">
                <td class="content__cell">${id}</td>
                <td class="content__cell">${nombre} ${apellidos}</td>
                <td class="content__cell">${email}</td>
                <td class="content__cell">
                    <span style="text-transform: uppercase; font-size: 11px; font-weight: bold; background: #eee; padding: 2px 6px; border-radius: 4px;">
                        ${rol}
                    </span>
                </td>
                <td class="content__cell">
                    <span class="table__estado ${estado == 1 ? 'table__estado--completado' : 'table__estado--inactivo'}">
                        ${estado == 1 ? 'Activo' : 'Inactivo'}
                    </span>
                </td>
                <td class="content__cell">
                    <div class="table__actions">
                        <button class="table__action-btn table__action-btn--editar" onclick="editarUsuario(${id})"><i class="bi bi-pencil-square"></i></button>
                        <button class="table__action-btn table__action-btn--eliminar" onclick="eliminarUsuario(${id})"><i class="bi bi-trash"></i></button>
                    </div>
                </td>
            </tr>
        `;
    }).join('');
}

function inicializarBuscador() {
    const input = document.getElementById('input-buscar-usuario');
    if (!input) return;

    input.addEventListener('input', () => {
        const termino = input.value.toLowerCase();
        const filas = document.querySelectorAll('.table__content .content__row');

        filas.forEach(fila => {
            const texto = fila.textContent.toLowerCase();
            fila.style.display = texto.includes(termino) ? '' : 'none';
        });
    });
}

window.editarUsuario = (id) => {
    alert("Funcionalidad de editar usuario " + id + " en desarrollo");
}

window.eliminarUsuario = (id) => {
    if (confirm("¿Estás seguro de que deseas desactivar este usuario?")) {
        fetch(API_USER_ADMIN, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'updateStatus', id_usuario: id, estado: 0 })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                alert("Usuario desactivado");
                cargarUsuarios();
            }
        });
    }
}
