<?php $this->load->view('layout/header'); ?>

<div class="container-fluid">
    <div class="row body-login">
        <div class="col-md-6 col-lg-4">
            <div class="card card-login mt-5">
                <div class="card-header text-center py-4">
                    <h3><i class="fas fa-shopping-cart me-2"></i>SISTEMA SUPERMERCADO</h3>
                    <p class="mb-0 mi-p">Modificar Contraseña</p>
                </div>
                <div class="card-body p-4">
                    <p class="">Ingrese tu contraseña actual y posteriormente la nueva contraseña que deseas, no olvides confirmarla!</p>
                    <!-- Mostrar mensajes de éxito o error -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                            <div class="mt-2">Redirigiendo en <span id="countdown">5</span> segundos...</div>
                        </div>
                        <script>
                            let count = 5;
                            const countdown = document.getElementById('countdown');
                            const timer = setInterval(function() {
                                count--;
                                countdown.textContent = count;
                                if (count <= 0) {
                                    clearInterval(timer);
                                    window.location.href = '<?= base_url('inventario') ?>';
                                }
                            }, 1000);
                        </script>
                    <?php endif; ?>
                    <form action="<?= base_url('perfil/actualizar_contrasena') ?>" method="post" class="row g-3 needs-validation form-floating" novalidate>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" value="<?= set_value('contrasena') ?>" class="form-control form-control-login" id="password" placeholder="Password" name="contrasena" required>
                                    <label for="password">Contraseña Actual</label>
                                </div>

                                <button class="btn btn-secondary btn-asignar" type="button" id="togglePassword1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <?php if (!empty($error)) : ?>
                                <div class="invalid-feedback d-block">
                                    <?php echo $error; ?>
                                </div>
                            <?php else : ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" value="<?= set_value('nueva_contrasena') ?>" class="form-control form-control-login" id="nueva_contrasena" pattern="^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,8})\S$" placeholder="Confirm Password" name="nueva_contrasena" minlength="6" maxlength="8" required>
                                    <label for="nueva_contrasena">Nueva Contraseña</label>
                                </div>

                                <button class="btn btn-secondary btn-asignar" type="button" id="togglePassword2">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?php echo form_error('nueva_contrasena'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" value="<?= set_value('passconf') ?>" class="form-control form-control-login" id="passconf" placeholder="Confirm Password" name="passconf" required>
                                    <label for="passconf">Confirmar Contraseña</label>
                                </div>

                                <button class="btn btn-secondary btn-asignar" type="button" id="togglePassword3">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?php echo form_error('passconf'); ?>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-iniciar-sesion"><i class="fas fa-sign-in-alt me-2"></i>Cambiar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Mostrar/ocultar contraseña
    document.getElementById('togglePassword1').addEventListener('click', function() {
        const password = document.getElementById('password');
        const icon = this.querySelector('i');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    document.getElementById('togglePassword2').addEventListener('click', function() {
        const new_password = document.getElementById('nueva_contrasena');
        const icon = this.querySelector('i');

        if (new_password.type === 'password') {
            new_password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            new_password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    document.getElementById('togglePassword3').addEventListener('click', function() {
        const password_conf = document.getElementById('passconf');
        const icon = this.querySelector('i');

        if (password_conf.type === 'password') {
            password_conf.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            password_conf.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>

<?php $this->load->view('layout/footer'); ?>