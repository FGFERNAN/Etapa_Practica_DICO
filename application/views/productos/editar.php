<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid form-container">
    <form action="<?= base_url('productos/actualizar/' . $producto->id_productos) ?>" method="post" class="row g-3 needs-validation" novalidate>
        <legend class="legend">Editar Producto</legend>
        <div class="col-md-6">
            <label for="nombre" class="form-label mi-label">Nombre</label>
            <input type="text" name="nombre" value="<?= set_value('nombre', $producto->nombre) ?>" class="form-control" id="nombre" minlength="3" maxlength="50" required>
            <?= form_error('nombre', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el nombre (minimo 3 caracteres).
            </div>
        </div>
        <div class="col-md-6">
            <label for="marca" class="form-label mi-label">Marca</label>
            <select id="marca" name="id_marca" class="form-select" required>
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($marca as $m): ?>
                    <option value="<?= set_value('id_marca', $m->id_marca)  ?>" <?= $producto->id_marca == $m->id_marca ? 'selected' : '' ?>><?= $m->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_marca', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Selecciones una marca.
            </div>
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label mi-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" minlength="15"><?= set_value('descripcion', $producto->descripcion)  ?></textarea>
            <div class="invalid-feedback">
                Minimo 15 caracteres.
            </div>
        </div>
        <div class="col-md-6">
            <label for="precio_venta" class="form-label mi-label">Precio de Venta</label>
            <input type="number" name="precio_venta" value="<?= set_value('precio_venta', $producto->precio_venta) ?>" step="0.01" min="1" placeholder="0.00" class="form-control" id="precio_venta" required>
            <?= form_error('precio_venta', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Debe ser un precio valido mayor que 0.
            </div>
        </div>
        <div class="col-6">
            <label for="stock" class="form-label mi-label">Stock</label>
            <input type="number" name="stock" value="<?= set_value('stock', $producto->stock)  ?>" min="1" step="1" placeholder="0" class="form-control" id="stock" readonly>
            <?= form_error('stock', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Debe ser un stock valido mayor que 0.
            </div>
        </div>
        <div class="col-6">
            <label for="imagen" class="form-label mi-label">Imagen</label>
            <input class="form-control" name="imagen" value="<?= $producto->imagen ?>" type="file" id="imagen">
        </div>
        <div class="col-md-6">
            <label for="categoria" class="form-label mi-label">Categoría</label>
            <select class="form-select" name="id_categorias" aria-label="Categoria" id="categoria" required>
                <option selected value="" disabled>Seleccionar</option>
                <?php foreach ($categorias as $c): ?>
                    <option value="<?= set_value('id_categorias', $c->id_categorias)  ?>" <?= $producto->id_categorias == $c->id_categorias ? 'selected' : '' ?>><?= $c->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_categorias', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Seleccione una categoria.
            </div>
        </div>
        <div class="col-md-4">
            <label for="proveedor" class="form-label mi-label">Proveedor Principal</label>
            <select id="proveedor" name="id_proveedores" class="form-select" required>
                <option selected value="" disabled>Seleccionar</option>
                <?php foreach ($proveedores as $pr): ?>
                    <option value="<?= set_value('id_proveedores', $pr->id_proveedores) ?>" <?= $producto->id_proveedores == $pr->id_proveedores ? 'selected' : '' ?>><?= $pr->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="proveedor_c" class="form-label mi-label">Proveedor Contingencia</label>
            <select id="proveedor_c" name="id_proveedores_contingencia" class="form-select">
                <option selected value="" disabled>Seleccionar</option>
                <?php foreach ($proveedores_c as $pr): ?>
                    <option value="<?= set_value('id_proveedores_contingencia', $pr->id_proveedores) ?>" <?= $producto->id_proveedores_contingencia == $pr->id_proveedores ? 'selected' : '' ?>><?= $pr->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="estado" class="form-label mi-label">Estado</label>
            <select id="estado" name="id_estado_producto" class="form-select" required>
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($estados as $e): ?>
                    <option value="<?= set_value('id_estado_producto', $e->id_estado_producto)  ?>" <?= $producto->id_estado_producto == $e->id_estado_producto ? 'selected' : '' ?>><?= $e->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_estado', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Seleccione un estado.
            </div>
        </div>
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary mt-3 mb-4 btn-guardar" type="submit">Guardar</button>
        </div>
    </form>
</div>


<?php $this->load->view('layout/footer'); ?>