<?php
if (isset($_POST)) {
    session_start();
    require_once('../connect.php');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $genero = $_POST['genero'];
    $username = $_POST['username'];

    $password = password_hash($cedula, PASSWORD_DEFAULT, [12]);

    $user = mysqli_query($con, "select nombre_usuario,email from usuarios;");
    $row = mysqli_fetch_array($user);

    $existeUsuario = mysqli_query($con, "select count(*) from usuarios where nombre_usuario='{$username}' or email='${email}';");
    $number = mysqli_fetch_array($existeUsuario);


    if ($number[0] == 1) {
        if ($username == $row['nombre_usuario'] && $email == $row['email']) {
            $_SESSION['error'] = 'Usuario con ' . $username . ' y ' . $email . ' ya existe';
        } else if ($username == $row['nombre_usuario']) {
            $_SESSION['error'] = 'Usuario ' . $username . ' ya existe';
        } else if ($email == $row['email']) {
            $_SESSION['error'] = 'Usuario con correo electrónico ' . $email . ' ya existe';
        }
    }

    if ($number[0] == 0) {
        $result = mysqli_query($con, "insert into usuarios (role_id,nombre_usuario,password,nombre_personal,apellido_personal,cedula,email,telefono,genero) values ('2','{$username}','{$password}','{$nombre}','{$apellido}','{$cedula}','{$email}','{$telefono}','{$genero}');");
        if ($result) {
            $_SESSION['success'] = 'Usuario registrado';
        } else {
            $_SESSION['error'] = 'Ocurrio un error al ingresar al usuario';
        }
    }

    mysqli_close($con);
    header('Location: ../../user/create.php');
}
