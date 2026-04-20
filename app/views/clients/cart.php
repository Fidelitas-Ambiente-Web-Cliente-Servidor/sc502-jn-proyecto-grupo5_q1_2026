<!DOCTYPE html>
<html lang="es">

<?php require_once __DIR__ . '/../../../app/config/config.php'; ?>

<head>
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <title>ONLY WAY - Carrito</title>
    <script type="module" src="public/js/auth/auth.js"></script>
    <script type="module" src="public/js/modules/cart.js"></script>
</head>

<body>
    <?php include BASE_PATH . '/views/includes/components/header_clients.php' ?>
    <main class="main-content">
        <h1 class="cart__title">Carrito</h1>
        <div class="cart__content">

            <section class="cart__items">
                <table class="table">
                    <thead class="table__header">
                        <tr class="header__row">
                            <th class="table-header__title">Producto</th>
                            <th class="table-header__title">Precio Unitario</th>
                            <th class="table-header__title">Cantidad</th>
                            <th class="table-header__title">Total</th>
                            <th class="table-header__title"></th>
                        </tr>
                    </thead>
                    <tbody class="table__content">
                        <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
                            <?php
                            $subtotal_carrito = 0;
                            foreach ($_SESSION['carrito'] as $id => $item):
                                $total_producto = $item['precio'] * $item['cantidad'];
                                $subtotal_carrito += $total_producto;
                            ?>
                                <tr class="content__row" data-id="<?php echo $id; ?>">
                                    <td class="content__cell">
                                        <div class="cart-product">
                                            <img class="cart-product__image" src="<?php echo BASE_URL . $item['imagen']; ?>" alt="<?php echo $item['nombre']; ?>" />
                                            <div class="cart-product__info">
                                                <span class="cart-product__name"><?php echo $item['nombre']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="content__cell">₡<?php echo number_format($item['precio'], 0, ',', '.'); ?></td>
                                    <td class="content__cell">
                                        <div class="cart-quantity">
                                            <button class="cart-quantity__btn btn-minus">-</button>
                                            <input class="cart-quantity__input" type="number" value="<?php echo $item['cantidad']; ?>" min="1" readonly />
                                            <button class="cart-quantity__btn btn-plus">+</button>
                                        </div>
                                    </td>
                                    <td class="content__cell">₡<?php echo number_format($total_producto, 0, ',', '.'); ?></td>
                                    <td class="content__cell">
                                        <button class="cart-product__remove btn-remove"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 2rem;">
                                    Tu carrito está vacío. <a href="<?php echo BASE_URL; ?>?page=home">Ir a comprar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
            <aside class="cart__summary">
                <div class="summary">
                    <h2 class="summary__title">Resumen del carrito <i class="bi bi-bag"></i></h2>
                    <div class="summary__row">
                        <span class="summary__label">Subtotal:</span>
                        <span class="summary__value" data-cart="subtotal">₡<?php echo number_format($subtotal_carrito ?? 0, 0, ',', '.'); ?></span>
                    </div>
                    <div class="summary__row summary__row--total">
                        <span class="summary__label">Total:</span>
                        <span class="summary__value summary__value--total" data-cart="total">₡<?php echo number_format($subtotal_carrito ?? 0, 0, ',', '.'); ?></span>
                    </div>
                    <a class="summary__btn" href="<?php echo BASE_URL; ?>/?page=checkout">
                        Finalizar Compra <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </aside>

        </div>
    </main>
    <?php include BASE_PATH . '/views/includes/components/footer.php' ?>
</body>

</html>