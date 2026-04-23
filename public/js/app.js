import * as UTILS from "./utils.js";
import * as PRODUCTS from "./pages/products.js";
import * as PRODUCT from "./pages/product-detail.js";

const ULR_PARAMETROS = new URLSearchParams(window.location.search);
const PAGINA_ACTUAL = ULR_PARAMETROS.get("page");
const PARAMETROS = ULR_PARAMETROS.get("id");

switch (PAGINA_ACTUAL) {
  case "products":
    PRODUCTS.getProductAll().then();
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
        // Quitar clase activa de todos
        enlaces.forEach(l => l.classList.remove("user-bar__categoria-link--active"));
        // Poner clase activa al seleccionado
        e.target.classList.add("user-bar__categoria-link--active");
    });
});
