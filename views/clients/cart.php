<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <title>ONLY WAY - Carrito</title>
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
                        <tr class="content__row">
                            <td class="content__cell">
                                <div class="cart-product">
                                    <img class="cart-product__image" src="leggings.jpg" alt="Leggings Yoga Fit" />
                                    <div class="cart-product__info">
                                        <span class="cart-product__name">Leggings Yoga Fit</span>
                                        <span class="cart-product__detail">Talla: S | Color: Negro</span>
                                    </div>
                                </div>
                            </td>
                            <td class="content__cell">₡14.000</td>
                            <td class="content__cell">
                                <div class="cart-quantity">
                                    <button class="cart-quantity__btn" id="btn-decrease-1">−</button>
                                    <span class="cart-quantity__value">1</span>
                                    <button class="cart-quantity__btn" id="btn-increase-1">+</button>
                                </div>
                            </td>
                            <td class="content__cell">₡14.000</td>
                            <td class="content__cell">
                                <button class="cart__remove-btn" id="btn-remove-1">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="cart__actions">
                    <div class="cart-coupon">
                        <input class="cart-coupon__input" id="input-coupon" type="text" placeholder="Código de cupón" />
                        <button class="cart-coupon__btn" id="btn-apply-coupon">Aplicar Cupón</button>
                    </div>
                </div>
            </section>
            <aside class="cart__summary">
                <div class="summary">
                    <h2 class="summary__title">Resumen del carrito <i class="bi bi-bag"></i></h2>
                    <div class="summary__row">
                        <span class="summary__label">Subtotal:</span>
                        <span class="summary__value" data-cart="subtotal">₡14.000</span>
                    </div>
                    <div class="summary__row">
                        <span class="summary__label">Envío:</span>
                        <span class="summary__value summary__value--shipping">Calcular envío</span>
                    </div>
                    <div class="summary__row summary__row--total">
                        <span class="summary__label">Total:</span>
                        <span class="summary__value summary__value--total" data-cart="total">₡14.000</span>
                    </div>
                    <a class="summary__btn" href="checkout.html">
                        Finalizar Compra <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </aside>

        </div>
    </main>
    <?php include BASE_PATH . '/views/includes/footer.php' ?>
</body>

</html>