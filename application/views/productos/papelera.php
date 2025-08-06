<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Papelera Productos</h2>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio Compra</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Lote</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
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
                    <td><?= $p->lote ?></td>
                    <td><?= $p->id_categorias ?></td>
                    <td><?= $p->id_proveedores ?></td>
                    <td><?= $p->estado_nombre ?></td>
                    <td>
                        <a href="<?= base_url('productos/activar/'.$p->id_productos) ?>" class="btn btn-sm btn-secondary btn-editar" onclick="return confirm('¿Estas seguro de activar este producto nuevamente?')"><i class="fa-solid fa-check"></i></a>
                        <a href="<?= base_url('productos/eliminar-definitivo/'.$p->id_productos) ?>" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Estas seguro de eliminar este producto definitivamente?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>