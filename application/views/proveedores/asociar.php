<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Asignar a Proveedor <?= $proveedor->nombre ?></h2>
    </div>
    <form action="<?= $this->uri->segment(4) == 7 ? base_url('proveedores/asignar_c/' . $proveedor->id_proveedores) : base_url('proveedores/asignar/' . $proveedor->id_proveedores) ?>" method="post">
        <div class="table-responsive mt-4 mi-table">
            <table class="table table-striped">
                <input type="hidden" name="id_proveedores" value="<?= $proveedor->id_proveedores ?>">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Proveedor P.</th>
                        <th scope="col">Proveedor C.</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->uri->segment(4) == 7) {
                        foreach ($productos_c as $p): ?>
                            <tr>
                                <td><input class="form-check-input" type="checkbox" name="productos_ids[]" value="<?= $p->id_productos ?>"></td>
                                <td><?= $p->nombre ?></td>
                                <td><?= $p->marca_nombre ?></td>
                                <td><?= $p->categoria_nombre ?></td>
                                <td><?= $p->proveedor_nombre ?></td>
                                <td><?= $p->proveedor_c ?></td>
                                <td><?= $p->estado_nombre ?></td>
                            </tr>
                        <?php endforeach;
                    } else
                        foreach ($productos as $p): ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" name="productos_ids[]" value="<?= $p->id_productos ?>"></td>
                            <td><?= $p->nombre ?></td>
                            <td><?= $p->marca_nombre ?></td>
                            <td><?= $p->categoria_nombre ?></td>
                            <td><?= $p->proveedor_nombre ?></td>
                            <td><?= $p->proveedor_c ?></td>
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