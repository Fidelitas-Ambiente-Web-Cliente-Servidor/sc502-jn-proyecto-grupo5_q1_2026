<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="<?php echo BASE_URL ?>/public/js/modules/checkout.js"></script>
    <title>Finalizar Compra</title>
</head>

<body>
    <?php include BASE_PATH . '/views/includes/components/header_clients.php' ?>
    <main class="main-content">
        <div class="checkout-page">
            <header class="section-header">
                <div class="section-header__info">
                    <h2 class="section-header__title">Finalizar Compra</h2>
                    <p class="section-header__text">Completá tu información para procesar el pedido</p>
                </div>
            </header>
            <div class="checkout-page__content">
                <div class="checkout-page__form">
                    <section class="billing-form card">
                        <h3 class="billing-form__title">Facturación</h3>
                        <div class="billing-form__field">
                            <label class="billing-form__label" for="input-name">Nombre completo*</label>
                            <input class="billing-form__input" type="text" id="input-name"
                                value="<?php echo $_SESSION['usuario']['nombre'] ?? ''; ?>" required />
                        </div>
                        <div class="billing-form__field">
                            <label class="billing-form__label" for="input-email">Correo electrónico*</label>
                            <input class="billing-form__input" type="email" id="input-email"
                                value="<?php echo $_SESSION['usuario']['email'] ?? ''; ?>" required />
                        </div>
                        <div class="billing-form__row">
                            <div class="billing-form__field">
                                <label class="billing-form__label" for="input-provincia">Provincia*</label>
                                <input class="billing-form__input" type="text" id="input-provincia"
                                    placeholder="Ej: San José" />
                            </div>
                        </div>
                        <div class="billing-form__field">
                            <label class="billing-form__label" for="input-address">Dirección exacta y otras
                                señas*</label>
                            <textarea class="billing-form__textarea" id="input-address" rows="4"
                                placeholder="Calle, número de casa, puntos de referencia..."></textarea>
                        </div>
                    </section>
                    <section class="billing-form card">
                        <h3 class="billing-form__title">Método de Pago</h3>
                        <div class="payment-methods">
                            <label class="payment-method__option">
                                <input type="radio" name="payment-method" value="pagocontraentrega" checked />
                                Pago Contra Entrega
                            </label>
                            <div class="payment-method__fields card" id="contraentrega-fields">
                                <p>Acercate a nuestra sucursal más cercana y mostrá tu ID de pedido: #1238</p>
                            </div>

                            <label class="payment-method__option">
                                <input type="radio" name="payment-method" value="sinpe" />
                                SINPE Móvil
                            </label>
                            <div class="payment-method__info">
                                <i class="bi bi-info-circle"></i>
                                <p>Realizá tu transferencia SINPE Móvil al número: 8674-8374</p>
                            </div>
                            <div class="payment-method__fields card" id="sinpe-fields">
                                <div class="billing-form__field">
                                    <label class="billing-form__label" for="input-sinpe-phone">Número de teléfono
                                        SINPE*</label>
                                    <input class="billing-form__input" type="tel" id="input-sinpe-phone"
                                        placeholder="8888-8888" />
                                </div>
                                <div class="billing-form__field">
                                    <label class="billing-form__label" for="input-sinpe-id">Cédula*</label>
                                    <input class="billing-form__input" type="text" id="input-sinpe-id"
                                        placeholder="1-2345-6789" />
                                </div>
                            </div>

                            <label class="payment-method__option">
                                <input type="radio" name="payment-method" value="transferencia" />
                                Transferencia Bancaria
                            </label>
                            <div class="payment-method__info">
                                <i class="bi bi-info-circle"></i>
                                <div>
                                    <p>Cuenta IBAN: CR12345678901234567890</p>
                                    <p>Beneficiario: ONLY WAY S.A.</p>
                                    <p>Banco: Banco Nacional de Costa Rica</p>
                                </div>
                            </div>
                            <div class="payment-method__fields card" id="transfer-fields">
                                <div class="billing-form__field">
                                    <label class="billing-form__label" for="input-transfer-bank">Banco*</label>
                                    <input class="billing-form__input" type="text" id="input-transfer-bank"
                                        placeholder="Ej: Banco Nacional" />
                                </div>
                                <div class="billing-form__field">
                                    <label class="billing-form__label" for="input-transfer-account">Número de cuenta
                                        IBAN*</label>
                                    <input class="billing-form__input" type="text" id="input-transfer-account"
                                        placeholder="CR00 0000 0000 0000 0000 00" />
                                </div>
                            </div>

                            <label class="payment-method__option">
                                <input type="radio" name="payment-method" value="card" />
                                Tarjeta de Crédito / Débito
                            </label>
                            <div class="payment-method__fields card" id="card-fields">
                                <div class="billing-form__field">
                                    <label class="billing-form__label" for="input-card-number">Número de
                                        tarjeta*</label>
                                    <input class="billing-form__input" type="text" id="input-card-number"
                                        placeholder="1234 5678 9012 3456" />
                                </div>
                                <div class="billing-form__field">
                                    <label class="billing-form__label" for="input-card-name">Nombre del titular*</label>
                                    <input class="billing-form__input" type="text" id="input-card-name"
                                        placeholder="NOMBRE APELLIDO" />
                                </div>
                                <div class="billing-form__row">
                                    <div class="billing-form__field">
                                        <label class="billing-form__label" for="input-card-expiry">Fecha de
                                            vencimiento*</label>
                                        <input class="billing-form__input" type="text" id="input-card-expiry"
                                            placeholder="MM/AA" />
                                    </div>
                                    <div class="billing-form__field">
                                        <label class="billing-form__label" for="input-card-cvv">CVV*</label>
                                        <input class="billing-form__input" type="text" id="input-card-cvv"
                                            placeholder="123" />
                                    </div>
                                </div>
                            </div>

                            <label class="payment-method__option">
                                <input type="radio" name="payment-method" value="paypal" />
                                PayPal
                            </label>
                            <div class="payment-method__fields card" id="paypal-fields">
                                <div class="billing-form__field">
                                    <label class="billing-form__label" for="input-paypal-email">Correo
                                        electrónico*</label>
                                    <input class="billing-form__input" type="email" id="input-paypal-email"
                                        placeholder="luishdez@gmail.com" />
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <aside class="checkout-page__summary">
                    <div class="summary">
                        <h2 class="summary__title">Tu pedido</h2>
                        <div class="summary__products-list">
                            <?php
                        $total_pedido = 0;
                        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])):
                            foreach ($_SESSION['carrito'] as $item):
                                $subtotal = $item['precio'] * $item['cantidad'];
                                $total_pedido += $subtotal;
                        ?>
                            <div class="summary__row">
                                <span class="summary__product">
                                    <?php echo $item['nombre']; ?> x
                                    <?php echo $item['cantidad']; ?>
                                </span>
                                <span class="summary__value">₡
                                    <?php echo number_format($subtotal, 0, ',', '.'); ?>
                                </span>
                            </div>
                            <?php
                            endforeach;
                        else:
                        ?>
                            <p>No hay productos en el pedido.</p>
                            <?php endif; ?>
                        </div>
                        <div class="summary__row summary__row--total">
                            <span class="summary__label">TOTAL:</span>
                            <span class="summary__value summary__value--total" id="checkout-total">
                                ₡
                                <?php echo number_format($total_pedido, 0, ',', '.'); ?>
                            </span>
                        </div>
                        <button class="summary__btn" id="btn-place-order" <?php echo empty($_SESSION['carrito'])
                            ? 'disabled' : '' ; ?>>
                            Confirmar Pedido <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </aside>
            </div>
        </div>
    </main>
    <?php include BASE_PATH . '/views/includes/components/footer.php' ?>
</body>

</html>