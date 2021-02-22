<?php require_once('../layouts/app.php'); ?>
<?php if ($_SESSION["role_id"] == 2) { ?>
    <?php
    require_once('../helpers/connect.php');
    require_once('../helpers/helpers.php');
    //Obtener toda la información de un usuario autenticado
    $user = mysqli_query($con, "select * from usuarios where id_usuario='{$_SESSION['id']}'");
    $row  = mysqli_fetch_array($user);
    require_once('../helpers/categorias/cantCategorias.php');
    require_once('../helpers/user/cantUsuarios.php');
    require_once('../helpers/prestamos/cantPrestamos.php');
    require_once('../helpers/libros/cantLibros.php');
    require_once('../helpers/clientes/cantClientes.php');
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
    //Obtener clientes quienes no hayan realizado prestamos
    $clientes = getClientesEstadoIsTrue($con);
    //Obtener libros quienes no hayan realizado prestamos
    $libros = getLibrosEstadoIsTrue($con);
    //Cantidad de devoluciones
    $numberDevolucionById=getCantidadDevolucionById($con, $row['id_usuario']);
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
                                <a href="../prestamos/" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span class="ml-2">Regresar</span></i></a>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Nuevo Prestamo</h3>
                            </div>
                            <div class="card-body">
                                <form action="../helpers/prestamos/return.php" method="POST">
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_id">Clientes</label>
                                                <select name="cliente_id" class="form-control">
                                                    <option disabled>-- Seleccione --</option>
                                                    <?php foreach ($clientes as $cliente) { ?>
                                                        <option value="<?= $cliente['id_cliente'] ?>"><?php echo $cliente['nombre_cliente'] . ' ' . $cliente['apellido_cliente'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="libro_id">Libros</label>
                                                <select name="libro_id" class="form-control">
                                                    <option disabled>-- Seleccione --</option>
                                                    <?php foreach ($libros as $libro) { ?>
                                                        <option value="<?= $libro['id_libro'] ?>"><?= $libro['nombre_libro'] ?></option>
                                                    <?php } ?>
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
    </div>
    <?php require_once('../theme/lte/footer.php') ?>
    <?php require_once('../layouts/endapp.php'); ?>
    </body>

    </html>
<?php } else { ?>
    <?php header('Location: ../profile/'); ?>
<?php } ?>