<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="../profile/" class="brand-link">
        <img src="../assets/images/logo-biblioteca.png" alt="Biblioteca logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-medium-light">Panel Administrativo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <?php if ($_SESSION["role_id"] == 1) { ?>
                    <li class="nav-item">
                        <a href="../user/" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/biblioteca/user/' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Usuarios
                                <span class="badge badge-info right">
                                    <?php echo $number[0] ?>
                                </span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../prestamos/" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/biblioteca/prestamos/' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Prestamos
                                <span class="badge badge-info right">
                                    <?php echo $numberPrestamos[0] ?>
                                </span>
                            </p>
                        </a>

                    </li>
                <?php } ?>
                <?php if ($_SESSION["role_id"] == 2) { ?>
                    <li class="nav-item">
                        <a href="../categorias/" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/biblioteca/categorias/' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Categorias
                                <span class="badge badge-info right">
                                    <?php echo $numberCategoria[0] ?>
                                </span>
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="../libros/" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/biblioteca/libros/' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>
                                Libros
                                <span class="badge badge-info right">
                                    <?php echo $numberLibros[0] ?>
                                </span>
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="../prestamos/" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/biblioteca/prestamos/' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>
                                Prestamos
                                <span class="badge badge-info right">
                                    <?php echo $numberPrestamosById[0] ?>
                                </span>
                            </p>
                        </a>

                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>