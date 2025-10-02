<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="d-flex align-items-center">
                        <h2 class="mi-h2">Categorías</h2>
                        <button class="btn mi-btn ms-4 mb-2" onclick="location.href='<?= base_url('categorias/crear'); ?>'"><i class="fa-solid fa-plus me-1"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button class="btn mi-btn-papelera ms-5" onclick="location.href='<?= base_url('categorias/archivo'); ?>'"><i class="fa-solid fa-file-circle-xmark"></i></button>
                </div>
            </div>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show mi-alert-danger" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i><?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="table-responsive mt-4 mi-table">
                <table class="table table-pr table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th width="10%" scope="col">Cantidad Productos</th>
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
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>