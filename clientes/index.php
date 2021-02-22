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
        <section class="content">
            <div class="container">
                <div class="row p-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Listado de Clientes</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <?php if ($_SESSION['role_id'] == 2) { ?>
                    <div class="row mb-5 mr-5 p-2">
                        <div class="col-md-6">
                            <a href="./create.php"><button type="button" class="btn btn-info float-left"><i class="fas fa-plus"></i>Agregar Cliente</button></a>
                        </div>
                    </div>
                <?php } ?>

                <table id="clientes" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre del cliente</th>
                            <th>Apellido del cliente</th>
                            <th>Ciudad</th>
                            <th>Célular</th>
                            <th>Correo electrónico</th>
                            <th>Editar</th>
                            <?php if ($_SESSION['role_id'] == 1) { ?>
                                <th>Eliminar</th>
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
            </div><!-- /.container -->
        </section>
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- /.wrapper -->
    <?php require_once('../theme/lte/footer.php') ?>
    <?php require_once('../layouts/endapp.php'); ?>
    <script type=text/javascript>
        $(function() {
            var table = $("#clientes").DataTable({
                proccessing: true,
                serverSide: true,
                pageLength: 5,
                orderable: false,
                ajax: "../helpers/clientes/index.php",
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
                        db: "cedula"
                    },
                    {
                        db: "nombre_cliente"
                    },
                    {
                        db: "apellido_cliente"
                    },
                    {
                        db: "ciudad"
                    },
                    {
                        db: "celular"
                    },
                    {
                        db: "correo_electronico"
                    },
                    {
                        db: "id_cliente",
                        title: "Editar",
                        render: function(data, type, row) {
                            return `<a href="../clientes/edit.php?id=${data}" class="btn btn-warning"><i class="fa fa-user-edit"></i></a>`;
                        },
                    },
                    <?php if($_SESSION['role_id']==1) {?>
                    {
                        db: "id_cliente",
                        title: "Eliminar",
                        render: function(data, type, row) {
                            return `<a href="../clientes/delete.php?id=${data}" 
                                            onclick="event.preventDefault(); 
                                                (confirm('¿ ESTAS SEGURO QUE DESEAS ELIMINAR ESTE CLIENTE ?')) ? 
                                                document.getElementById('delete-form-${data}').submit() : false;" 
                                            class="btn btn-danger ml-3"><i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form-${data}" action="../helpers/clientes/delete.php?id=${data}" method="POST" style="display: none;"></form>`;
                        },
                    },
                    <?php } ?>
                ],
            })
        });
    </script>
    </body>

    </html>
<?php } else { ?>
    <?php header('Location: ../profile/'); ?>
<?php } ?>