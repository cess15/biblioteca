<?php
if (isset($_POST)) {
    session_start();
    require_once('../connect.php');
    $libro = $_POST['libro_id'];
    $cliente = $_POST['cliente_id'];
    $idUsuario = $_POST['id_usuario'];
    $fecha = new DateTime('now', new DateTimeZone('America/Guayaquil'));
    $fechaDevolucion = $fecha->format('Y-m-d H:i:s');
    
    $result = mysqli_query($con, "insert into devolucion (libro_id,cliente_id,bibliotecario_id,fecha_devolucion) values ('{$libro}','{$cliente}','{$idUsuario}','{$fechaDevolucion}')");
    if ($result) {
        $updateLibroEstadoFalse = mysqli_query($con, "update libros set estado_libro=false where id_libro='{$libro}'");
        $updateClienteEstadoFalse = mysqli_query($con, "update clientes set estado_cliente=false where id_cliente='{$cliente}'");
        if ($updateLibroEstadoFalse && $updateClienteEstadoFalse) {
            $_SESSION['success'] = 'Devolución del libro correctamente';
        } else {
            $_SESSION['error'] = 'Ocurrio un error al procesar la información';
        }
    }
    mysqli_close($con);
    header('Location: ../../prestamos/return.php');
}