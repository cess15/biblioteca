<?php require_once('../layouts/app.php'); ?>
<?php
require_once('../helpers/connect.php');
require_once('../helpers/helpers.php');
//Obtener toda la información de un usuario autenticado
$user = mysqli_query($con, "select * from usuarios where id_usuario='{$_SESSION['id']}'");
$row  = mysqli_fetch_array($user);
if ($_SESSION['role_id'] == 2) {
    require_once('../helpers/categorias/cantCategorias.php');
    require_once('../helpers/user/cantUsuarios.php');
    require_once('../helpers/prestamos/cantPrestamos.php');
    require_once('../helpers/libros/cantLibros.php');
    require_once('../helpers/clientes/cantClientes.php');
    //Numero de clientes existentes
    $numberClientes = getCantidadClientes($con);
    //Numeros de categorias existentes
    $numberCategoria = getCantidadCategorias($con);
    //Numeros de prestamos realizados por usuario
    $numberPrestamosById = getCantidadPrestamosById($con, $row['id_usuario']);
    //Cantidad de libros disponibles para emprestar
    $numberLibrosIsTrue = getCantidadLibrosIsTrue($con);
    //Cantidad de libros disponibles para su devolucion
    $numberLibrosIsFalse = getCantidadLibrosIsFalse($con);
    //Cantidad de devoluciones
    $numberDevolucionById = getCantidadDevolucionById($con, $row['id_usuario']);
    mysqli_close($con);
}

if ($_SESSION['role_id'] == 1) {
    require_once('../helpers/prestamos/cantPrestamos.php');
    require_once('../helpers/user/cantUsuarios.php');
    require_once('../helpers/libros/cantLibros.php');
    require_once('../helpers/clientes/cantClientes.php');
    //Numero de clientes existentes
    $numberClientes = getCantidadClientes($con);
    //Cantidad de usuarios con rol bibliotecario
    $numberUser = getCantidadUsuarios($con);
    $numberPrestamos = getCantidadPrestamos($con);
    $numberDevolucion = getCantidadDevolucion($con);
    //Numero de libros existentes
    $numberLibros = getCantidadLibros($con);
    mysqli_close($con);
}
?>
<!-- Navbar -->
<?php require_once('../theme/lte/header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php require_once('../theme/lte/aside.php') ?>
<!-- End Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../profile/" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/biblioteca/profile/' ? 'breadcrumb-item active' : 'breadcrumb-item' ?>">Mi
                                perfil</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="../profile/edit.php" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/biblioteca/profile/edit.php' ? 'breadcrumb-item active' : 'breadcrumb-item' ?>">Actualizar
                                Datos
                            </a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Mis Datos</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="../helpers/perfil/edit.php" method="POST">
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombres</label>
                                                <input type="text" name="nombre" class="form-control" required value="<?php echo $row['nombre_personal'] ?>" placeholder="<?php echo $row['nombre_personal'] != '' ? '' : 'Ingrese nombres' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="apellido">Apellidos</label>
                                                <input type="text" name="apellido" class="form-control" required value="<?php echo $row['apellido_personal'] ?>" placeholder="<?php echo $row['apellido_personal'] != '' ? '' : 'Ingrese apellidos' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cedula">Cédula</label>
                                                <input type="text" name="cedula" class="form-control" required value="<?php echo $row['cedula'] ?>" placeholder="<?php echo $row['cedula'] != '' ? '' : 'Ingrese número de cédula' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Correo electrónico</label>
                                                <input type="email" name="email" class="form-control" required value="<?php echo $row['email'] ?>" placeholder="<?php echo $row['email'] != '' ? '' : 'Ingrese un correo electrónico' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telefono">Télefono</label>
                                                <input type="text" name="telefono" class="form-control" required value="<?php echo $row['telefono'] ?>" placeholder="<?php echo $row['telefono'] != '' ? '' : 'Ingrese número de cédula' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="genero">Género</label>
                                                <select name="genero" class="form-control">
                                                    <option selected disabled>-- Seleccione --</option>
                                                    <option value="Masculino" <?php echo $row['genero'] === 'Masculino' ? 'selected' : '' ?>>
                                                        Masculino</option>
                                                    <option value="Femenino" <?php echo $row['genero'] === 'Femenino' ? 'selected' : '' ?>>
                                                        Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">Nombre de usuario</label>
                                                <input type="text" name="username" class="form-control" required value="<?php echo $row['nombre_usuario'] ?>" placeholder="<?php echo $row['nombre_usuario'] != '' ? '' : 'Ingrese nombre de usuario' ?>">
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

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Mis credenciales</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="../helpers/perfil/editCredentials.php" method="POST">
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="newpassword">Nueva contraseña(*)</label>
                                                <input name="newpassword" type="password" class="form-control" required placeholder="Contraseña" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="repassword">Repita contraseña(*)</label>
                                                <input name="repassword" class="form-control" type="password" required autocomplete="newpassword" placeholder="Repita contraseña">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Contraseña actual(*)</label>
                                                <input name="password" type="password" class="form-control" is-invalid placeholder="Contraseña actual" />
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-danger"><em>Nota: <span class="text-dark">Para cambiar la contraseña es necesario
                                                        verificar su contraseña actual</span></em></p>
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
                </div>
        </div>
        </section>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.wrapper -->
<?php require_once('../theme/lte/footer.php') ?>
<?php require_once('../layouts/endapp.php'); ?>
</body>

</html>