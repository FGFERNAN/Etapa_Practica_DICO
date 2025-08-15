<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Papelera Proveedores</h2>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-p table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Cantidad Productos</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Fecha Baja</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proveedores as $p): ?>
                    <tr>
                        <td><?= $p->nombre ?></td>
                        <td><?= $p->contacto ?></td>
                        <td><?= $p->empresa ?></td>
                        <td><?= $p->nit ?></td>
                        <td><?= $p->cantidad_productos ?></td>
                        <td><?= $p->fecha_ingreso ?></td>
                        <td><?= $p->fecha_baja ?></td>
                        <td><?= $p->estado_nombre ?></td>
                        <td>
                            <a href="<?= base_url('proveedores/activar/' . $p->id_proveedores) ?>" class="btn btn-sm btn-secondary btn-editar" onclick="return confirm('¿Estas seguro de activar este proveedor nuevamente?')"><i class="fa-solid fa-check"></i></a>
                            <a href="<?= base_url('proveedores/eliminar-definitivo/' . $p->id_proveedores) ?>" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Estas seguro de eliminar este proveedor definitivamente?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>