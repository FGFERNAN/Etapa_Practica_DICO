<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid form-container">
    <form class="row g-3">
        <legend class="legend">Editar Producto</legend>
        <div class="col-md-6">
            <label for="nombre" class="form-label mi-label">Nombre</label>
            <input type="text" class="form-control" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="precio" class="form-label mi-label">Precio</label>
            <input type="number" step="0.01" min="0" placeholder="0.00" class="form-control" id="precio">
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label mi-label">Descripción</label>
            <textarea class="form-control" id="descripcion" rows="3"></textarea>
        </div>
        <div class="col-6">
            <label for="stock" class="form-label mi-label">Stock</label>
            <input type="number" name="stock" min="0" step="1" placeholder="0" class="form-control" id="stock">
        </div>
        <div class="col-6">
            <label for="imagen" class="form-label mi-label">Imagen</label>
            <input class="form-control" type="file" id="imagen">
        </div>
        <div class="col-md-4">
            <label for="categoria" class="form-label mi-label">Categoría</label>
            <select class="form-select" aria-label="Categoria" id="categoria">
                <option selected disabled>Seleccionar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="proveedor" class="form-label mi-label">Proveedor</label>
            <select id="proveedor" class="form-select">
                <option selected disabled>Seleccionar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="estado" class="form-label mi-label">Estado</label>
            <select id="estado" class="form-select">
                <option selected disabled>Seleccionar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary mt-3 mb-4 btn-guardar" type="submit">Guardar</button>
        </div>
    </form>
</div>


<?php $this->load->view('layout/footer'); ?>