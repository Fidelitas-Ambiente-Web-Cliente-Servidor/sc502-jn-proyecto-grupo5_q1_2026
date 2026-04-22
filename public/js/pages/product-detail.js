import * as UTILS from "../utils.js";
const URL_API = UTILS.URL_BASE_API + "/clients/ProductoController.php";

const obtenerDetalleProducto = (id) => {
  return fetch(`${URL_API}?id=${id}`)
    .then((response) => response.json())
      .then((datos) => {
          const { status, code, message, url, data: producto } = datos;
          if (code == 404) return alert(message);
          llenarDatos(producto);
          orquestadorEventos(producto.cantidad_stock, producto);
    })
    .catch((error) => alert("Error al traer los datos" + error));
};

const orquestadorEventos = (totalStock, producto) => {
    let contenedorPadre = document.querySelector(".product-detail");
    contenedorPadre.addEventListener('click', (evento) => {
        const target = evento.target;

        switch (true) {
            case target.classList.contains('product-detail__talla-btn'):
            case target.classList.contains('product-detail__color-btn'):
                activarFocus(target);
                break;
            
            case target.classList.contains('product-detail__cantidad-btn'):
                controlBtnCantidad(target, totalStock);
                break;
            
            case !!target.closest('.product-detail__btn-carrito'):
                const tallaSeleccionada = document.querySelector('.product-detail__talla-btn.seleccionado')?.dataset.talla;
                const colorSeleccionado = document.querySelector('.product-detail__color-btn.seleccionado')?.dataset.color;
                
                if (!tallaSeleccionada || !colorSeleccionado) {
                    return alert("Debes seleccionar una talla y un color antes de agregar al carrito.");
                }

                UTILS.verificarSesionActiva().then(sesionActiva => {
                    if (!sesionActiva) {
                        alert("Debes iniciar sesión para añadir productos al carrito.");
                        window.location.href = "?page=login";
                        return;
                    }

                    const detallesSeleccionados = {
                        'talla': tallaSeleccionada,
                        'color': colorSeleccionado,
                        'cantidad': document.querySelector('#cantidad-valor').textContent
                    };

                    document.querySelectorAll('.seleccionado').forEach(el => el.classList.remove('seleccionado'));
                    UTILS.agregarAlCarrito(producto, detallesSeleccionados);
                });
                break;
        }
    });
}

const llenarDatos = (producto) => {
    let contenedorPadre = document.querySelector(".product-detail");
    contenedorPadre.dataset.id = producto.id_producto;
    const htmlTallas = producto.tallasDisponibles.map(talla =>
        `<span class="product-detail__talla-btn" data-talla="${talla}">${talla}</span>`
    ).join('');
    
    const htmlColores = producto.coloresDisponibles.map(color => 
        `<span class="product-detail__color-btn ${color}" data-color="${color}"></span>`
    ).join('');

    const precioFormateado = UTILS.formateador.format(producto.precio_unitario);

    const tarjeta = `
        <div class="product-detail__imagen-wrapper">
            <img class="product-detail__imagen" src='${producto.url_imagen}'>
        </div>

        <div class="product-detail__info">
            <span class="product-detail__categoria">${producto.nombre_categoria}</span>

            <h1 class="product-detail__nombre">${producto.nombre_producto}</h1>
            <p class="product-detail__precio" data-precio="${producto.precio_unitario}">${precioFormateado}</p>

            <p class="product-detail__descripcion">${producto.descripcion}</p>

            <div class="product-detail__opciones">
                <p class="product-detail__opciones-label">Talla:</p>
                ${htmlTallas}
            </div>

            <div class="product-detail__opciones">
                <p class="product-detail__opciones-label">Color:</p>
                <div class="product-detail__colores">
                    ${htmlColores}
                </div>
            </div>

            <div class="product-detail__opciones">
                <p class="product-detail__opciones-label">Cantidad:</p>
                <div class="product-detail__cantidad">
                    <button type="button" class="product-detail__cantidad-btn" id="btn-restar">-</button>
                    <span class="product-detail__cantidad-valor" id="cantidad-valor">1</span>
                    <button type="button" class="product-detail__cantidad-btn" id="btn-sumar">+</button>
                </div>
            </div>

            <p class="product-detail__stock">Unidades disponibles: ${producto.cantidad_stock}</p>

            <div class="product-detail__acciones">
                <button type="button" class="btn-submit product-detail__btn-carrito">
                    <i class="bi bi-cart2"></i> AGREGAR AL CARRITO
                </button>
                <button type="button" class="product-detail__btn-favoritos">
                    <i class="bi bi-heart"></i> AGREGAR A FAVORITOS
                </button>
            </div>

        </div>
    `;
    return contenedorPadre.innerHTML = tarjeta;
};

const activarFocus = (elemento) => {
    desactivarFocus(elemento)
    elemento.classList.add('seleccionado');

}

const desactivarFocus = (elemento) => {
    let contendorPadre = elemento.parentElement;
    contendorPadre.querySelectorAll("span").forEach((detalle) => {
      detalle.classList.remove("seleccionado");
    });
};

const controlBtnCantidad = (elemento, totalStock) => {
    const cantidad = document.querySelector('#cantidad-valor'); 
    if (elemento.id == 'btn-sumar') {
        return (Number(cantidad.textContent) < totalStock) ? cantidad.textContent = Number(cantidad.textContent) + 1 : null
    }
    if (elemento.id == 'btn-restar') {
        return (Number(cantidad.textContent) > 1) ? cantidad.textContent = Number(cantidad.textContent) - 1 : null
    }
}

export { obtenerDetalleProducto };
