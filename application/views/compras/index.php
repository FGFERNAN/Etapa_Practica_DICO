<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="d-flex align-items-center">
                        <h2 class="mi-h2">Historial de Compras</h2>
                        <button class="btn btn-success ms-4 mb-2" onclick="location.href='<?= base_url('compras/realizar'); ?>'"><i class="fa-solid fa-store"></i></button>
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
                                    <form action="<?= base_url('compras/index') ?>" method="GET" class="row g-3 align-items-center mb-4">
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
                            <th scope="col">Proveedor</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($compras as $c): ?>
                            <tr>
                                <td><?= $c->id_compras ?></td>
                                <td><?= $c->fecha_hora ?></td>
                                <td><?= $c->total ?></td>
                                <td><?= $c->proveedor_nombre ?></td>
                                <td><?= $c->usuario_nombre ?></td>
                                <td>
                                    <button class="btn btn-sm btn-secondary btn-editar" onclick="window.location.href='<?= base_url('compras/detalle/' . $c->id_compras) ?>'"><i class="fa-solid fa-eye"></i></button>
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