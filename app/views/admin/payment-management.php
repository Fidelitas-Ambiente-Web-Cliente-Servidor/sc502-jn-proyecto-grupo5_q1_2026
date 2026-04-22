<!DOCTYPE html>
<html lang="en">

<head>
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
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
                    <th class="table__title" colspan="2"><span class="table__title-text">Historial de
                            Transacciones</span>
                    </th>
                </tr>
                <tr class="header__row">
                    <th class="table-header__title">ID TRANSACCIÓN</th>
                    <th class="table-header__title">ID PEDIDO</th>
                    <th class="table-header__title">CLIENTE</th>
                    <th class="table-header__title">FECHA</th>
                    <th class="table-header__title">HORA</th>
                    <th class="table-header__title">MONTO</th>
                    <th class="table-header__title">MÉTODO DE PAGO</th>
                </tr>
            </thead>
            <tbody class="table__content">
                <tr class="content__row">
                    <td class="content__cell">T0001</td>
                    <td class="content__cell">#1234</td>
                    <td class="content__cell">Juan Pérez González</td>
                    <td class="content__cell content__cell--fecha">2026-02-20</td>
                    <td class="content__cell">14:32</td>
                    <td class="content__cell">₡45 000</td>
                    <td class="content__cell">Tarjeta de credito</td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">T0002</td>
                    <td class="content__cell">#1235</td>
                    <td class="content__cell">Ana Martínez López</td>
                    <td class="content__cell content__cell--fecha">2026-02-21</td>
                    <td class="content__cell">10:15</td>
                    <td class="content__cell">₡32 500</td>
                    <td class="content__cell">SINPE Móvil</td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">T0003</td>
                    <td class="content__cell">#1236</td>
                    <td class="content__cell">María Rodríguez Castro</td>
                    <td class="content__cell content__cell--fecha">2026-02-22</td>
                    <td class="content__cell">16:45</td>
                    <td class="content__cell">₡67 800</td>
                    <td class="content__cell">SINPE Móvil</td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">T0004</td>
                    <td class="content__cell">#1237</td>
                    <td class="content__cell">Carlos Gómez Vargas</td>
                    <td class="content__cell content__cell--fecha">2026-02-23</td>
                    <td class="content__cell">09:20</td>
                    <td class="content__cell">₡24 000</td>
                    <td class="content__cell">Contra Entrega</td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">T0005</td>
                    <td class="content__cell">#1238</td>
                    <td class="content__cell">Carlos Gómez Vargas</td>
                    <td class="content__cell content__cell--fecha">2026-02-27</td>
                    <td class="content__cell">17:25</td>
                    <td class="content__cell">₡29 800</td>
                    <td class="content__cell">Tarjeta de credito</td>
                </tr>
            </tbody>
        </table>
    </main>

</body>

</html>
