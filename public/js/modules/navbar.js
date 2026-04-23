import { URL_BASE_API } from '../utils.js';
import { getProductByCategory } from '../pages/products.js';

const API_CATEGORY = URL_BASE_API + '/clients/CategoryController.php';

document.addEventListener('DOMContentLoaded', () => {
    cargarCategoriasNavbar();
});

function cargarCategoriasNavbar() {
    const container = document.getElementById('navbar-categorias');
    if (!container) return;

    fetch(API_CATEGORY + '?action=getAll')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                renderizarCategorias(data.data);
            }
        })
        .catch(err => console.error("Error al cargar categorías:", err));
}

function renderizarCategorias(categorias) {
    const container = document.getElementById('navbar-categorias');
    const urlParams = new URLSearchParams(window.location.search);
    const categoryIdParam = urlParams.get('category');
    const page = urlParams.get('page');
    
    const btnTodos = container.querySelector('.user-bar__categoria-link');
    if (btnTodos) {
        if (!categoryIdParam) btnTodos.classList.add('active');
        btnTodos.addEventListener('click', (e) => {
            if (page === 'products') {
                e.preventDefault();
                resaltarEnlace(btnTodos);
                getProductByCategory(null);
            }
        });
    }
    
    const filtradas = categorias.filter(c => {
        const nombre = c.nombre.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").trim();
        return nombre !== 'sin categoria';
    });

    const fragment = document.createDocumentFragment();

    filtradas.forEach(cat => {
        const separator = document.createElement('span');
        separator.className = 'user-bar__categoria-separador';
        separator.textContent = '|';
        fragment.appendChild(separator);

        const link = document.createElement('a');
        link.href = `index.php?page=products&category=${cat.id_categoria}`;
        link.className = 'user-bar__categoria-link';
        link.textContent = cat.nombre.toUpperCase();
        link.dataset.id = cat.id_categoria;
        
        if (categoryIdParam == cat.id_categoria) {
            link.classList.add('active');
            if (btnTodos) btnTodos.classList.remove('active');
        }

        link.addEventListener('click', (e) => {
            if (page === 'products') {
                e.preventDefault();
                resaltarEnlace(link);
                getProductByCategory(cat.id_categoria);
            }
        });

        fragment.appendChild(link);
    });

    container.appendChild(fragment);
}

function resaltarEnlace(enlace) {
    const enlaces = document.querySelectorAll('.user-bar__categoria-link');
    enlaces.forEach(link => {
        link.classList.remove('active');
    });
    enlace.classList.add('active');
}
