<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>
<?php $segmento = $this->uri->segment(3); ?>
<div class="container-fluid mi-container">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center mi-header">
            <h2 class="mi-h2">Detalle de Compra ID - <?= $segmento ?></h2>
        </div>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-dc table-striped">
            <thead>
                <tr>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">ID Compra</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Lote</th>
                    <th scope="col">Fecha Vencimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalle as $d): ?>
                    <tr>
                        <td><?= $d->cantidad ?></td>
                        <td><?= $d->precio_unitario ?></td>
                        <td><?= $d->id_compras ?></td>
                        <td><?= $d->nombre_producto . ' - ' . $d->marca_producto ?></td>
                        <td><?= $d->lote ?></td>
                        <td><?= $d->fecha_vencimiento ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>