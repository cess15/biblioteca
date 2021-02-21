<?php
if (isset($_POST)) {
    if (isset($_GET['id'])) {
        require_once('../connect.php');
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $genero = $_POST['genero'];

        $result = mysqli_query($con, "update usuarios set nombre_personal='{$nombre}', apellido_personal='{$apellido}', telefono='{$telefono}', genero='{$genero}' where id_usuario='{$id}';");
        mysqli_close($con);
        header('Location: ../../user/');
    }
}
