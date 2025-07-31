<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- My Style CSS - Último para que tenga prioridad -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
</head>

<body>
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
            <ul class="nav justify-content-center nav-underline mi-navbar d-none d-md-flex">
                <li class="nav-item">
                    <a class="nav-link active mi-nav-link" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Categorias </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
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
                            <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-box me-3"></i></i>Productos</a>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-tags me-3"></i>Categorias
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>