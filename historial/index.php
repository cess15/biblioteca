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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row p-2">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">Mi historial de emprestamos</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <table id="prestamos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombres del cliente</th>
                            <th>Apellidos del cliente</th>
                            <th>Libro</th>
                            <th>Fecha de prestamo</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php require_once('../theme/lte/footer.php') ?>
    <?php require_once('../layouts/endapp.php'); ?>
    <script type=text/javascript>
        $(document).ready(function() {
            $("#prestamos").DataTable({
                proccessing: true,
                serverSide: true,
                pageLength: 5,
                orderable: false,
                ajax: `../helpers/prestamos/prestamoBibliotecario.php?id=<?= $_SESSION['id'] ?>`,
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
                        db: "nombre_cliente"
                    },
                    {
                        db: "apellido_cliente"
                    },
                    {
                        db: "nombre_libro"
                    },
                    {
                        db: "fecha_prestamo"
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