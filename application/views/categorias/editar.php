<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid form-container">
    <form action="<?= base_url('categorias/actualizar/' . $categoria->id_categorias) ?>" method="post" class="row g-3 needs-validation" novalidate>
        <input type="hidden" name="id_categorias" value="<?= $categoria->id_categorias ?>">
        <legend class="legend">Editar Categoría</legend>
        <div class="col-md-6">
            <label for="nombre" class="form-label mi-label">Nombre</label>
            <input type="text" name="nombre" value="<?= set_value('nombre', $categoria->nombre) ?>" class="form-control" id="nombre" minlength="3" maxlength="50" required>
            <?= form_error('nombre', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el nombre (minimo 3 caracteres).
            </div>
        </div>
        <div class="col-md-6">
            <label for="estado" class="form-label mi-label">Estado</label>
            <select id="estado" name="id_estado_categoria" class="form-select" required>
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($estados as $e): ?>
                    <option value="<?= set_value('id_estado', $e->id_estado_categoria)  ?>" <?= $categoria->id_estado_categoria == $e->id_estado_categoria ? 'selected' : '' ?>><?= $e->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="text-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            <?= form_error('id_estado', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Seleccione un estado.
            </div>
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label mi-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" minlength="15"><?= set_value('descripcion', $categoria->descripcion)  ?></textarea>
            <div class="invalid-feedback">
                Minimo 15 caracteres.
            </div>
        </div>
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary mt-3 mb-4 btn-guardar" type="submit">Guardar</button>
        </div>
    </form>
</div>


<?php $this->load->view('layout/footer'); ?>