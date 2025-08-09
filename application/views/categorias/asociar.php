<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Asignar a Categoría <?= $categoria->nombre ?></h2>
    </div>
    <form action="<?= base_url('categorias/asignar/'. $categoria->id_categorias) ?>" method="post">
        <div class="table-responsive mt-4 mi-table">
            <table class="table table-striped">
                <input type="hidden" name="id_categorias" value="<?= $categoria->id_categorias ?>">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $p): ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" name="productos_ids[]" value="<?= $p->id_productos ?>"></td>
                            <td><?= $p->nombre ?></td>
                            <td><?= $p->marca_nombre ?></td>
                            <td><?= $p->categoria_nombre ?></td>
                            <td><?= $p->id_proveedores ?></td>
                            <td><?= $p->estado_nombre ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-primary mt-3 mb-4 btn-guardar">Guardar</button>
        </div>
    </form>
</div>

<?php $this->load->view('layout/footer'); ?>