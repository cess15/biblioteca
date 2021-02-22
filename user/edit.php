<?php require_once('../layouts/app.php'); ?>
<?php if ($_SESSION['role_id'] == 1) {  ?>
    <?php require_once('../helpers/connect.php');
    //Obtener toda la información de un usuario autenticado
    $user = mysqli_query($con, "select * from usuarios where id_usuario='{$_SESSION['id']}'");
    $row  = mysqli_fetch_array($user);
    require_once('../helpers/user/getUser.php');
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
    ?>
    <!-- Navbar -->

    <?php require_once('../theme/lte/header.php') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php require_once('../helpers/connect.php'); ?>
    <?php require_once('../theme/lte/aside.php') ?>
    <!-- End Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container">
                <?php if (isset($_GET['id'])) { ?>
                    <?php $user = getUser($con, $_GET['id']); ?>
                    <?php mysqli_close($con); ?>
                <?php } ?>
                <?php if ($user == null) { ?>
                    <h3>No se encontro al usuario</h3>
                <?php } else { ?>
                    <div class="row mb-3 mr-5 mt-3">
                        <div class="col-sm-2">
                            <a href="../user/"><button type="button" class="btn btn-info float-left"><i class="fas fa-arrow-alt-circle-left"></i>Regresar</button></a>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del usuario</h3>
                        </div>
                        <div class="card-body">
                            <form action="../helpers/user/edit.php?id=<?= $_GET['id'] ?>" method="POST">
                                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre_personal">Nombres</label>
                                            <input type="text" name="nombre_personal" class="form-control" value="<?php echo $user['nombre_personal'] ?>" placeholder="<?php echo $user['nombre_personal'] != '' ? '' : 'Ingrese nombres' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="apellido_personal">Apellidos</label>
                                            <input type="text" name="apellido_personal" class="form-control" value="<?php echo $user['apellido_personal'] ?>" placeholder="<?php echo $user['apellido_personal'] != '' ? '' : 'Ingrese apellidos' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Télefono</label>
                                            <input type="text" name="telefono" class="form-control" value="<?php echo $user['telefono'] ?>" placeholder="<?php echo $user['telefono'] != '' ? '' : 'Ingrese número de cédula' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="genero">Género</label>
                                            <select name="genero" class="form-control">
                                                <option selected disabled>-- Seleccione --</option>
                                                <option value="Masculino" <?php echo $user['genero'] === 'Masculino' ? 'selected' : '' ?>>
                                                    Masculino</option>
                                                <option value="Femenino" <?php echo $user['genero'] === 'Femenino' ? 'selected' : '' ?>>
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
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
    </div>
    <?php require_once('../theme/lte/footer.php') ?>
    <?php require_once('../layouts/endapp.php'); ?>
    </body>

    </html>
<?php } else { ?>
    <?php header('Location: ../profile/'); ?>
<?php } ?>