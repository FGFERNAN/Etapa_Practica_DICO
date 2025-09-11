<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container-fluid form-container">
    <form action="<?= base_url('usuarios/guardar') ?>" method="post" class="row g-3 needs-validation" novalidate>
        <legend class="legend">Crear Usuario</legend>
        <div class="col-md-6">
            <label for="nombre" class="form-label mi-label">Nombre</label>
            <input type="text" name="nombre" value="<?= set_value('nombre') ?>" class="form-control" id="nombre" minlength="3" maxlength="50" required>
            <?= form_error('nombre', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el nombre (minimo 3 caracteres).
            </div>
        </div>
        <div class="col-md-6">
            <label for="apellidos" class="form-label mi-label">Apellidos</label>
            <input type="text" name="apellidos" value="<?= set_value('apellidos') ?>" class="form-control" id="apellidos" minlength="3" maxlength="50" required>
            <?= form_error('apellidos', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el nombre (minimo 3 caracteres).
            </div>
        </div>
        <div class="col-12">
            <label for="email" class="form-label mi-label">Email</label>
            <input type="email" value="<?= set_value('email') ?>" class="form-control" name="email" id="email" minlength="15" required></input>
            <?= form_error('email', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el email minimo 15 caracteres.
            </div>
        </div>
        <div class="col-6">
            <label for="telefono" class="form-label mi-label">Telefono</label>
            <input type="tel" value="<?= set_value('telefono') ?>" name="telefono" pattern="[0-9]{10}" placeholder="3107847573" class="form-control" minlength="10" maxlength="10" title="Ingrese 10 dígitos sin espacios" id="telefono">
            <?= form_error('telefono', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                (10 digitos).
            </div>
        </div>
        <div class="col-6">
            <label for="password" class="form-label mi-label">Contraseña</label>
            <input type="password" value="<?= set_value('contrasena') ?>" name="contrasena" pattern="^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,8})\S$" class="form-control" id="password" minlength="6" maxlength="8" required>
            <?= form_error('contrasena', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese la contraseña, la contraseña debe tener al entre 6 y 8 caracteres, al menos una mayúscula, una minúscula y un número.
            </div>
        </div>
        <div class="col-md-6">
            <label for="roles" class="form-label mi-label">Roles</label>
            <select id="roles" name="id_roles" class="form-select" required>
                <option value="" selected disabled>Seleccionar</option>
                <?php foreach ($roles as $r): ?>
                    <option value="<?= $r->id_roles ?>"><?= $r->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_roles', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Selecciones un rol.
            </div>
        </div>
        <div class="col-md-6">
            <label for="estado" class="form-label mi-label">Estado</label>
            <select class="form-select" name="id_estado_usuario" aria-label="Estado" id="estado" required>
                <option selected value="" disabled>Seleccionar</option>
                <?php foreach ($estados as $e): ?>
                    <option value="<?= $e->id_estado_usuario ?>"><?= $e->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_estado_usuario', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Seleccione un estado.
            </div>
        </div>
        <div class="col-md-6">
            <label for="tipo_documento" class="form-label mi-label">Tipo Documento</label>
            <select class="form-select" name="id_tipo_documento" aria-label="Estado" id="tipo_documento" required>
                <option selected value="" disabled>Seleccionar</option>
                <?php foreach ($documentos as $d): ?>
                    <option value="<?= $d->id_tipo_documento ?>"><?= $d->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_tipo_documento', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Seleccione un tipo de documento.
            </div>
        </div>
        <div class="col-6">
            <label for="id" class="form-label mi-label">N° Documento</label>
            <input type="tel" value="<?= set_value('id_usuarios') ?>" name="id_usuarios" pattern="[0-9]{10}" placeholder="1030533364" class="form-control" minlength="10" maxlength="10" title="Ingrese 10 dígitos sin espacios" id="id" required>
            <?= form_error('id_usuarios', '<div class="text-danger">', '</div>') ?>
            <div class="invalid-feedback">
                Ingrese el numero de documento(10 digitos).
            </div>
        </div>
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary mt-3 mb-4 btn-guardar" type="submit">Guardar</button>
        </div>
    </form>
</div>

<?php $this->load->view('layout/footer'); ?>