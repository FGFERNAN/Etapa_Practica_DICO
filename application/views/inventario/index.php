<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center mi-header">
            <h2 class="mi-h2">Inventario</h2>
        </div>
        <div class="dropdown mi-dropdown">
            <button class="btn btn-primary mi-filter dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-filter"></i> Filtrar
            </button>
            <ul class="dropdown-menu dropdown-menu-light">
                <?php foreach($categorias as $c): ?>
                <li><a class="dropdown-item" href="<?= base_url('inventario/filtrar/'. $c->id_categorias) ?>"><?= $c->nombre ?></a></li>
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
                    <th scope="col">Stock</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Actualización Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                    <?php
                        $text_class_badge = '';
                        $texto_estado = $p->estado_nombre;
                        switch ($texto_estado) {
                            case 'Agotado':
                                $text_class_badge = 'text-bg-danger';
                                break;
                            case 'Bajo Stock':
                                $text_class_badge = 'text-bg-warning';
                                break;
                            default:
                                $text_class_badge = 'text-bg-success';
                                break;
                        }
                    ?>
                    <tr>
                        <td><?= $p->nombre ?></td>
                        <td><?= $p->marca_nombre ?></td>
                        <td><?= $p->stock ?></td>
                        <td><?= $p->precio_venta ?></td>
                        <td><?= $p->categoria_nombre ?></td>
                        <td><span class="badge <?= $text_class_badge ?>"><?= $p->estado_nombre ?></span></td>
                        <td><?= $p->act_stock ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>