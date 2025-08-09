<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Papelera Categorías</h2>
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
                            <a href="<?= base_url('categorias/activar/' . $c->id_categorias) ?>" class="btn btn-sm btn-secondary btn-editar" onclick="return confirm('¿Estas seguro de activar esta categoría nuevamente?')"><i class="fa-solid fa-check"></i></a>
                            <a href="<?= base_url('categorias/eliminar-definitivo/' . $c->id_categorias) ?>" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Estas seguro de eliminar esta categoría definitivamente?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>