<?php require_once('../layouts/app.php'); ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="../user/profile.php" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)==='/biblioteca/user/profile.php' ? 'breadcrumb-item active' : 'breadcrumb-item' ?>">Mi
                    perfil</a>
            </li>
            <li class="breadcrumb-item">
                <a href="../user/edit.php" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)=='/biblioteca/user/edit.php' ? 'breadcrumb-item active' : 'breadcrumb-item' ?>">Actualizar
                    Datos
                </a>
            </li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="container">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Mis Datos</h3>
                </div>
                <div class="form">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="nombres">Nombres</label>
                                    <?php if (!$_SESSION["nombre"]) { ?>
                                        <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                    <?php } ?>
                                    <p><?php echo $_SESSION["nombre"] ?></p>
                                </div>
                                <div class="col-6">
                                    <label for="nombres">Apellidos</label>
                                    <?php if (!$_SESSION["apellido"]) { ?>
                                        <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                    <?php } ?>
                                    <p><?php echo $_SESSION["apellido"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="cedula">Cédula</label>
                                    <?php if (!$_SESSION["cedula"]) { ?>
                                        <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                    <?php } ?>
                                    <p><?php echo $_SESSION["cedula"] ?></p>
                                </div>
                                <div class="col-6">
                                    <label for="email">Correo electrónico</label>
                                    <?php if (!$_SESSION["email"]) { ?>
                                        <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                    <?php } ?>
                                    <p><?php echo $_SESSION["email"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="telefono">Télefono</label>
                                    <?php if (!$_SESSION["telefono"]) { ?>
                                        <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                    <?php } ?>
                                    <p><?php echo $_SESSION["telefono"] ?></p>
                                </div>
                                <div class="col-6">
                                    <label for="genero">Género</label>
                                    <?php if (!$_SESSION["genero"]) { ?>
                                        <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                    <?php } ?>
                                    <p><?php echo $_SESSION["genero"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.wrapper -->
<?php require_once('../layouts/endapp.php'); ?>