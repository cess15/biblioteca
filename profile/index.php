<?php require_once('../layouts/app.php'); ?>
<?php
require_once('../helpers/connect.php');
require_once('../helpers/helpers.php');
//Obtener toda la información de un usuario autenticado
$user = mysqli_query($con, "select * from usuarios where id_usuario='{$_SESSION['id']}'");
$row  = mysqli_fetch_array($user);

if($_SESSION['role_id']==2){
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
    $numberDevolucionById=getCantidadDevolucionById($con, $row['id_usuario']);
    
    mysqli_close($con);
}

if($_SESSION['role_id']==1){
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
                        <li class="breadcrumb-item"><a href="../profile/" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/biblioteca/profile/' ? 'breadcrumb-item active' : 'breadcrumb-item' ?>">Mi
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
                                                <?php if (!$row["nombre_personal"]) { ?>
                                                    <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                                <?php } ?>
                                                <p><?php echo $row["nombre_personal"] ?></p>
                                            </div>
                                            <div class="col-6">
                                                <label for="nombres">Apellidos</label>
                                                <?php if (!$row["apellido_personal"]) { ?>
                                                    <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                                <?php } ?>
                                                <p><?php echo $row["apellido_personal"] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="cedula">Cédula</label>
                                                <?php if (!$row["cedula"]) { ?>
                                                    <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                                <?php } ?>
                                                <p><?php echo $row["cedula"] ?></p>
                                            </div>
                                            <div class="col-6">
                                                <label for="email">Correo electrónico</label>
                                                <?php if (!$row["email"]) { ?>
                                                    <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                                <?php } ?>
                                                <p><?php echo $row["email"] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="telefono">Télefono</label>
                                                <?php if (!$row["telefono"]) { ?>
                                                    <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                                <?php } ?>
                                                <p><?php echo $row["telefono"] ?></p>
                                            </div>
                                            <div class="col-6">
                                                <label for="genero">Género</label>
                                                <?php if (!$row["genero"]) { ?>
                                                    <p><span class='badge badge-danger'>Actualice este dato</span></p>
                                                <?php } ?>
                                                <p><?php echo $row["genero"] ?></p>
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.wrapper -->
<?php require_once('../theme/lte/footer.php') ?>
<?php require_once('../layouts/endapp.php'); ?>
</body>

</html>