<?php 
if(isset($_POST)){
    session_start();
    require_once('../connect.php');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $genero = $_POST['genero'];

    $result=mysqli_query($con, "insert into usuarios (role_id,nombre,apellido,cedula,email,telefono,genero) values ('2','{$nombre}','{$apellido}','{$cedula}','{$email}','{$telefono}','{$genero}');");
    if($result){
        $_SESSION['success']='Usuario registrado';
    }else{
        $_SESSION['error']="Ocurrio un error al registrar al usuario";
    }
    mysqli_close($con);
    header('Location: ../../user/create.php');
}
