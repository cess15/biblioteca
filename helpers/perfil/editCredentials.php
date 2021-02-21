<?php
if (isset($_POST)) {
    if (isset($_POST['id'])) {
        session_start();
        require_once('../connect.php');
        $id = $_POST['id'];
        $newPassword = $_POST['newpassword'];
        $rePassword = $_POST['repassword'];
        $password = $_POST['password'];
        $user=getUser($con,$id);
    
        if ($rePassword === $newPassword) {
            if (password_verify($password, $user['password'])) {
                $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $result = mysqli_query($con, "update usuarios set password='{$hashPassword}' where id_usuario='{$id}';");
    
                if ($result) {
                    $_SESSION['success'] = 'Credenciales cambiadas correctamente';
                } else {
                    $_SESSION['error'] = 'Ocurrio un error al actualizar sus datos';
                }
            }
        }
    }
    header('Location: ../../profile/edit.php');
}

function getUser($con, $id)
{
    $user = mysqli_query($con, "select password from usuarios where id_usuario='{$id}';");
    $row = mysqli_fetch_array($user);
    return $row;
}
