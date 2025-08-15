<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Categorías</h2>
        <button class="btn mi-btn ms-4 mb-2" onclick="location.href='<?= base_url('categorias/crear'); ?>'"><i class="fa-solid fa-plus me-1"></i></button>
        <button class="btn mi-btn-papelera ms-3 mb-2" onclick="location.href='<?= base_url('categorias/papelera'); ?>'"><i class="fa-solid fa-trash-can"></i></button>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad Productos</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $c): ?>
                    <tr>
                        <td><?= $c->nombre ?></td>
                        <td><?= $c->descripcion ?></td>
                        <td><?= $c->cantidad_productos ?></td>
                        <td><?= $c->estado_nombre ?></td>
                        <td>
                            <button class="btn btn-sm btn-secondary btn-asignar" onclick="window.location.href='<?= base_url('categorias/asociar/' . $c->id_categorias) ?>'"><i class="fa-solid fa-link"></i></button>
                            <button class="btn btn-sm btn-secondary btn-editar" onclick="window.location.href='<?= base_url('categorias/editar/' . $c->id_categorias) ?>'"><i class="fa-solid fa-pen"></i></button>
                            <a href="<?= base_url('categorias/eliminar/' . $c->id_categorias) ?>" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Estas seguro de eliminar esta categoría?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>