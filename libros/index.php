<?php require_once('../layouts/app.php'); ?>
<?php if ($_SESSION['role_id'] == 1) { ?>
    <?php
    require_once('../helpers/connect.php');
    require_once('../helpers/helpers.php');
    //Obtener toda la información de un usuario autenticado
    $user = mysqli_query($con, "select * from usuarios where id_usuario='{$_SESSION['id']}'");
    $row  = mysqli_fetch_array($user);
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
                <div class="row p-2">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">Listado de libros</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <table id="libros" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Autor</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Editorial</th>
                            <th>Año</th>
                            <th>País</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </div>
    </div>
    <!-- /.wrapper -->
    <?php require_once('../theme/lte/footer.php') ?>
    <?php require_once('../layouts/endapp.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#libros").DataTable({
                proccessing: true,
                serverSide: true,
                pageLength: 5,
                orderable: false,
                ajax: "../helpers/libros/allLibros.php",
                type: "GET",
                autoFill: true,
                responsive: true,
                language: {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "lengthMenu": 'Mostrar <select>' +
                        '<option value="5">5</option>' +
                        '<option value="10">10</option>' +
                        '<option value="15">20</option>' +
                        '<option value="20">40</option>' +
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                columns: [{
                        db: "codigo"
                    },
                    {
                        db: "nombre_autor"
                    },
                    {
                        db: "nombre_categoria"
                    },
                    {
                        db: "nombre_libro"
                    },
                    {
                        db: "editorial"
                    },
                    {
                        db: "anio_publicacion"
                    },
                    {
                        db: "pais_publicacion"
                    },
                    {
                        db: "estado_libro",
                        render: function(data, type, row, meta) {
                            if (data == 0) {
                                return `<span class="text text-success">Disponible</span>`
                            } else {
                                return `<span class="text text-danger">Prestado</span>`
                            }
                        }
                    },
                    {
                        db: "id_libro",
                        title: "Editar",
                        render: function(data, type, row) {
                            return `<a href="../libros/edit.php?id=${data}" class="btn btn-warning"><i class="fa fa-edit"></i></a>`;
                        },
                    },
                    {
                        db: "id_libro",
                        title: "Eliminar",
                        render: function(data, type, row) {
                            return `<a href="../libros/delete.php?id=${data}" 
                                            onclick="event.preventDefault(); 
                                                (confirm('¿ ESTAS SEGURO QUE DESEAS ELIMINAR ESTE LIBRO ?')) ? 
                                                document.getElementById('delete-form-${data}').submit() : false;" 
                                            class="btn btn-danger ml-3"><i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form-${data}" action="../helpers/libros/delete.php?id=${data}" method="POST" style="display: none;"></form>`;
                        },
                    }
                ]
            });
        });
    </script>
    </body>

    </html>
<?php } else if ($_SESSION['role_id'] == 2) {  ?>
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
                <div class="row p-2">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">Listado de libros disponibles</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row mb-5 mr-5">
                    <div class="col-md-2">
                        <a href="./create.php"><button type="button" class="btn btn-info"><i class="fas fa-plus"></i>Agregar libro</button></a>
                    </div>
                    <div class="col-md-4">
                        <a href="../prestamos/create.php"><button type="button" class="btn btn-info"><i class="fas fa-plus"></i>Registrar prestamo</button></a>
                    </div>
                </div>
                <table id="libros" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Autor</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Editorial</th>
                            <th>Año</th>
                            <th>País</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </div>
    </div>
    <!-- /.wrapper -->
    <?php require_once('../theme/lte/footer.php') ?>
    <?php require_once('../layouts/endapp.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#libros").DataTable({
                proccessing: true,
                serverSide: true,
                pageLength: 5,
                orderable: false,
                ajax: "../helpers/libros/index.php",
                type: "GET",
                autoFill: true,
                responsive: true,
                language: {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "lengthMenu": 'Mostrar <select>' +
                        '<option value="5">5</option>' +
                        '<option value="10">10</option>' +
                        '<option value="15">20</option>' +
                        '<option value="20">40</option>' +
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                columns: [{
                        db: "codigo"
                    },
                    {
                        db: "nombre_autor"
                    },
                    {
                        db: "nombre_categoria"
                    },
                    {
                        db: "nombre_libro"
                    },
                    {
                        db: "editorial"
                    },
                    {
                        db: "anio_publicacion"
                    },
                    {
                        db: "pais_publicacion"
                    },
                    {
                        db: "estado_libro",
                        render: function(data, type, row, meta) {
                            if (data == 0) {
                                return `<span class="text text-success">Disponible</span>`
                            } else {
                                return `<span class="text text-danger">Prestado</span>`
                            }
                        }
                    },
                    {
                        db: "id_libro",
                        title: "Editar",
                        render: function(data, type, row) {
                            return `<a href="../libros/edit.php?id=${data}" class="btn btn-warning"><i class="fa fa-edit"></i></a>`;
                        },
                    },
                ]
            });
        });
    </script>
    </body>

    </html>
<?php } else { ?>
    <?php header('Location: ../profile/'); ?>
<?php } ?>