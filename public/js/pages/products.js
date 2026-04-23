import { URL_BASE_API, URL_BASE_JS, formateador } from "../utils.js";
const URL_API = URL_BASE_API + "/clients/ProductoController.php";

const getProductAll = () => {
  return fetch(URL_API)
    .then((response) => response.json())
    .then((data) => {
      mostrarTodosProductos(data);
      cantidadProductosCarrito();
      return data;
    })
    .catch((error) => alert("Error al procesar la consulta" + error));
};

const mostrarTodosProductos = (productosData) => {
  const contenedorCard = document.querySelector(".productos-destacados__grid");
  contenedorCard.innerHTML = "";

  if (!productosData.data || productosData.data.length === 0) {
    contenedorCard.innerHTML = "<p class='no-products'>No se encontraron productos que coincidan con tu búsqueda.</p>";
    return;
  }

  productosData.data.forEach((producto) => {
    const precioFormateado = formateador.format(producto.precio_unitario);
    const esAgotado = producto.cantidad_stock <= 0;
    const agotadoClass = esAgotado ? "product-card--agotado" : "";
    const textoBoton = esAgotado ? "Agotado" : "Ver Detalle";

    const card = `
      <article class="product-card ${agotadoClass}" data-id="${producto.id_producto}">
        <a href="index.php?page=product-detail&id=${producto.id_producto}" class="product-card__imagen-link">
            <div class="product-card__imagen-wrapper">
                <img src="${producto.url_imagen}" alt="${producto.descripcion}" class="product-card__imagen" />
            </div>
        </a>
        <div class="product-card__info">
          <h3 class="product-card__nombre">${producto.nombre_producto}</h3>
          <div class="product-card__precios">
            <span class="product-card__precio-actual">
              ${precioFormateado}
            </span>
          </div>

          <a href="index.php?page=product-detail&id=${producto.id_producto}" class="product-card__btn" id="btn-ver-detalle" data-id="${producto.id_producto}">${textoBoton}</a>
        </div>
      </article>`;
    contenedorCard.innerHTML += card;
  });
};

const cantidadProductosCarrito = () => {
  let totalItems = parseInt(localStorage.getItem("total_items")) || 0;
  let iconoCarrito = document.querySelector("#cart-count");

  if (totalItems === 0) return (iconoCarrito.innerHTML = "");
  iconoCarrito.innerHTML = totalItems;
};

const getProductBySearch = (query) => {
  const url = query ? `${URL_API}?search=${query}` : URL_API;
  return fetch(url)
    .then((response) => response.json())
    .then(data => {
      mostrarTodosProductos(data);
      cantidadProductosCarrito();
      return data;
    })
    .catch((error) => alert("Error al procesar la consulta" + error));
};

const getProductByCategory = (idCategoria) => {
  const url = idCategoria ? `${URL_API}?category=${idCategoria}` : URL_API;
  return fetch(url)
    .then((response) => response.json())
    .then(data => {
      mostrarTodosProductos(data);
      cantidadProductosCarrito();
      return data;
    })
    .catch((error) => alert("Error al procesar la consulta" + error));
};

export { getProductAll, getProductBySearch, getProductByCategory };
