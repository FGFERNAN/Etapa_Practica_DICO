<nav class="navbar navbar-dark  fixed-top menu-principal">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler mi-buton-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="profile-pic-container dropdown">
                <div class="profile-pic">
                    <img src="<?= base_url('assets/img/user.jpg') ?>" alt="Foto de perfil">
                </div>
                <a class="mi-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light">
                    <li>
                        <div class="dropdown-header">
                            <strong>Usuario Actual</strong>
                            <p class="text-muted mb-0">admin@sgsp.com</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mi Perfil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
        <h1 class="mi-h1 d-none d-md-flex">SGSP</h1>
        <?php $segmento = $this->uri->segment(1); ?>
        <ul class="nav justify-content-center nav-underline mi-navbar d-none d-md-flex">
            <li class="nav-item">
                <a class="nav-link <?= $segmento == '' ? 'active' : '' ?>" href="<?= base_url() ?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $segmento == 'productos' ? 'active' : '' ?>" href="<?= base_url('productos') ?>">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $segmento == 'categorias' ? 'active' : '' ?>" href="<?= base_url('categorias') ?>">Categorías</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ventas</a>
            </li>
        </ul>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title mi-title-h5" id="offcanvasMenuLabel">SGPS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active <?= $segmento == 'productos' ? 'active' : '' ?>" href="<?= base_url('productos') ?>" aria-current="page" href="#"><i class="fa-solid fa-box me-3"></i></i>Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-bag-shopping me-3"></i>Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-chart-line me-3"></i>Ventas</a>
                    </li>
                    <hr class="mi-hr">
                    <h5 class="mi-h5">Admin</h5>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-truck-fast me-3"></i></i>Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $segmento == 'categorias' ? 'active' : '' ?>" href="<?= base_url('categorias') ?>"><i class="fa-solid fa-tags me-3"></i>Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-users me-3"></i></i>Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-chart-pie me-3"></i>Reportes</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>