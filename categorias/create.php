<?php require_once('../layouts/app.php'); ?>
<?php if ($_SESSION['role_id'] == 2) {  ?>
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
    //Numero de libros existentes
    $numberLibros = getCantidadLibros($con);
    //Numeros de categorias existentes
    $numberCategoria = getCantidadCategorias($con);
    $numberPrestamosById = getCantidadPrestamosById($con,$row['id_usuario']);
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
            <div class="container">
                <section class="content" style="margin-top: 100px; margin-left:20%;width:50%;">
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
                                    <a href="../categorias/" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span class="ml-2">Regresar</span></i></a>
                                </div>
                            </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Nueva Categoria</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="../helpers/categorias/create.php" method="POST">
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre de categoría</label>
                                                <input type="text" name="nombre" required class="form-control" placeholder="Ingrese nombre de la categoria">
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