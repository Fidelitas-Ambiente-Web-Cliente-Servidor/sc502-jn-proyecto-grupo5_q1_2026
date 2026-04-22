import {
  crearCuerpoApi,
  URL_BASE_API,
  verificarSesionActiva,
} from "../utils.js";
const API_ORDER = URL_BASE_API + "/clients/OrderController.php";

document.addEventListener("DOMContentLoaded", () => {
  const btnPlaceOrder = document.getElementById("btn-place-order");
  if (!btnPlaceOrder) return;

  btnPlaceOrder.addEventListener("click", function (e) {
    e.preventDefault();

    verificarSesionActiva().then((sesionActiva) => {
      if (!sesionActiva) {
        alert("Debes iniciar sesión para procesar la compra.");
        window.location.href = "?page=login";
        return;
      }

      const inputName = document.getElementById("input-name");
      const inputEmail = document.getElementById("input-email");
      const inputAddress = document.getElementById("input-address");
      const inputProvincia = document.getElementById("input-provincia");

      const nombre = inputName ? inputName.value : "";
      const email = inputEmail ? inputEmail.value : "";
      const direccion = inputAddress ? inputAddress.value : "";
      const provincia = inputProvincia ? inputProvincia.value : "";

      if (!nombre || !email || !direccion) {
        alert("Por favor, complete todos los campos obligatorios.");
        return;
      }

      const metodoPago =
        document.querySelector('input[name="payment-method"]:checked')?.value ||
        "pagocontraentrega";

      let detallesPago = "";
      if (metodoPago === "sinpe") {
        detallesPago = `Tel: ${document.getElementById("input-sinpe-phone")?.value}, Céd: ${document.getElementById("input-sinpe-id")?.value}`;
      } else if (metodoPago === "transferencia") {
        detallesPago = `Banco: ${document.getElementById("input-transfer-bank")?.value}, Cuenta: ${document.getElementById("input-transfer-account")?.value}`;
      } else if (metodoPago === "card") {
        detallesPago = `Titular: ${document.getElementById("input-card-name")?.value}, Tarjeta: ****${document.getElementById("input-card-number")?.value.slice(-4)}`;
      } else if (metodoPago === "paypal") {
        detallesPago = `Email: ${document.getElementById("input-paypal-email")?.value}`;
      }

      const datos = {
        action: "placeOrder",
        nombre: nombre,
        email: email,
        provincia: provincia,
        direccion_exacta: direccion,
        direccion: `${provincia}, ${direccion}`,
        metodo_pago: metodoPago,
        detalles_pago: detallesPago,
      };

      fetch(API_ORDER, crearCuerpoApi("POST", datos))
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "success") {
            alert("¡Pedido realizado con éxito! Gracias por su compra.");
            localStorage.removeItem("carrito");
            localStorage.removeItem("total_productos");
            window.location.href = "index.php";
          } else {
            alert("Error al procesar el pedido: " + data.message);
          }
        })
        .catch((err) => console.error("Error:", err));
    });
  });
});
