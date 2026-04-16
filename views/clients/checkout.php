<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="<?php echo BASE_URL?>/public/js/modules/checkout.js"></script>
    <title>ONLY WAY - Finalizar Compra</title>
</head>

<body>
    <?php include BASE_PATH . '/views/includes/components/header_clients.php' ?>

    <main class="main-content">
        <h1 class="checkout-page__title">Finalizar Pago</h1>

        <div class="checkout-page__content">
            <section class="checkout-page__form billing-form">
                <h2 class="billing-form__title">Detalles de Entrega</h2>

                <div class="billing-form__row">
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-name">Nombre completo*</label>
                        <input class="billing-form__input" type="text" id="input-name"
                            value="<?php echo $_SESSION['usuario']['nombre'] ?? ''; ?>" required />
                    </div>
                </div>

                <div class="billing-form__field">
                    <label class="billing-form__label" for="input-email">Correo electrónico*</label>
                    <input class="billing-form__input" type="email" id="input-email"
                        value="<?php echo $_SESSION['usuario']['email'] ?? ''; ?>" required />
                </div>

                <div class="billing-form__row">
                    <div class="billing-form__field">
                        <label class="billing-form__label" for="input-provincia">Provincia*</label>
                        <input class="billing-form__input" type="text" id="input-provincia" placeholder="Ej: San José" />
                    </div>
                </div>

                <div class="billing-form__field">
                    <label class="billing-form__label" for="input-address">Dirección exacta y otras señas*</label>
                    <textarea class="billing-form__textarea" id="input-address" rows="4"
                        placeholder="Calle, número de casa, puntos de referencia..."></textarea>
                </div>
            </section>

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
                                    <span class="summary__product"><?php echo $item['nombre']; ?> x <?php echo $item['cantidad']; ?></span>
                                    <span class="summary__value">₡<?php echo number_format($subtotal, 0, ',', '.'); ?></span>
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
                            ₡<?php echo number_format($total_pedido, 0, ',', '.'); ?>
                        </span>
                    </div>

                    <button class="summary__btn" id="btn-place-order" <?php echo empty($_SESSION['carrito']) ? 'disabled' : ''; ?>>
                        Confirmar Pedido <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </aside>
        </div>
    </main>

    <?php include BASE_PATH . '/views/includes/components/footer.php' ?>


</body>

</html>