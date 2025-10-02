<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="d-flex">
                        <h2 class="mi-h2">Inventario</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input id="buscar_producto" class="form-control-custom me-2" type="search" placeholder="🔍 Buscar" aria-label="Search" />
                        </form>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary mi-filter dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-filter"></i> Filtrar
                        </button>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <?php foreach ($categorias as $c): ?>
                                <li><a class="dropdown-item" href="<?= base_url('inventario/filtrar/' . $c->id_categorias) ?>"><?= $c->nombre ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-4 mi-table">
                <table id="tabla_productos" class="table table-pr table-striped">
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
            <!-- ¡AQUÍ SE MUESTRA LA PAGINACIÓN! -->
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <?php echo $links; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputBuscar = document.getElementById('buscar_producto');
        const filasTabla = document.querySelectorAll('#tabla_productos tbody tr');

        inputBuscar.addEventListener('input', function() {
            const valorBusqueda = this.value.toLowerCase();

            filasTabla.forEach(function(fila) {
                const textoFila = fila.textContent.toLowerCase();

                if (textoFila.includes(valorBusqueda)) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        });
    });
</script>

<?php $this->load->view('layout/footer'); ?>