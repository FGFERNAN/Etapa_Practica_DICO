<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Proveedores</h2>
        <button class="btn mi-btn ms-4 mb-2" onclick="location.href='<?= base_url('proveedores/crear'); ?>'"><i class="fa-solid fa-plus me-1"></i></button>
        <button class="btn mi-btn-papelera ms-3 mb-2" onclick="location.href='<?= base_url('proveedores/papelera'); ?>'"><i class="fa-solid fa-trash-can"></i></button>
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
                    <th scope="col">Fecha Alta</th>
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
                        <td><?= $p->fecha_alta ?></td>
                        <td><?= $p->estado_nombre ?></td>
                        <td>
                            <button class="btn btn-sm btn-secondary btn-asignar" onclick="window.location.href='<?= base_url('proveedores/asociar/' . $p->id_proveedores . '/' . $p->estado) ?>'"><i class="fa-solid fa-link"></i></button>
                            <button class="btn btn-sm btn-secondary btn-editar" onclick="window.location.href='<?= base_url('proveedores/editar/' . $p->id_proveedores) ?>'"><i class="fa-solid fa-pen"></i></button>
                            <a href="<?= base_url('proveedores/eliminar/' . $p->id_proveedores) ?>" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Estas seguro de inactivar este proveedor?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>