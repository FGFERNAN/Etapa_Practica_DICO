<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura de Venta</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 100%; max-width: 800px; margin: auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .header p { margin: 5px 0; }
        .details { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .totals { float: right; width: 30%; margin-top: 20px; }
        .totals table { width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Supermercado SGSP</h1>
            <p>Dg. 24c #96-72, Bogotá</p>
            <p>Teléfono: (57) 320 9985005</p>
        </div>
        <hr>
        <div class="details">
            <p><strong>Factura N°:</strong> <?= $venta->id_ventas ?></p>
            <p><strong>Fecha:</strong> <?= date('d/m/Y H:i:s', strtotime($venta->fecha_hora)) ?></p>
            <p><strong>Cliente:</strong> <?= html_escape($venta->cliente) ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td><?= html_escape($detalle->nombre_producto) ?></td>
                    <td><?= $detalle->cantidad ?></td>
                    <td>$<?= number_format($detalle->precio_unitario, 2) ?></td>
                    <td>$<?= number_format($detalle->cantidad * $detalle->precio_unitario, 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="totals">
            <table>
                <tr>
                    <th>Subtotal:</th>
                    <td>$<?= number_format($venta->total / 1.19, 2) // Asumiendo IVA del 19% ?></td>
                </tr>
                <tr>
                    <th>IVA (19%):</th>
                    <td>$<?= number_format($venta->total - ($venta->total / 1.19), 2) ?></td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td><strong>$<?= number_format($venta->total, 2) ?></strong></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>