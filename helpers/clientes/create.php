<?php
if (isset($_POST)) {
    session_start();
    require_once('../connect.php');
    $cedula = $_POST['cedula'];
    $nombreCliente = $_POST['nombre_cliente'];
    $apellidoCliente = $_POST['apellido_cliente'];
    $ciudad = $_POST['ciudad'];
    $celular = $_POST['celular'];
    $correoElectronico = $_POST['correo_electronico'];
    $estado = false;

    $result = mysqli_query($con, "insert into clientes (cedula,nombre_cliente,apellido_cliente,ciudad,celular,correo_electronico,estado_cliente) values ('{$cedula}','{$nombreCliente}','{$apellidoCliente}','{$ciudad}','{$celular}','{$correoElectronico}','{$estado}');");
    if ($result) {
        $_SESSION['success'] = 'Cliente registrado correctamente';
    } else {
        $_SESSION['error'] = 'Ocurrio un error al ingresar el cliente';
    }
    mysqli_close($con);
    header('Location: ../../clientes/create.php');
}
