<?php
if (isset($_POST)) {
    if (isset($_GET['id'])) {
        require_once('../connect.php');
        $id = $_GET['id'];
        $cedula = $_POST['cedula'];
        $nombreCliente = $_POST['nombre_cliente'];
        $apellidoCliente = $_POST['apellido_cliente'];
        $ciudad = $_POST['ciudad'];
        $celular = $_POST['celular'];
        $correoElectronico = $_POST['correo_electronico'];

        $result = mysqli_query($con, "update clientes set cedula='{$cedula}', nombre_cliente='{$nombreCliente}', apellido_cliente='{$apellidoCliente}', ciudad='{$ciudad}', celular='{$celular}', correo_electronico='{$correoElectronico}' where id_cliente='{$id}';");
        mysqli_close($con);
        header('Location: ../../clientes/');
    }
}
