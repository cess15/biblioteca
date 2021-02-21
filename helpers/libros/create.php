<?php
if (isset($_POST)) {
    session_start();
    require_once('../connect.php');
    $categoria = $_POST['categoria_id'];
    $nombreAutor = $_POST['nombre_autor'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $editorial = $_POST['editorial'];
    $numeroPaginas = $_POST['numero_paginas'];
    $anioPublicacion = $_POST['anio_publicacion'];
    $paisPublicacion = $_POST['pais_publicacion'];
    $estado = false;

    $result = mysqli_query($con, "insert into libros (categoria_id,nombre_autor,codigo,nombre_libro,editorial,numero_paginas,anio_publicacion,pais_publicacion,estado) values ('{$categoria}','{$nombreAutor}','{$codigo}','{$nombre}','{$editorial}','{$numeroPaginas}','{$anioPublicacion}','{$paisPublicacion}','{$estado}');");
    if ($result) {
        $_SESSION['success'] = 'Libro registrado correctamente';
    } else {
        $_SESSION['error'] = 'Ocurrio un error al ingresar el libro';
    }
    mysqli_close($con);
    header('Location: ../../libros/create.php');
}
