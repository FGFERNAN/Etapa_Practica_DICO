<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid form-container">
    <form action="<?= base_url('proveedores/actualizar/' . $proveedor->id_proveedores) ?>" method="post" class="row g-3 needs-validation" novalidate>
        <input type="hidden" name="id_proveedores" value="<?= $proveedor->id_proveedores ?>">
        <legend class="legend">Editar Proveedor</legend>
        <div class="col-md-6">
            <label for="nombre" class="form-label mi-label">Nombre <span style="color: red;">*</span></label>
            <input type="text" name="nombre" value="<?= set_value('nombre', $proveedor->nombre) ?>" class="form-control" id="nombre" minlength="3" maxlength="50" required>
            <?= form_error('nombre', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el nombre (minimo 3 caracteres).
            </div>
        </div>
        <div class="col-md-6">
            <label for="contacto" class="form-label mi-label">Contacto <span style="color: red;">*</span></label>
            <input type="email" name="contacto" value="<?= set_value('contacto', $proveedor->contacto) ?>" class="form-control" id="contacto" required>
            <?= form_error('contacto', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el contacto (correo electronico).
            </div>
        </div>
        <div class="col-md-6">
            <label for="telefono" class="form-label mi-label">Telefono <span style="color: red;">*</span></label>
            <input type="tel" name="telefono" value="<?= set_value('telefono', $proveedor->telefono) ?>" class="form-control" pattern="[0-9]{10}" placeholder="3001234567" id="telefono" title="Ingrese 10 dígitos sin espacios" required>
            <?= form_error('telefono', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el numero de telefono (10 digitos).
            </div>
        </div>
        <div class="col-md-6">
            <label for="empresa" class="form-label mi-label">Empresa <span style="color: red;">*</span></label>
            <input type="text" name="empresa" value="<?= set_value('empresa', $proveedor->empresa) ?>" class="form-control" id="empresa" minlength="3" maxlength="100" required>
            <?= form_error('empresa', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el nombre de la empresa (minimo 3 caracteres).
            </div>
        </div>
        <div class="col-6">
            <label for="nit" class="form-label mi-label">NIT <span style="color: red;">*</span></label>
            <input type="tel" value="<?= set_value('nit', $proveedor->nit) ?>" name="nit" pattern="[0-9]{9}" placeholder="830136162" class="form-control" title="Ingrese 9 dígitos sin espacios" id="nit" required>
            <?= form_error('nit', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el NIT (9 digitos).
            </div>
        </div>
        <div class="col-md-6">
            <label for="estado" class="form-label mi-label">Estado <span style="color: red;">*</span></label>
            <select id="estado" name="id_estado_proveedor" class="form-select" required>
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($estados as $e): ?>
                    <option value="<?= set_value('id_estado_proveedor', $e->id_estado_proveedor)  ?>" <?= $proveedor->id_estado_proveedor == $e->id_estado_proveedor ? 'selected' : '' ?>><?= $e->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="text-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            <?= form_error('id_estado_proveedor', '<div class="text-danger">', '</div>') ?>
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