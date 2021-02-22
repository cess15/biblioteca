<?php require_once('../layouts/app.php'); ?>
<?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {  ?>
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
        require_once('../helpers/clientes/getCliente.php');
        //Numero de clientes existentes
        $numberClientes = getCantidadClientes($con);
        //Numero de libros existentes
        $numberLibros = getCantidadLibros($con);
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
    }

    if ($_SESSION['role_id'] == 1) {
        require_once('../helpers/prestamos/cantPrestamos.php');
        require_once('../helpers/user/cantUsuarios.php');
        require_once('../helpers/libros/cantLibros.php');
        require_once('../helpers/clientes/cantClientes.php');
        require_once('../helpers/clientes/getCliente.php');
        //Numero de clientes existentes
        $numberClientes = getCantidadClientes($con);
        //Cantidad de usuarios con rol bibliotecario
        $numberUser = getCantidadUsuarios($con);
        $numberPrestamos = getCantidadPrestamos($con);
        $numberDevolucion = getCantidadDevolucion($con);
        //Numero de libros existentes
        $numberLibros = getCantidadLibros($con);
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
        <section class="content">
            <div class="container">
                <?php if (isset($_GET['id'])) { ?>
                    <?php $cliente = getCliente($con, $_GET['id']); ?>
                    <?php mysqli_close($con); ?>
                <?php } ?>
                <?php if ($cliente == null) { ?>
                    <h3>No se encontro al libro</h3>
                <?php } else { ?>
                    <div class="row mb-3 mr-5 mt-3">
                        <div class="col-sm-2">
                            <a href="../clientes/"><button type="button" class="btn btn-info float-left"><i class="fas fa-arrow-alt-circle-left"></i>Regresar</button></a>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del cliente</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="../helpers/clientes/edit.php?id=<?= $_GET['id'] ?>" method="POST">
                                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cedula">Cédula</label>
                                            <input type="text" name="cedula" class="form-control" value="<?= $cliente['cedula'] ?>" required placeholder="Ingrese cedula">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad</label>
                                            <input type="text" name="ciudad" class="form-control" value="<?= $cliente['ciudad'] ?>" required placeholder="Ingrese ciudad">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre_cliente">Nombres</label>
                                            <input type="text" name="nombre_cliente" class="form-control" value="<?= $cliente['nombre_cliente'] ?>" required placeholder="Ingrese nombres">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="apellido_cliente">Apellidos</label>
                                            <input type="text" name="apellido_cliente" class="form-control" value="<?= $cliente['apellido_cliente'] ?>" required placeholder="Ingrese apellidos">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="celular">Télefono</label>
                                            <input type="text" name="celular" class="form-control" value="<?= $cliente['celular'] ?>" required placeholder="Ingrese celular">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo_electronico">Correo electrónico</label>
                                            <input type="email" name="correo_electronico" class="form-control" value="<?= $cliente['correo_electronico'] ?>" required placeholder="Ingrese un correo electrónico">
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