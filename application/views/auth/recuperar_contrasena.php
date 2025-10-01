<?php $this->load->view('layout/header'); ?>

<div class="container-fluid">
    <div class="row body-login">
        <div class="col-md-6 col-lg-4">
            <div class="card card-login mt-5">
                <div class="card-header text-center py-4">
                    <h3><i class="fas fa-shopping-cart me-2"></i>SISTEMA SUPERMERCADO</h3>
                    <p class="mb-0 mi-p">Recuperar Contraseña</p>
                </div>
                <div class="card-body p-4">
                    <p>Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>
                    <!-- Mostrar mensajes de éxito o error -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('auth/send_recovery_link') ?>" method="post" class="row g-3 needs-validation form-floating" novalidate>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control form-control-login" id="email" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-iniciar-sesion"></i>Enviar Enlace</button>
                        </div>
                        <div class="text-center mt-2">
                            <a class="link-inicio-sesion" href="<?= base_url('login') ?>">Volver a Inicio de Sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('layout/footer'); ?>