<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="d-flex align-items-center">
                        <h2 class="mi-h2">Historial de Ventas</h2>
                        <button class="btn btn-success ms-4 mb-2" onclick="location.href='<?= base_url('ventas/facturar'); ?>'"><i class="fa-solid fa-store"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mi-filter" data-bs-toggle="modal" data-bs-target="#filterModal">
                        <i class="fa-solid fa-filter"></i> Fecha
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filtrar por Fecha</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('ventas/index') ?>" method="GET" class="row g-3 align-items-center mb-4">
                                        <div class="col-auto">
                                            <label for="fecha_inicio" class="form-label">Desde:</label>
                                            <input type="date" class="form-control-custom" id="fecha_inicio" name="fecha_inicio"
                                                value="<?= html_escape($this->input->get('fecha_inicio')) ?>">
                                        </div>
                                        <div class="col-auto">
                                            <label for="fecha_fin" class="form-label">Hasta:</label>
                                            <input type="date" class="form-control-custom" id="fecha_fin" name="fecha_fin"
                                                value="<?= html_escape($this->input->get('fecha_fin')) ?>">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-secondary btn-editar"><i class="fas fa-search"></i> Filtrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-4 mi-table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Compra</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Total</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ventas as $v): ?>
                            <tr>
                                <td><?= $v->id_ventas ?></td>
                                <td><?= $v->fecha_hora ?></td>
                                <td><?= $v->total ?></td>
                                <td><?= $v->usuario_nombre ?></td>
                                <td><?= $v->cliente ?></td>
                                <td>
                                    <button class="btn btn-sm btn-secondary btn-editar" onclick="window.location.href='<?= base_url('ventas/detalle/' . $v->id_ventas) ?>'"><i class="fa-solid fa-eye"></i></button>
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