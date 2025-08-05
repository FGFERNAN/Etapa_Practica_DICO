<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Productos</h2>
        <button class="btn mi-btn ms-4 mb-2" onclick="location.href='<?= base_url('productos/crear'); ?>'"><i class="fa-solid fa-plus me-1"></i></button>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
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
                    <td><?= $p->precio ?></td>
                    <td><?= $p->stock ?></td>
                    <td><?= $p->categoriasID ?></td>
                    <td><?= $p->proveedoresID ?></td>
                    <td><?= $p->estado_nombre ?></td>
                    <td>
                        <button class="btn btn-sm btn-secondary btn-editar" onclick="window.location.href='<?= base_url('productos/editar/'.$p->id) ?>'"><i class="fa-solid fa-pen"></i></button>
                        <a href="<?= base_url('productos/eliminar/'.$p->id) ?>" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Estas seguro de eliminar este producto?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>