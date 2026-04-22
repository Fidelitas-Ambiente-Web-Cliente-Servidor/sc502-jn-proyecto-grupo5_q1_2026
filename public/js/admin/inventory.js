import { URL_BASE_API } from '../utils.js';
const API_PRODUCT_ADMIN = URL_BASE_API + '/admin/ProductoAdminController.php';

document.addEventListener('DOMContentLoaded', () => {
    const btnAgregar = document.getElementById('btn-agregar-producto');
    const modal = document.getElementById('modal-producto');
    const btnClose = document.getElementById('close-modal');
    const formProducto = document.getElementById('form-producto');
    const msjModal = document.getElementById('mensaje-modal');

    if (btnAgregar && modal) {
        btnAgregar.addEventListener('click', () => {
            modal.style.display = 'block';
        });
    }

    if (btnClose && modal) {
        btnClose.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    if (formProducto) {
        formProducto.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const btnSubmit = document.getElementById('btn-guardar-producto');
            btnSubmit.disabled = true;
            btnSubmit.textContent = "Subiendo imagen y guardando...";
            msjModal.style.display = 'none';

            const formData = new FormData(formProducto);
            formData.append('action', 'add');

            fetch(API_PRODUCT_ADMIN, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                btnSubmit.disabled = false;
                btnSubmit.textContent = "Guardar Producto";

                if (data.status === 'success') {
                    alert(data.message);
                    modal.style.display = 'none';
                    formProducto.reset();
                    // Opcional: Recargar página para ver el nuevo producto
                    window.location.reload();
                } else {
                    msjModal.textContent = data.message;
                    msjModal.style.display = 'block';
                }
            })
            .catch(err => {
                console.error(err);
                btnSubmit.disabled = false;
                btnSubmit.textContent = "Guardar Producto";
                msjModal.textContent = "Error de red o servidor.";
                msjModal.style.display = 'block';
            });
        });
    }

    // Modal de Variantes
    const btnAgregarVariante = document.getElementById('btn-agregar-variante');
    const modalVariante = document.getElementById('modal-variante');
    const btnCloseVariante = document.getElementById('close-modal-variante');
    const formVariante = document.getElementById('form-variante');
    const msjModalVariante = document.getElementById('mensaje-modal-variante');

    if (btnAgregarVariante && modalVariante) {
        btnAgregarVariante.addEventListener('click', () => {
            modalVariante.style.display = 'block';
        });
    }

    if (btnCloseVariante && modalVariante) {
        btnCloseVariante.addEventListener('click', () => {
            modalVariante.style.display = 'none';
        });
    }

    window.addEventListener('click', (e) => {
        if (e.target === modalVariante) {
            modalVariante.style.display = 'none';
        }
    });

    if (formVariante) {
        formVariante.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const btnSubmitVar = document.getElementById('btn-guardar-variante');
            btnSubmitVar.disabled = true;
            btnSubmitVar.textContent = "Guardando...";
            msjModalVariante.style.display = 'none';

            const formData = new FormData(formVariante);
            // Convertir FormData a JSON
            const dataObj = {};
            formData.forEach((value, key) => {
                dataObj[key] = value;
            });
            dataObj.action = 'addVariant';

            fetch(API_PRODUCT_ADMIN, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dataObj)
            })
            .then(res => res.json())
            .then(data => {
                btnSubmitVar.disabled = false;
                btnSubmitVar.textContent = "Guardar Variante";

                if (data.status === 'success') {
                    alert(data.message);
                    modalVariante.style.display = 'none';
                    formVariante.reset();
                    window.location.reload();
                } else {
                    msjModalVariante.textContent = data.message;
                    msjModalVariante.style.display = 'block';
                }
            })
            .catch(err => {
                console.error(err);
                btnSubmitVar.disabled = false;
                btnSubmitVar.textContent = "Guardar Variante";
                msjModalVariante.textContent = "Error de red o servidor.";
                msjModalVariante.style.display = 'block';
            });
        });
    }
});
