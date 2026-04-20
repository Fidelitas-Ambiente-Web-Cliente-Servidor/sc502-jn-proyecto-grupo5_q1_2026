import { URL_BASE_API, URL_BASE_JS } from "../utils.js";
const URL_API = URL_BASE_API + "/clients/ProductoController.php";

const getProductAll = () => {
  return fetch(URL_API)
    .then((response) => response.json())
    .then(data => {
      mostrarTodosProductos(data);
      cantidadProductosCarrito();
      return data;
    })
    .catch((error) => alert("Error al procesar la consulta" + error));
};

const formateador = new Intl.NumberFormat("es-CR", {
  style: "currency",
  currency: "CRC",
  minimumFractionDigits: 2,
});


const mostrarTodosProductos = (productosData) => {
  const contenedorCard = document.querySelector(
    ".productos-destacados__grid",
  );
  contenedorCard.innerHTML = "";

  productosData.data.forEach((producto) => {
    const precioFormateado = formateador.format(producto.precio_unitario);
    const card = `
      <article class="product-card">
        <div class="product-card__imagen-wrapper">
          <img src="${producto.url_imagen}" alt="${producto.descripcion}" class="product-card__imagen" />
        </div>
        <div class="product-card__info">
          <h3 class="product-card__nombre">${producto.nombre_producto}</h3>
          <div class="product-card__precios">
            <span class="product-card__precio-actual">
              ${precioFormateado}
            </span>
          </div>

          <button class="product-card__btn" id="btn-agregar-p" data-id="${producto.id_producto}" data-precio="${producto.precio_unitario}">
            <i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO
          </button>
        </div>
      </article>`
    contenedorCard.innerHTML += card;
  });
};

const cantidadProductosCarrito = () => {
  let totalItems = parseInt(localStorage.getItem('total_items')) || 0;
  let iconoCarrito = document.querySelector("#cart-count");

  if (totalItems === 0) return iconoCarrito.innerHTML = '';
  iconoCarrito.innerHTML = totalItems;

}
export { getProductAll };
