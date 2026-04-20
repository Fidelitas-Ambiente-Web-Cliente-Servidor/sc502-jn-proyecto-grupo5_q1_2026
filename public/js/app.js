import * as UTILS from './utils.js';
import * as PRODUCTS from './pages/products.js';

const ULR_PARAMETROS = new URLSearchParams(window.location.search);
const PAGINA_ACTUAL = ULR_PARAMETROS.get('page');

switch (PAGINA_ACTUAL) {
    case 'products':
        PRODUCTS.getProductAll().then();
        break;

}

const enlaces = document.querySelector(".user-bar__categorias");
enlaces.addEventListener('click', (e) => {
    if (e.target.closest('.user-bar__categoria-link')) return e.preventDefault();
    
})



