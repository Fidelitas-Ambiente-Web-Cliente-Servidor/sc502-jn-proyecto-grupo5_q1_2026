import * as UTILS from "./utils.js";
import { getProductAll, getProductBySearch, getProductByCategory } from "./pages/products.js";
import * as PRODUCT from "./pages/product-detail.js";
import { URL_BASE_API } from "./utils.js";

const ULR_PARAMETROS = new URLSearchParams(window.location.search);
const PAGINA_ACTUAL = ULR_PARAMETROS.get("page");
const PARAMETROS = ULR_PARAMETROS.get("id");

// Mapeo dinámico de categorías para enlaces estáticos
let categoriasMap = {};

function cargarMapeoCategorias() {
    const url = URL_BASE_API + "/clients/CategoryController.php?action=getAll";
    fetch(url)
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                data.data.forEach(cat => {
                    const nombreNormalizado = cat.nombre.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").trim();
                    categoriasMap[nombreNormalizado] = cat.id_categoria;
                });
                configurarListenersCategorias();
            }
        })
        .catch(err => console.error("Error al mapear categorías:", err));
}

function configurarListenersCategorias() {
    const enlaces = document.querySelectorAll(".user-bar__categoria-link");
    enlaces.forEach(link => {
        link.addEventListener("click", (e) => {
            const texto = link.textContent.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").trim();
            
            if (PAGINA_ACTUAL === 'products') {
                e.preventDefault();
                
                // Resaltar visualmente
                enlaces.forEach(l => l.classList.remove("user-bar__categoria-link--active"));
                link.classList.add("user-bar__categoria-link--active");

                if (texto === 'todos') {
                    getProductAll();
                } else if (categoriasMap[texto]) {
                    getProductByCategory(categoriasMap[texto]);
                }
            }
        });
    });
}

cargarMapeoCategorias();

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
                window.location.href = `index.php?page=products&search=${query}`;
            }
        }, 300);
    });
}
