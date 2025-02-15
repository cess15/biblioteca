    <?php require_once('../layouts/app.php'); ?>
    <?php if ($_SESSION["role_id"] == 1) { ?>
        <?php
        require_once('../helpers/connect.php');
        //Obtener toda la información de un usuario autenticado
        $user = mysqli_query($con, "select * from usuarios where id_usuario='{$_SESSION['id']}'");
        $row  = mysqli_fetch_array($user);
        require_once('../helpers/prestamos/cantPrestamos.php');
        require_once('../helpers/user/cantUsuarios.php');
        require_once('../helpers/libros/cantLibros.php');
        require_once('../helpers/clientes/cantClientes.php');
        //Cantidad de usuarios con rol bibliotecario
        $numberUser = getCantidadUsuarios($con);
        $numberPrestamos = getCantidadPrestamos($con);
        $numberDevolucion = getCantidadDevolucion($con);
        //Numero de libros existentes
        $numberLibros = getCantidadLibros($con);
        //Numero de clientes existentes
        $numberClientes = getCantidadClientes($con);
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
                        <div class="container">
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
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <a href="../user/" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span class="ml-2">Regresar</span></i></a>
                                </div>
                            </div>
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
                                                    <label for="nombre_personal">Nombres</label>
                                                    <input type="text" name="nombre_personal" class="form-control" required placeholder="Ingrese nombres">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="apellido_personal">Apellidos</label>
                                                    <input type="text" name="apellido_personal" class="form-control" required placeholder="Ingrese apellidos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cedula">Cédula</label>
                                                    <input type="text" name="cedula" class="form-control" required placeholder="Ingrese número de cédula">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Correo electrónico</label>
                                                    <input type="email" name="email" class="form-control" required placeholder="Ingrese un correo electrónico">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telefono">Télefono</label>
                                                    <input type="text" name="telefono" class="form-control" required placeholder="Ingrese télefono">
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
                                                <div class="form-group">
                                                    <label for="username">Nombre de usuario</label>
                                                    <input type="text" name="username" class="form-control" required placeholder="Ingrese nombre de usuario">
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
        <?php header('Location: ../profile/'); ?>
    <?php } ?>