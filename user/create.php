    <?php require_once('../layouts/app.php'); ?>
    <?php if ($_SESSION["role_id"] == 1) { ?>
        <?php
        require_once('../helpers/connect.php');
        $user = mysqli_query($con, "select * from usuarios where id='{$_SESSION['id']}'");
        $row  = mysqli_fetch_array($user);
        $cantidadUsuarios = mysqli_query($con, "select count(*) from usuarios");
        $number  = mysqli_fetch_array($cantidadUsuarios);
        mysqli_close($con);
        ?>
        <!-- Navbar -->
        <?php require_once('../theme/lte/header.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once('../theme/lte/aside.php') ?>
        <!-- End Main Sidebar Container -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <section class="content">
                        <div class="container-fluid">
                            <?php if (isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Exito!</strong> <?= $_SESSION['success'] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> <?= $_SESSION['error'] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Nuevo Usuario</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="../helpers/user/create.php" method="POST">
                                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre">Nombres</label>
                                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombres">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="apellido">Apellidos</label>
                                                    <input type="text" name="apellido" class="form-control" placeholder="Ingrese apellidos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cedula">Cédula</label>
                                                    <input type="text" name="cedula" class="form-control" placeholder="Ingrese número de cédula">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Correo electrónico</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Ingrese un correo electrónico">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telefono">Télefono</label>
                                                    <input type="text" name="telefono" class="form-control" placeholder="Ingrese número de cédula">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="genero">Género</label>
                                                    <select name="genero" class="form-control">
                                                        <option selected disabled>-- Seleccione --</option>
                                                        <option value="Masculino">
                                                            Masculino</option>
                                                        <option value="Femenino">
                                                            Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary">Guardar datos</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php delete_session(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        </div>
        <!-- /.wrapper -->
        <?php require_once('../theme/lte/footer.php') ?>
        <?php require_once('../layouts/endapp.php'); ?>
        </body>

        </html>
    <?php } else { ?>
        <?php header('Location: ../user/profile.php'); ?>
    <?php } ?>