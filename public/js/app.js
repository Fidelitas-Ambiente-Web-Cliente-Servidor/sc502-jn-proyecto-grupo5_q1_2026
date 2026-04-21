import * as UTILS from './utils.js';
import * as PRODUCTS from './pages/products.js';
import * as PRODUCT from './pages/product-detail.js';

const ULR_PARAMETROS = new URLSearchParams(window.location.search);
const PAGINA_ACTUAL = ULR_PARAMETROS.get('page');
const PARAMETROS = ULR_PARAMETROS.get('id');

switch (PAGINA_ACTUAL) {
    case 'products':
        PRODUCTS.getProductAll().then();
        break;
    case 'product-detail':
        if (!PARAMETROS) window.location.href = 'index.php';
        PRODUCT.obtenerDetalleProducto(PARAMETROS).then();
        break;

}


UTILS.actualizarIconoCarrito();

const enlaces = document.querySelector(".user-bar__categorias");
enlaces.addEventListener('click', (e) => {
    if (e.target.closest('.user-bar__categoria-link')) {
        console.log(e)
        e.preventDefault();
        window.location.href = e.target.href;
    } 
    
})





