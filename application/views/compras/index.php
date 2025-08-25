<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center mi-header">
            <h2 class="mi-h2">Historial de Compras</h2>
            <button class="btn btn-success ms-4 mb-2" onclick="location.href='<?= base_url('compras/realizar'); ?>'"><i class="fa-solid fa-store"></i></button>
        </div>
        <!-- <div class="dropdown mi-dropdown">
            <button class="btn btn-primary mi-filter dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-filter"></i> Filtrar
            </button>
            <ul class="dropdown-menu dropdown-menu-light">
                <?php foreach($categorias as $c): ?>
                <li><a class="dropdown-item" href="<?= base_url('compras/filtrar/'. $c->id_categorias) ?>"><?= $c->nombre ?></a></li>
                <?php endforeach ?>
            </ul>
        </div> -->
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Compra</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Total</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $c): ?>
                    <tr>
                        <td><?= $c->id_compras ?></td>
                        <td><?= $c->fecha_hora ?></td>
                        <td><?= $c->total ?></td>
                        <td><?= $c->proveedor_nombre ?></td>
                        <td><?= $c->usuario_nombre ?></td>
                        <td>
                            <button class="btn btn-sm btn-secondary btn-editar" onclick="window.location.href='<?= base_url('compras/detalle/' . $c->id_compras) ?>'"><i class="fa-solid fa-eye"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>