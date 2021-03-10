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
        require_once('../helpers/libros/getLibro.php');
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
        $categorias = getCategorias($con);
    }

    if ($_SESSION['role_id'] == 1) {
        require_once('../helpers/prestamos/cantPrestamos.php');
        require_once('../helpers/user/cantUsuarios.php');
        require_once('../helpers/libros/getLibro.php');
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
        $categorias = getCategorias($con);
    }

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
                    <?php $libro = getLibro($con, $_GET['id']); ?>
                    <?php mysqli_close($con); ?>
                <?php } ?>
                <?php if ($libro == null) { ?>
                    <h3>No se encontro al libro</h3>
                <?php } else { ?>
                    <div class="row mb-3 mr-5 mt-3">
                        <div class="col-sm-2">
                            <a href="../libros/"><button type="button" class="btn btn-info float-left"><i class="fas fa-arrow-alt-circle-left"></i>Regresar</button></a>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Libro</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="../helpers/libros/edit.php?id=<?= $_GET['id'] ?>" method="POST">
                                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="codigo">Código</label>
                                            <input type="text" name="codigo" class="form-control" value="<?= $libro['codigo'] ?>" placeholder="Ingrese código de libro">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre_libro">Nombre de libro</label>
                                            <input type="text" name="nombre_libro" class="form-control" value="<?= $libro['nombre_libro'] ?>" placeholder="Ingrese nombre de libro">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php  ?>
                                            <label for="categoria_id">Categoría</label>
                                            <select name="categoria_id" class="form-control">
                                                <option disabled>-- Seleccione --</option>
                                                <?php foreach ($categorias as $categoria) { ?>
                                                    <option value="<?= $categoria['id_categoria'] ?>" <?php if ($categoria['id_categoria'] == $libro['categoria_id']) {
                                                                                                            echo 'selected';
                                                                                                        } ?>><?= $categoria['nombre_categoria'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre_autor">Nombre de autor</label>
                                            <input type="text" name="nombre_autor" class="form-control" value="<?= $libro['nombre_autor'] ?>" placeholder="Ingrese nombre de autor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="editorial">Editorial</label>
                                            <input type="text" name="editorial" class="form-control" value="<?= $libro['editorial'] ?>" placeholder="Ingrese nombre de editorial">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pais_publicacion">País de publicación</label>
                                            <input type="text" name="pais_publicacion" class="form-control" value="<?= $libro['pais_publicacion'] ?>" placeholder="Ingrese país de publicación">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="anio_publicacion">Año de publicación</label>
                                            <input type="number" name="anio_publicacion" class="form-control" value="<?= $libro['anio_publicacion'] ?>" placeholder="Ingrese año de publicación">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numero_paginas">Número de páginas</label>
                                            <input type="number" name="numero_paginas" class="form-control" value="<?= $libro['numero_paginas'] ?>" placeholder="Ingrese números de páginas">
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