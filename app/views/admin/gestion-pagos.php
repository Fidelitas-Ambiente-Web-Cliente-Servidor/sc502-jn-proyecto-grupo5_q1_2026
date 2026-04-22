<!DOCTYPE html>
<html lang="en">

<head> 
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <script type="module" src="public/js/auth/auth.js"></script>
    <title>Gestión de Pagos</title>
</head> 

<body class="grid--dos-columnas">
    <?php include BASE_PATH . '/app/views/includes/components/header_vertical.php'; ?>

    <main class="main-content">
        <header class="section-header">
            <div class="section-header__info">
                <h2 class="section-header__title">Gestión de Pagos</h2>
                <p class="section-header__text">Administra los métodos de pago y transacciones</p>
            </div>
        </header>

        <section class="payment-admin">
            <h3 class="payment-admin__title">Métodos de Pago Disponibles</h3>

            <table class="payment-admin__table">
                <tbody>
                    <tr class="payment-admin__row">
                        <td class="payment-admin__name">Tarjeta de Crédito/Débito</td>
                        <td class="payment-admin__status">
                            <select id="input-payment-method-card" class="payment-admin__select">
                                <option value="enabled" selected>Habilitado</option>
                                <option value="disabled">Deshabilitado</option>
                            </select>
                        </td>
                    </tr>

                    <tr class="payment-admin__row">
                        <td class="payment-admin__name">Transferencia Bancaria</td>
                        <td class="payment-admin__status">
                            <select id="input-payment-method-bank-transfer" class="payment-admin__select">
                                <option value="enabled" selected>Habilitado</option>
                                <option value="disabled">Deshabilitado</option>
                            </select>
                        </td>
                    </tr>

                    <tr class="payment-admin__row">
                        <td class="payment-admin__name">SINPE Móvil</td>
                        <td class="payment-admin__status">
                            <select id="input-payment-method-sinpe" class="payment-admin__select">
                                <option value="enabled" selected>Habilitado</option>
                                <option value="disabled">Deshabilitado</option>
                            </select>
                        </td>
                    </tr>

                    <tr class="payment-admin__row">
                        <td class="payment-admin__name">PayPal</td>
                        <td class="payment-admin__status">
                            <select id="input-payment-method-paypal" class="payment-admin__select">
                                <option value="enabled" selected>Habilitado</option>
                                <option value="disabled">Deshabilitado</option>
                            </select>
                        </td>
                    </tr>

                    <tr class="payment-admin__row">
                        <td class="payment-admin__name">Contra Entrega</td>
                        <td class="payment-admin__status">
                            <select id="input-payment-method-cash-on-delivery" class="payment-admin__select">
                                <option value="enabled" selected>Habilitado</option>
                                <option value="disabled">Deshabilitado</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <table class="table">
            <thead class="table__header">
                <tr class="table__titles">
                    <th class="table__title" colspan="2"><span class="table__title-text">Resumen de Pagos</span></th>
                </tr>

                <tr class="header__row">
                    <th class="table-header__title">ID</th>
                    <th class="table-header__title">CLIENTE</th>
                    <th class="table-header__title">FECHA</th>
                    <th class="table-header__title">MONTO</th>
                    <th class="table-header__title">METODO</th>
                    <th class="table-header__title">ESTADO</th>
                </tr>
            </thead>
            <tbody class="table__content">
                <tr class="content__row">
                    <td class="content__cell">#1234</td>
                    <td class="content__cell">Juan Perez</td>
                    <td class="content__cell content__cell--fecha">2026-02-20</td>
                    <td class="content__cell">¢45.000</td>
                    <td class="content__cell">Tarjeta de Crédito</td>
                    <td class="content__cell"><span class="table__estado table__estado--completado">Completado</span>
                    </td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1235</td>
                    <td class="content__cell">Ana Martinez</td>
                    <td class="content__cell content__cell--fecha">2026-02-21</td>
                    <td class="content__cell">¢32.500</td>
                    <td class="content__cell">SINPE MOVIL</td>
                    <td class="content__cell"> <span class="table__estado table__estado--enproceso">En Progreso</span>
                    </td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1236</td>
                    <td class="content__cell">Maria Rodriguez</td>
                    <td class="content__cell content__cell--fecha">2026-02-22</td>
                    <td class="content__cell">¢67.8000</td>
                    <td class="content__cell">SINPE MOVIL</td>
                    <td class="content__cell"><span class="table__estado table__estado--pendiente">Pendiente</span></td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1237</td>
                    <td class="content__cell">Luis Hernandez</td>
                    <td class="content__cell content__cell--fecha">2026-02-23</td>
                    <td class="content__cell">¢24.0000</td>
                    <td class="content__cell">Contra Entrega</td>
                    <td class="content__cell"><span class="table__estado table__estado--completado">Completado</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

</body>

</html>
