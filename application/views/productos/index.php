<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center mi-header">
            <h2 class="mi-h2">Productos</h2>
            <button class="btn mi-btn ms-4 mb-2" onclick="location.href='<?= base_url('productos/crear'); ?>'"><i class="fa-solid fa-plus me-1"></i></button>
            <button class="btn mi-btn-papelera ms-3 mb-2" onclick="location.href='<?= base_url('productos/papelera'); ?>'"><i class="fa-solid fa-trash-can"></i></button>
        </div>
        <div class="dropdown mi-dropdown">
            <button class="btn btn-primary mi-filter dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-filter"></i> Filtrar
            </button>
            <ul class="dropdown-menu dropdown-menu-light">
                <?php foreach($categorias as $c): ?>
                <li><a class="dropdown-item" href="<?= base_url('productos/filtrar/'. $c->id_categorias) ?>"><?= $c->nombre ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-pr table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio Compra</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Proveedor P.</th>
                    <th scope="col">Proveedor C.</th>
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
                        <td><?= $p->categoria_nombre ?></td>
                        <td><?= $p->proveedor_nombre ?></td>
                        <td><?= $p->proveedor_nombre_c ?></td>
                        <td><?= $p->estado_nombre ?></td>
                        <td>
                            <button class="btn btn-sm btn-secondary btn-editar" onclick="window.location.href='<?= base_url('productos/editar/' . $p->id_productos) ?>'"><i class="fa-solid fa-pen"></i></button>
                            <a href="<?= base_url('productos/eliminar/' . $p->id_productos) ?>" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Estas seguro de eliminar este producto?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>