    <?php require_once('../layouts/app.php'); ?>
    <?php if ($_SESSION['role_id'] == 1) {  ?>
        <?php
        require_once('../helpers/connect.php');
        $user = mysqli_query($con, "select * from usuarios where id='{$_SESSION['id']}'");
        $row  = mysqli_fetch_array($user);
        $cantidadUsuarios = mysqli_query($con, "select count(*) from usuarios");
        $number  = mysqli_fetch_array($cantidadUsuarios);
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
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Listado de Usuarios</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row mb-5 mr-5 p-2">
                        <div class="col-sm-2">
                            <a href="./create.php"><button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i>Agregar Usuario</button></a>
                        </div>
                    </div>
                    <table id="usuarios" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo electrónico</th>
                                <th>Teléfono</th>
                                <th>Género</th>
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
                var table = $("#usuarios").DataTable({
                    proccessing: true,
                    serverSide: true,
                    pageLength: 5,
                    orderable: false,
                    ajax: "../helpers/user/index.php",
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
                            db: "nombre"
                        },
                        {
                            db: "apellido"
                        },
                        {
                            db: "email"
                        },
                        {
                            db: "telefono"
                        },
                        {
                            db: "genero"
                        }

                    ],
                })
            });
        </script>
        </body>

        </html>
    <?php } else { ?>
        <?php header('Location: ../user/profile.php'); ?>
    <?php } ?>