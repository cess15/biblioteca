<?php require_once('../layouts/app.php'); ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../user/profile.php" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/biblioteca/user/profile.php' ? 'breadcrumb-item active' : 'breadcrumb-item' ?>">Mi
                    perfil</a>
            </li>
            <li class="breadcrumb-item">
                <a href="../user/edit.php" class="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/biblioteca/user/edit.php' ? 'breadcrumb-item active' : 'breadcrumb-item' ?>">Actualizar
                    Datos
                </a>
            </li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="container">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Mis Datos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="../helpers/user/edit.php" method="POST">
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombres</label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo $_SESSION['nombre'] ?>" placeholder="<?php echo $_SESSION['nombre'] != '' ? '' : 'Ingrese nombres' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido">Apellidos</label>
                                    <input type="text" name="apellido" class="form-control" value="<?php echo $_SESSION['apellido'] ?>" placeholder="<?php echo $_SESSION['apellido'] != '' ? '' : 'Ingrese apellidos' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cedula">Cédula</label>
                                    <input type="text" name="cedula" class="form-control" value="<?php echo $_SESSION['cedula'] ?>" placeholder="<?php echo $_SESSION['cedula'] != '' ? '' : 'Ingrese número de cédula' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" placeholder="<?php echo $_SESSION['email'] != '' ? '' : 'Ingrese un correo electrónico' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    <input type="text" name="telefono" class="form-control" value="<?php echo $_SESSION['telefono'] ?>" placeholder="<?php echo $_SESSION['telefono'] != '' ? '' : 'Ingrese número de cédula' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="genero">Género</label>
                                    <select name="genero" class="form-control">
                                        <option selected disabled>-- Seleccione --</option>
                                        <option value="Masculino" <?php echo $_SESSION['genero']==='Masculino' ? 'selected' : '' ?>>
                                            Masculino</option>
                                            <option value="Femenino" <?php echo $_SESSION['genero']==='Femenino' ? 'selected' : '' ?>>
                                            Femenino</option>
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.wrapper -->
<?php require_once('../layouts/endapp.php'); ?>