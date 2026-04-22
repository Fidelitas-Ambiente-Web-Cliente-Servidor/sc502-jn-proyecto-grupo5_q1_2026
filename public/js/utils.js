/* Este lo vamos a usar para cargar los modulos globales e iniciar los objetos comunes que vamos a usar en el sitio */

export const URL_BASE_JS = "./public/js";
export const URL_BASE_API =
  "/Proyecto/sc502-jn-proyecto-grupo5_q1_2026/app/controllers";
export const APICONTROLLER =
  URL_BASE_API + "/controllers/auth/AuthController.php";
export const DISPLAY_INLINE_BLOCK = "inline-block";
export const DISPLAY_NONE = "none";

export function crearCuerpoApi(method, datos) {
  let cuerpo;
  switch (method) {
    case "POST":
      cuerpo = {
        method: method,
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify(datos),
      };
      break;
    case "GET":
      cuerpo = {
        method: method,
        headers: {
          "content-type": "application/json",
        },
      };
  }

  return cuerpo;
}

export const formateador = new Intl.NumberFormat("es-CR", {
  style: "currency",
  currency: "CRC",
  minimumFractionDigits: 2,
});

export function agregarAlCarrito(producto, detalles) {
    let carrito = [];
    try {
        carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    } catch (e) {
        carrito = [];
    }
    
    let cantidadNumerica = parseInt(detalles.cantidad);
    
    let productoAñadido = {
      'id_producto': producto.id_producto,
      'nombre': producto.nombre_producto,
      'imagen': producto.url_imagen,
      'precio': producto.precio_unitario,
      'talla': detalles.talla,
      'color': detalles.color,
      'cantidad': cantidadNumerica
    };

    // Verificar si el producto exacto (mismo ID, talla y color) ya está en el carrito
    const index = carrito.findIndex(item => 
        item.id_producto === productoAñadido.id_producto && 
        item.talla === productoAñadido.talla && 
        item.color === productoAñadido.color
    );

    if (index !== -1) {
        carrito[index].cantidad += cantidadNumerica;
    } else {
        carrito.push(productoAñadido);
    }

    localStorage.setItem('carrito', JSON.stringify(carrito));
    
    const totalItems = carrito.reduce((acc, item) => acc + item.cantidad, 0);
    localStorage.setItem('total_productos', totalItems);

    actualizarIconoCarrito();
    sincronizarCarritoConServidor(carrito);
}

export function sincronizarCarritoConServidor(carrito) {
    const url = URL_BASE_API + "/clients/CartController.php";
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            action: "sync",
            carrito: carrito
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert("¡Producto agregado al carrito con éxito!");
        } else {
            console.error("Error al sincronizar el carrito:", data.message);
        }
    })
    .catch(error => console.error("Error de conexión:", error));
}

export function actualizarIconoCarrito() {
    let carrito = [];
    try {
        carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    } catch (e) {
        carrito = [];
    }
    
    const cartCount = document.getElementById("cart-count");
    if (cartCount) {
        const total = carrito.reduce((acc, item) => acc + parseInt(item.cantidad), 0);
        if (total > 0) {
            cartCount.textContent = total;
            cartCount.style.display = 'inline-block';
        } else {
            cartCount.textContent = '';
            cartCount.style.display = 'none';
        }
    }
}

export function verificarSesionActiva() {
    const url = URL_BASE_API + "/auth/AuthController.php?action=checkSession";
    return fetch(url, {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        return data.status === "success";
    })
    .catch(error => {
        console.error("Error al verificar sesión:", error);
        return false;
    });
}
