<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="d-flex">
                        <h2 class="mi-h2">Operaciones</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <div class="container-fluid ms-3">
                        <form class="d-flex" role="search">
                            <input id="buscar_usuario" class="form-control-custom me-2" type="search" placeholder="🔍 Buscar" aria-label="Search" />
                        </form>
                    </div>
                </div>
                <div class="col-md-1">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mi-filter ms-1" data-bs-toggle="modal" data-bs-target="#filterModal">
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
                                    <form action="<?= base_url('reportes/index') ?>" method="GET" class="row g-3 align-items-center mb-4">
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
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary mi-filter dropdown-toggle ms-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-filter"></i> Tipo Operación
                        </button>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <?php foreach ($tipo_operacion as $tp): ?>
                                <li><a class="dropdown-item" href="<?= base_url('reportes/filtrar/' . htmlspecialchars($tp['tipo_operacion'])) ?>"><?= htmlspecialchars($tp['tipo_operacion']) ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="<?= base_url('reportes/exportar_pdf?' . http_build_query($_GET)) ?>" class="btn btn-secondary btn-asignar ms-5" target="_blank"><i class="fa-solid fa-download"></i></a>
                </div>
            </div>
            <div class="table-responsive mt-4 mi-table">
                <table id="tabla_operaciones" class="table table-pr table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tipo Operación</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($operaciones as $o): ?>
                            <tr>
                                <td><?= $o->tipo_operacion ?></td>
                                <td><?= $o->descripcion ?></td>
                                <td><?= $o->fecha_hora ?></td>
                                <td><?= $o->usuario_nombre ?></td>
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
        const inputBuscar = document.getElementById('buscar_usuario');
        const filasTabla = document.querySelectorAll('#tabla_operaciones tbody tr');

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