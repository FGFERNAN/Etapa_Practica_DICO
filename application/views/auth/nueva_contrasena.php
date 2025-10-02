<?php $this->load->view('layout/header'); ?>

<div class="container-fluid">
    <div class="row body-login">
        <div class="col-md-6 col-lg-4">
            <div class="card card-login mt-5">
                <div class="card-header text-center py-4">
                    <h3><i class="fas fa-shopping-cart me-2"></i>SISTEMA SUPERMERCADO</h3>
                    <p class="mb-0 mi-p">Nueva Contraseña</p>
                </div>
                <div class="card-body p-4">
                    <p class="">Ingrese la contraseña, la contraseña debe tener al entre 6 y 8 caracteres, al menos una mayúscula, una minúscula y un número.</p>
                    <form action="<?= base_url('auth/update_password') ?>" method="post" class="row g-3 needs-validation form-floating" novalidate>
                        <!-- Campo oculto para enviar el token -->
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" value="<?= set_value('contrasena') ?>" class="form-control form-control-login" id="password" placeholder="Password" name="contrasena" pattern="^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,8})\S$" minlength="6" maxlength="8" required>
                                    <label for="password">Nueva Contraseña</label>
                                </div>

                                <button class="btn btn-secondary btn-asignar" type="button" id="togglePassword1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" value="<?= set_value('passconf') ?>" class="form-control form-control-login" id="passconf" placeholder="Confirm Password" name="passconf" required>
                                    <label for="passconf">Confirmar Contraseña</label>
                                </div>

                                <button class="btn btn-secondary btn-asignar" type="button" id="togglePassword2">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('passconf'); ?>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-iniciar-sesion"><i class="fas fa-sign-in-alt me-2"></i>Actualizar Contraseña</button>
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