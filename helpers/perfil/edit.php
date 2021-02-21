<?php
if (isset($_POST)) {
    if (isset($_POST['id'])) {
        session_start();
        require_once('../connect.php');
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $genero = $_POST['genero'];
        $username = $_POST['username'];

        $userFound = getUser($con, $id);
        $existeUsuario = existeUser($con, $username, $email);

        if ($existeUsuario == true) {
            if ($username == $userFound['nombre_usuario'] || $email == $userFound['email']) {
                $result = mysqli_query($con, "update usuarios set nombre_personal='{$nombre}', apellido_personal='{$apellido}',cedula='{$cedula}', email='{$email}', telefono='{$telefono}',genero='{$genero}',nombre_usuario='{$username}' where id_usuario='{$id}';");
                if ($result) {
                    $_SESSION['success'] = 'Datos actualizados correctamente';
                } else {
                    $_SESSION['error'] = 'Ocurrio un error al actualizar sus datos';
                }
            } else {
                $_SESSION['error'] = 'Nombre de usuario o correo ya en uso';
            }
        }

        if ($existeUsuario == false) {
            $result = mysqli_query($con, "update usuarios set nombre_personal='{$nombre}', apellido_personal='{$apellido}',cedula='{$cedula}', email='{$email}', telefono='{$telefono}',genero='{$genero}',nombre_usuario='{$username}' where id_usuario='{$id}';");
            if ($result) {
                $_SESSION['success'] = 'Datos actualizados correctamente';
            } else {
                $_SESSION['error'] = 'Ocurrio un error al actualizar sus datos';
            }
        }
        header('Location: ../../profile/edit.php');
    }
}

function getUser($con, $id)
{
    $user = mysqli_query($con, "select nombre_usuario,email from usuarios where id_usuario='{$id}';");
    $row = mysqli_fetch_array($user);
    return $row;
}

function existeUser($con, $username, $email)
{
    $existeUsuario = mysqli_query($con, "select count(*) from usuarios where nombre_usuario='{$username}' or email='${email}';");
    $number = mysqli_fetch_array($existeUsuario);
    if ($number[0] == 1) {
        return true;
    }
    return false;
}
