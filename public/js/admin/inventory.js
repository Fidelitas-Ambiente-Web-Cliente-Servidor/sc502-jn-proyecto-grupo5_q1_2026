import { URL_BASE_API } from '../utils.js';
const API_PRODUCT_ADMIN = URL_BASE_API + '/admin/ProductoAdminController.php';

let categoriasGlobal = [];

document.addEventListener('DOMContentLoaded', () => {
    Promise.all([cargarDatosFormulario(), cargarProductos()]).then(() => {
        const btnAgregar = document.getElementById('btn-agregar-producto');
        const modal = document.getElementById('modal-producto');
        const btnClose = document.getElementById('close-modal');
        const formProducto = document.getElementById('form-producto');
        const msjModal = document.getElementById('mensaje-modal');

        if (btnAgregar) btnAgregar.onclick = () => modal.style.display = 'block';
        if (btnClose) btnClose.onclick = () => modal.style.display = 'none';

        const btnAgregarVar = document.getElementById('btn-agregar-variante');
        const modalVar = document.getElementById('modal-variante');
        const btnCloseVar = document.getElementById('close-modal-variante');
        const formVariante = document.getElementById('form-variante');
        const msjModalVar = document.getElementById('mensaje-modal-variante');

        if (btnAgregarVar) btnAgregarVar.onclick = () => modalVar.style.display = 'block';
        if (btnCloseVar) btnCloseVar.onclick = () => modalVar.style.display = 'none';

        const modalVer = document.getElementById('modal-ver-variantes');
        const btnCloseVer = document.getElementById('close-modal-ver');
        if (btnCloseVer) btnCloseVer.onclick = () => modalVer.style.display = 'none';

        window.onclick = (e) => {
            if (e.target === modal) modal.style.display = 'none';
            if (e.target === modalVar) modalVar.style.display = 'none';
            if (e.target === modalVer) modalVer.style.display = 'none';
        };

        if (formProducto) {
            formProducto.onsubmit = (e) => {
                e.preventDefault();
                const btn = document.getElementById('btn-guardar-producto');
                btn.disabled = true;
                btn.textContent = "Guardando...";

                const formData = new FormData(formProducto);
                formData.append('action', 'add');

                fetch(API_PRODUCT_ADMIN, { method: 'POST', body: formData })
                    .then(res => res.json())
                    .then(data => {
                        btn.disabled = false;
                        btn.textContent = "Guardar Producto";
                        if (data.status === 'success') {
                            alert("Producto creado con éxito");
                            modal.style.display = 'none';
                            formProducto.reset();
                            cargarProductos();
                            cargarDatosFormulario();
                        } else {
                            msjModal.textContent = data.message;
                            msjModal.style.display = 'block';
                        }
                    })
                    .catch(err => {
                        btn.disabled = false;
                        btn.textContent = "Guardar Producto";
                        alert("Error en el servidor");
                    });
            };
        }

        if (formVariante) {
            formVariante.onsubmit = (e) => {
                e.preventDefault();
                const btn = document.getElementById('btn-guardar-variante');
                btn.disabled = true;

                const formData = new FormData(formVariante);
                const dataObj = {
                    action: 'addVariant',
                    id_producto: parseInt(formData.get('id_producto')),
                    id_color: parseInt(formData.get('id_color')),
                    id_talla: parseInt(formData.get('id_talla')),
                    stock: parseInt(formData.get('stock'))
                };

                fetch(API_PRODUCT_ADMIN, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(dataObj)
                })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    if (data.status === 'success') {
                        alert("Variante agregada");
                        modalVar.style.display = 'none';
                        formVariante.reset();
                        cargarProductos();
                    } else {
                        alert("Error: " + data.message);
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    alert("Error de conexión al guardar variante");
                });
            };
        }
    });
});

window.verVariantes = (idProducto) => {
    const modal = document.getElementById('modal-ver-variantes');
    const tbody = document.getElementById('lista-variantes-body');
    
    tbody.innerHTML = '<tr><td colspan="4" style="text-align:center;">Cargando...</td></tr>';
    modal.style.display = 'block';

    fetch(API_PRODUCT_ADMIN + '?action=getVariants&id_producto=' + idProducto)
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                if (!data.data || data.data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="4" style="text-align:center;">Este producto no tiene variantes aún</td></tr>';
                    return;
                }
                tbody.innerHTML = data.data.map(v => `
                    <tr class="content__row">
                        <td class="content__cell">${v.color || v.COLOR || 'N/A'}</td>
                        <td class="content__cell">${v.talla || v.TALLA || 'N/A'}</td>
                        <td class="content__cell">${v.stock || v.STOCK || 0}</td>
                        <td class="content__cell">
                            <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                `).join('');
            }
        });
}

function cargarDatosFormulario() {
    return fetch(API_PRODUCT_ADMIN + '?action=getFormData')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const d = data.data;
                categoriasGlobal = d.categorias;
                
                rellenarSelect('id_categoria', d.categorias, 'id_categoria', 'nombre');
                rellenarSelect('var_id_producto', d.productos, 'id_producto', 'nombre_producto');
                rellenarSelect('var_id_color', d.colores, 'id_color', 'color');
                rellenarSelect('var_id_talla', d.tallas, 'id_talla', 'talla');
            }
        });
}

function rellenarSelect(idSelect, datos, valKey, textKey) {
    const select = document.getElementById(idSelect);
    if (!select) return;
    
    let html = `<option value="">Seleccione...</option>`;
    datos.forEach(item => {
        const val = item[valKey] || item[valKey.toUpperCase()];
        const text = item[textKey] || item[textKey.toUpperCase()];
        html += `<option value="${val}">${text}</option>`;
    });
    select.innerHTML = html;
}

function cargarProductos() {
    return fetch(API_PRODUCT_ADMIN + '?action=list')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                llenarTabla(data.data);
            }
        });
}

function llenarTabla(productos) {
    const tbody = document.querySelector('.table__content');
    if (!tbody) return;

    tbody.innerHTML = productos.map(prod => {
        const idCat = prod.id_categoria || prod.ID_CATEGORIA;
        const nombreProd = prod.nombre_producto || prod.NOMBRE_PRODUCTO;
        const stock = prod.cantidad_stock || prod.CANTIDAD_STOCK || 0;
        const estado = prod.estado !== undefined ? prod.estado : prod.ESTADO;

        const nombreCat = prod.nombre_categoria || prod.NOMBRE_CATEGORIA || 'N/A';
        
        return `
            <tr class="content__row">
                <td class="content__cell">${prod.id_producto || prod.ID_PRODUCTO}</td>
                <td class="content__cell">${nombreProd}</td>
                <td class="content__cell">${nombreCat}</td>
                <td class="content__cell">${stock}</td>
                <td class="content__cell">
                    <span class="table__estado ${estado == 1 ? "table__estado--completado" : "table__estado--inactivo"}">
                        ${estado == 1 ? "Activo" : "Inactivo"}
                    </span>
                </td>
                <td class="content__cell">
                    <div class="table__actions">
                        <button class="table__action-btn" style="color: #6f42c1;" onclick="verVariantes(${prod.id_producto || prod.ID_PRODUCTO})" title="Ver Variantes"><i class="bi bi-eye"></i></button>
                        <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
                        <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
                    </div>
                </td>
            </tr>
        `;
    }).join('');
}
