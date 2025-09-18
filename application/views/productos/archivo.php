<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Productos Inactivos</h2>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-pr table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio Compra</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Proveedor P.</th>
                    <th scope="col">Proveedor C.</th>
                    <th scope="col">Estado</th>
                    <th width="3%" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= $p->nombre ?></td>
                    <td><?= $p->marca_nombre ?></td>
                    <td><?= $p->precio_compra ?></td>
                    <td><?= $p->precio_venta ?></td>
                    <td><?= $p->stock ?></td>
                    <td><?= $p->categoria_nombre ?></td>
                    <td><?= $p->proveedor_nombre ?></td>
                    <td><?= $p->proveedor_nombre_c ?></td>
                    <td><?= $p->estado_nombre ?></td>
                    <td class="d-flex justify-content-center">
                        <a href="<?= base_url('productos/activar/'.$p->id_productos) ?>" class="btn btn-sm btn-secondary btn-editar" onclick="return confirm('¿Estas seguro de activar este producto nuevamente?')"><i class="fa-solid fa-check"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>