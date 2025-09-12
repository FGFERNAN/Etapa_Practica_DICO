<?php $this->load->view('layout/header'); ?>

<div class="container-fluid">
    <div class="row body-login">
        <div class="col-md-6 col-lg-4">
            <div class="card card-login mt-5">
                <div class="card-header text-center py-4">
                    <h3><i class="fas fa-shopping-cart me-2"></i>SISTEMA SUPERMERCADO</h3>
                    <p class="mb-0 mi-p">Iniciar Sesión</p>
                </div>
                <div class="card-body p-4">
                    <?php // Mostrar errores de validación del servidor
                    if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('auth/verificar') ?>" method="post" class="row g-3 needs-validation form-floating" novalidate>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control form-control-login" id="email" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <?php // Mostrar mensaje de error flash
                            if ($this->session->flashdata('info')): ?>
                                <div class="invalid-feedback d-block">
                                    <?php echo $this->session->flashdata('info'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control form-control-login" id="password" placeholder="Password" name="contrasena" required>
                                    <label for="password">Contraseña</label>
                                </div>

                                <button class="btn btn-secondary btn-asignar" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <?php // Mostrar mensaje de error flash
                            if ($this->session->flashdata('error')): ?>
                                <div class="invalid-feedback d-block">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-iniciar-sesion"><i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Mostrar/ocultar contraseña
    document.getElementById('togglePassword').addEventListener('click', function() {
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
</script>

<?php $this->load->view('layout/footer'); ?>