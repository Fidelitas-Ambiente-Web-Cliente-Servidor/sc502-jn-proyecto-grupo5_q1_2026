<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <title>ONLY WAY - Checkout</title>
    <script type="module" src="public/js/auth/auth.js"></script>
</head>

<body>
<?php include BASE_PATH . '/views/includes/header_clients.php' ?>
    <div class="user-bar">
        <div class="user-bar__contenedor">
            <div class="user-bar__categorias">
                <a href="#" class="user-bar__categoria-link">TODOS</a>
                <span class="user-bar__categoria-separador">|</span>
                <a href="#" class="user-bar__categoria-link">HOMBRE</a>
                <span class="user-bar__categoria-separador">|</span>
                <a href="#" class="user-bar__categoria-link">MUJER</a>
                <span class="user-bar__categoria-separador">|</span>
                <a href="#" class="user-bar__categoria-link">INFANTIL</a>
                <span class="user-bar__categoria-separador">|</span>
                <a href="#" class="user-bar__categoria-link">ACCESORIOS</a>
            </div>
        </div>
    </div>
    <main class="main-content">
        <h1 class="checkout-page__title">Finalizar Pago</h1>

        <div class="checkout-banner">
            <p class="checkout-banner__text">
                ¿Ya sos cliente?
                <a class="checkout-banner__link" href="#">Hacé click aquí para cargar tus datos</a>
            </p>
        </div>

        <div class="checkout-page__content">

            <section class="checkout-page__form billing-form">
                <h2 class="billing-form__title">Detalles de Facturación</h2>

                <div class="billing-form__field">
                    <span class="billing-form__label">¿Requiere Factura Electrónica?</span>
                    <div class="billing-form__radio-group ">
                        <label class="billing-form__radio-label">
                            <input type="radio" name="invoiceRequired" value="si" /> Sí
                        </label>
                        <label class="billing-form__radio-label">
                            <input type="radio" name="invoiceRequired" value="no" checked /> No
                        </label>
                    </div>
                </div>

                <div class="billing-form__field">
                    <label class="billing-form__label" for="input-id-type">Tipo de Identificación</label>
                    <select class="billing-form__select" id="input-id-type" name="idType">
                        <option value="fisica">Cédula Física</option>
                        <option value="juridica">Cédula Jurídica</option>
                        <option value="dimex">DIMEX</option>
                    </select>
                </div>

                <div class="billing-form__field">
                    <label class="billing-form__label" for="input-identification">Identificación*</label>
                    <input class="billing-form__input" type="text" id="input-identification"
                        name="identification" />
                </div>

                <div class="billing-form__row">
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-name">Nombre*</label>
                        <input class="billing-form__input" type="text" id="input-name" name="name" />
                    </div>
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-lastname">Apellidos*</label>
                        <input class="billing-form__input" type="text" id="input-lastname" name="lastname" />
                    </div>
                </div>

                <div class="billing-form__row">
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-phone">Teléfono*</label>
                        <input class="billing-form__input" type="tel" id="input-phone" name="phone"
                            placeholder="1234-5678" />
                    </div>
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-email">Correo electrónico*</label>
                        <input class="billing-form__input" type="email" id="input-email" name="email" />
                    </div>
                </div>

                <div class="billing-form__row">
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-province">Provincia*</label>
                        <select class="billing-form__select" id="input-province" name="province">
                            <option value="">Seleccionar...</option>
                            <option value="san-jose">San José</option>
                            <option value="alajuela">Alajuela</option>
                            <option value="cartago">Cartago</option>
                            <option value="heredia">Heredia</option>
                            <option value="guanacaste">Guanacaste</option>
                            <option value="puntarenas">Puntarenas</option>
                            <option value="limon">Limón</option>
                        </select>
                    </div>
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-canton">Cantón*</label>
                        <input class="billing-form__input" type="text" id="input-canton" name="canton" />
                    </div>
                </div>

                <div class="billing-form__field">
                    <label class="billing-form__label" for="input-address">Distrito y dirección de la calle*</label>
                    <textarea class="billing-form__textarea" id="input-address" name="address"
                        rows="4"></textarea>
                </div>
            </section>
            <aside class="checkout-page__summary">
                <div class="summary">
                    <h2 class="summary__title">Tu pedido</h2>

                    <div class="summary__row">
                        <span class="summary__product">Leggings Yoga Fit x 1</span>
                        <span class="summary__value">₡14.000</span>
                    </div>

                    <div class="summary__row summary__row--total">
                        <span class="summary__label">TOTAL:</span>
                        <span class="summary__value summary__value--total">₡14.000</span>
                    </div>

                    <button class="summary__btn" id="btn-place-order">
                        Confirmar Pedido <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </aside>

        </div>
    </main>
    <?php include BASE_PATH . '/views/includes/footer.php' ?>
</body>

</html>