import { URL_BASE_API } from '../utils.js';
const API_CATEGORY_ADMIN = URL_BASE_API + '/admin/CategoryAdminController.php';

document.addEventListener('DOMContentLoaded', () => {
    cargarCategorias();

    const btnAgregar = document.getElementById('btn-agregar-categoria');
    const modal = document.getElementById('modal-categoria');
    const btnClose = document.getElementById('close-modal');
    const formCategoria = document.getElementById('form-categoria');
    const msjModal = document.getElementById('mensaje-modal');

    if (btnAgregar) {
        btnAgregar.onclick = () => {
            modal.style.display = 'block';
        };
    }

    if (btnClose) {
        btnClose.onclick = () => {
            modal.style.display = 'none';
        };
    }

    window.onclick = (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    };

    if (formCategoria) {
        formCategoria.onsubmit = (e) => {
            e.preventDefault();
            const btn = document.getElementById('btn-guardar-categoria');
            btn.disabled = true;
            btn.textContent = "Guardando...";

            const formData = new FormData(formCategoria);
            formData.append('action', 'add');

            fetch(API_CATEGORY_ADMIN, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                btn.disabled = false;
                btn.textContent = "Guardar Categoría";
                if (data.status === 'success') {
                    alert("Categoría creada con éxito");
                    modal.style.display = 'none';
                    formCategoria.reset();
                    cargarCategorias();
                } else {
                    msjModal.textContent = data.message;
                    msjModal.style.display = 'block';
                }
            })
            .catch(err => {
                btn.disabled = false;
                btn.textContent = "Guardar Categoría";
                alert("Error en el servidor");
            });
        };
    }
});

function cargarCategorias() {
    const tbody = document.getElementById('tabla-categorias');
    if (!tbody) return;

    fetch(API_CATEGORY_ADMIN + '?action=list')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                llenarTabla(data.data);
            }
        });
}

function llenarTabla(categorias) {
    const tbody = document.getElementById('tabla-categorias');
    if (!tbody) return;

    tbody.innerHTML = categorias.map(cat => {
        const id = cat.id_categoria || cat.ID_CATEGORIA;
        const nombre = cat.nombre || cat.NOMBRE;
        const descripcion = cat.descripcion || cat.DESCRIPCION || '';
        const estado = cat.estado !== undefined ? cat.estado : cat.ESTADO;

        return `
            <tr class="content__row">
                <td class="content__cell">${id}</td>
                <td class="content__cell">${nombre}</td>
                <td class="content__cell">${descripcion}</td>
                <td class="content__cell">
                    <span class="table__estado ${estado == 1 ? "table__estado--completado" : "table__estado--inactivo"}">
                        ${estado == 1 ? "Activo" : "Inactivo"}
                    </span>
                </td>
                <td class="content__cell">
                    <div class="table__actions">
                        <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
                        <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
                    </div>
                </td>
            </tr>
        `;
    }).join('');
}
