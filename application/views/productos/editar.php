<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid form-container">
    <form action="<?= base_url('productos/actualizar/' . $producto->id_productos) ?>" method="post" class="row g-3">
        <legend class="legend">Editar Producto</legend>
        <div class="col-md-6">
            <label for="nombre" class="form-label mi-label">Nombre</label>
            <input type="text" name="nombre" value="<?= $producto->nombre ?>" class="form-control" id="nombre" required>
        </div>
        <div class="col-md-6">
            <label for="marca" class="form-label mi-label">Marca</label>
            <select id="marca" name="id_marca" class="form-select" required>
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($marca as $m): ?>
                    <option value="<?= $m->id_marca ?>" <?= $producto->id_marca == $m->id_marca ? 'selected' : '' ?>><?= $m->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label mi-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?= $producto->descripcion ?></textarea>
        </div>
        <div class="col-md-6">
            <label for="precio_venta" class="form-label mi-label">Precio de Venta</label>
            <input type="number" name="precio_venta" value="<?= $producto->precio_venta ?>" step="0.01" min="0" placeholder="0.00" class="form-control" id="precio_venta" required>
        </div>
        <div class="col-6">
            <label for="stock" class="form-label mi-label">Stock</label>
            <input type="number" name="stock" value="<?= $producto->stock ?>" min="0" step="1" placeholder="0" class="form-control" id="stock" required>
        </div>
        <div class="col-12">
            <label for="imagen" class="form-label mi-label">Imagen</label>
            <input class="form-control" name="imagen" value="<?= $producto->imagen ?>" type="file" id="imagen">
        </div>
        <div class="col-md-4">
            <label for="categoria" class="form-label mi-label">Categoría</label>
            <select class="form-select" name="id_categorias" aria-label="Categoria" id="categoria">
                <option selected disabled>Seleccionar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="proveedor" class="form-label mi-label">Proveedor</label>
            <select id="proveedor" name="id_proveedores" class="form-select">
                <option selected disabled>Seleccionar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="estado" class="form-label mi-label">Estado</label>
            <select id="estado" name="id_estado" class="form-select">
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($estados as $e): ?>
                    <option value="<?= $e->id_estado ?>" <?= $producto->id_estado == $e->id_estado ? 'selected' : '' ?>><?= $e->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary mt-3 mb-4 btn-guardar" type="submit">Guardar</button>
        </div>
    </form>
</div>


<?php $this->load->view('layout/footer'); ?>