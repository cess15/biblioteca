<?php require_once('../layouts/app.php'); ?>
<?php if ($_SESSION["role_id"] == 2) { ?>
    <?php
    require_once('../helpers/connect.php');
    $user = mysqli_query($con, "select * from usuarios where id_usuario='{$_SESSION['id']}'");
    $row  = mysqli_fetch_array($user);
    require_once('../helpers/categorias/cantCategorias.php');
    require_once('../helpers/libros/cantLibros.php');
    require_once('../helpers/prestamos/cantPrestamos.php');
    //Numero de libros existentes
    $numberLibros = getCantidadLibros($con);
    //Numeros de categorias existentes
    $numberCategoria = getCantidadCategorias($con);
    $numberPrestamosById = getCantidadPrestamosById($con,$row['id_usuario']);
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
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <a href="../libros/" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span class="ml-2">Regresar</span></i></a>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Nuevo Libro</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="../helpers/libros/create.php" method="POST">
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="codigo">Código</label>
                                                <input type="text" name="codigo" class="form-control" placeholder="Ingrese código de libro">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre de libro</label>
                                                <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre de libro">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php $categorias = getCategorias($con) ?>
                                                <label for="categoria_id">Categoría</label>
                                                <select name="categoria_id" class="form-control">
                                                    <option selected disabled>-- Seleccione --</option>
                                                    <?php foreach ($categorias as $categoria) { ?>
                                                        <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nombre_categoria'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?php mysqli_close($con) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre_autor">Nombre de autor</label>
                                                <input type="text" name="nombre_autor" class="form-control" placeholder="Ingrese nombre de autor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editorial">Editorial</label>
                                                <input type="text" name="editorial" class="form-control" placeholder="Ingrese nombre de editorial">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pais_publicacion">País de publicación</label>
                                                <input type="text" name="pais_publicacion" class="form-control" placeholder="Ingrese país de publicación">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="anio_publicacion">Año de publicación</label>
                                                <input type="number" name="anio_publicacion" class="form-control" placeholder="Ingrese año de publicación">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="numero_paginas">Número de páginas</label>
                                                <input type="number" name="numero_paginas" class="form-control" placeholder="Ingrese números de páginas">
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