import * as UTILS from "./utils.js";
import { getProductAll, getProductBySearch, getProductByCategory } from "./pages/products.js";
import * as PRODUCT from "./pages/product-detail.js";

const ULR_PARAMETROS = new URLSearchParams(window.location.search);
const PAGINA_ACTUAL = ULR_PARAMETROS.get("page");
const PARAMETROS = ULR_PARAMETROS.get("id");

switch (PAGINA_ACTUAL) {
  case "products":
    const searchParam = ULR_PARAMETROS.get('search');
    const categoryParam = ULR_PARAMETROS.get('category');
    if (searchParam) {
      getProductBySearch(searchParam).then();
    } else if (categoryParam) {
      getProductByCategory(categoryParam).then();
    } else {
      getProductAll().then();
    }
    break;
  case "product-detail":
    if (!PARAMETROS) window.location.href = "index.php";
    PRODUCT.obtenerDetalleProducto(PARAMETROS).then();
    break;
}

UTILS.actualizarIconoCarrito();

const enlaces = document.querySelectorAll(".user-bar__categoria-link");
enlaces.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        enlaces.forEach(l => l.classList.remove("user-bar__categoria-link--active"));
        e.target.classList.add("user-bar__categoria-link--active");
    });
});

// Buscador
const inputBuscar = document.querySelector("#input-buscar");
if (inputBuscar) {
    let timeout = null;
    inputBuscar.addEventListener("input", (e) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const query = e.target.value.trim();
            if (PAGINA_ACTUAL === 'products') {
                getProductBySearch(query);
            } else if (query.length > 2) {
                // Redirigir a productos con la búsqueda
                window.location.href = `index.php?page=products&search=${query}`;
            }
        }, 300);
    });
}
