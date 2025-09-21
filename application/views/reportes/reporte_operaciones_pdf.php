<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Operaciones</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .details { margin-bottom: 15px; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .footer { text-align: center; margin-top: 20px; font-size: 10px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reporte de Historial de Operaciones</h1>
        <p>Supermercado SGSP</p>
    </div>

    <div class="details">
        <p><strong>Fecha de Generación:</strong> <?= date('d/m/Y H:i:s') ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($operaciones)): ?>
                <?php foreach ($operaciones as $op): ?>
                <tr>
                    <td><?= $op->id_historial_operaciones ?></td>
                    <td><?= html_escape($op->tipo_operacion) ?></td>
                    <td><?= html_escape($op->descripcion) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($op->fecha_hora)) ?></td>
                    <td><?= html_escape($op->usuario_nombre) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No hay operaciones que coincidan con los filtros seleccionados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Página 1 de 1</p>
    </div>
</body>
</html>
