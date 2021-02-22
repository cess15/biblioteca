<?php
if (isset($_POST)) {
    session_start();
    require_once('../connect.php');
    $libro = $_POST['libro_id'];
    $cliente = $_POST['cliente_id'];
    $idUsuario = $_POST['id_usuario'];
    $fecha = new DateTime('now', new DateTimeZone('America/Guayaquil'));
    $fechaPrestamo = $fecha->format('Y-m-d H:i:s');
    
    $result = mysqli_query($con, "insert into prestamos (libro_id,cliente_id,bibliotecario_id,fecha_prestamo) values ('{$libro}','{$cliente}','{$idUsuario}','{$fechaPrestamo}')");
    if ($result) {
        $updateLibroEstadoTrue = mysqli_query($con, "update libros set estado_libro=true where id_libro='{$libro}'");
        $updateClienteEstadoTrue = mysqli_query($con, "update clientes set estado_cliente=true where id_cliente='{$cliente}'");
        if ($updateLibroEstadoTrue && $updateClienteEstadoTrue) {
            $_SESSION['success'] = 'Emprestamo registrado correctamente';
        } else {
            $_SESSION['error'] = 'Ocurrio un error al emprestar el libro';
        }
    }
    mysqli_close($con);
    header('Location: ../../prestamos/create.php');
}