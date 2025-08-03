<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid mi-container">
    <div class="d-flex align-items-center mi-header">
        <h2 class="mi-h2">Productos</h2>
        <button class="btn mi-btn ms-4 mb-2"><i class="fa-solid fa-plus me-1"></i></button>
    </div>
    <div class="table-responsive mt-4 mi-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Arroz</td>
                    <td>2.500</td>
                    <td>2</td>
                    <td>Grano</td>
                    <td>Diana</td>
                    <td>Activo</td>
                    <td>
                        <button class="btn btn-sm btn-secondary btn-editar"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger btn-eliminar"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>