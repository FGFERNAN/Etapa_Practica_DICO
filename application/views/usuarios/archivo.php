<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="d-flex align-items-center">
                        <h2 class="mi-h2">Usuarios Inactivos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input id="buscar_usuario" class="form-control-custom me-2" type="search" placeholder="🔍 Buscar" aria-label="Search" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-4 mi-table">
                <table id="tabla_usuarios" class="table table-pr table-striped">
                    <thead>
                        <tr>
                            <th scope="col">N° Documento</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tipo Documento</th>
                            <th width="5%" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): ?>
                            <tr>
                                <td><?= $u->id_usuarios ?></td>
                                <td><?= $u->nombre ?></td>
                                <td><?= $u->apellidos ?></td>
                                <td><?= $u->email ?></td>
                                <td><?= $u->telefono ?></td>
                                <td><?= $u->rol_nombre ?></td>
                                <td><?= $u->estado_nombre ?></td>
                                <td><?= $u->tipo_documento_nombre ?></td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= base_url('usuarios/activar/'.$u->id_usuarios) ?>" class="btn btn-sm btn-secondary btn-editar" onclick="return confirm('¿Estas seguro de activar este usuarios nuevamente?')"><i class="fa-solid fa-check"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputBuscar = document.getElementById('buscar_usuario');
        const filasTabla = document.querySelectorAll('#tabla_usuarios tbody tr');

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