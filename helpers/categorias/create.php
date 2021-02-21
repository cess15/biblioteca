<?php 
if(isset($_POST)){
    session_start();
    require_once('../connect.php');
    $nombre = $_POST['nombre'];
    
    $result=mysqli_query($con, "insert into categoria (nombre_categoria) values ('{$nombre}');");
    if($result){
        $_SESSION['success']='Categoria registrada';
    }else{
        $_SESSION['error']="Ocurrio un error al registrar la categoria";
    }
    mysqli_close($con);
    header('Location: ../../categorias/create.php');
}
