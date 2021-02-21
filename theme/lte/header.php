<nav class="main-header navbar navbar-expand navbar-dark navbar-green">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Account Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle mr-2"></i>
                <span class="float-right mb-1 text-light text-sm">
                    <?php echo $row["nombre_personal"] . ' ' . $row["apellido_personal"]; ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="../profile/" class="dropdown-item">
                    <i class="fa fa-user mr-2"></i> Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i><span class="text text-danger"> Cerrar sesión</span>
                    <form id="logout-form" action="../helpers/auth/logout.php" method="POST" style="display: none;">
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>