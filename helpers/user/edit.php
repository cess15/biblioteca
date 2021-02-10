<?php
require_once('../connect.php');

if (isset($_POST)) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $genero = $_POST['genero'];

        $result = mysqli_query($con, "update usuarios set nombre='{$nombre}', apellido='{$apellido}',cedula='{$cedula}', email='{$email}', telefono='{$telefono}',genero='{$genero}' where id='{$id}';");

        if ($result) {
            $_SESSION['success'] = 'Se han actualizado sus datos correctamente';
        } else {
            $_SESSION['error'] = 'Ocurrio un error al actualizar al cliente';
        }
    }
    header('Location: ../../user/edit.php');
}
