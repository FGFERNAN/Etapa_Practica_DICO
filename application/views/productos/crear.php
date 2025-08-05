<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid form-container">
    <form action="<?= base_url('productos/guardar') ?>" method="post" class="row g-3">
        <legend class="legend">Crear Producto</legend>
        <div class="col-md-6">
            <label for="nombre" class="form-label mi-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="col-md-6">
            <label for="precio" class="form-label mi-label">Precio</label>
            <input type="number" name="precio" step="0.01" min="0" placeholder="0.00" class="form-control" id="precio" required>
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label mi-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
        </div>
        <div class="col-6">
            <label for="stock" class="form-label mi-label">Stock</label>
            <input type="number" name="stock" min="0" step="1" placeholder="0" class="form-control" id="stock">
        </div>
        <div class="col-6">
            <label for="imagen" class="form-label mi-label">Imagen</label>
            <input class="form-control" name="imagen" type="file" id="imagen">
        </div>
        <div class="col-md-4">
            <label for="categoria" class="form-label mi-label">Categoría</label>
            <select class="form-select" name="categoriasID" aria-label="Categoria" id="categoria">
                <option selected disabled>Seleccionar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="proveedor" class="form-label mi-label">Proveedor</label>
            <select id="proveedor" name="proveedoresID" class="form-select">
                <option selected disabled>Seleccionar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="estado" class="form-label mi-label">Estado</label>
            <select id="estado" name="estadoID" class="form-select" required>
                <option selected disabled>Seleccionar</option>
                <?php foreach ($estados as $e): ?>
                    <option value="<?= $e->id ?>"><?= $e->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary mt-3 mb-4 btn-guardar" type="submit">Guardar</button>
        </div>
    </form>
</div>

<?php $this->load->view('layout/footer'); ?>