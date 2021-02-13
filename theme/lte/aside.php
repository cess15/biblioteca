<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="profile.php" class="brand-link">
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
                        <a href="../user/" class="nav-link active">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Usuarios
                                <span class="badge badge-info right">
                                <?php echo $number[0] ?>
                                </span>
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <?php if ($_SESSION["role_id"] == 2) { ?>
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Widgets
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    <?php } ?>
                </li>

                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>