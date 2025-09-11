<?php $this->load->view('layout/header'); ?>

<div class="container-fluid container-login">
    <div class="row body-login">
        <div class="col-md-6 col-lg-4">
            <div class="card mt-5">
                <div class="card-header text-center py-4">
                    <h3><i class="fas fa-shopping-cart me-2"></i>Sistema Supermercado</h3>
                    <p class="mb-0">Iniciar Sesión</p>
                </div>
                <div class="card-body p-4">
                    <?php // Mostrar mensaje de error flash
                    if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('auth/login') ?>" method="post" class="row g-3 needs-validation form-floating" novalidate>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="contrasena" placeholder="Password" name="contrasena" required>
                                    <label for="contrasena">Contraseña</label>
                                </div>
                                <button class="btn btn-secondary btn-asignar" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-eliminar"><i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>