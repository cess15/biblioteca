<?php
if (isset($_POST)) {
    if (isset($_GET['id'])) {
        require_once('../connect.php');
        $id = $_GET['id'];
        $categoria_id = intval($_POST['categoria_id']);
        $nombreAutor = $_POST['nombre_autor'];
        $codigo = $_POST['codigo'];
        $nombreLibro = $_POST['nombre_libro'];
        $editorial = $_POST['editorial'];
        $numeroPaginas = intval($_POST['numero_paginas']);
        $anioPublicacion = intval($_POST['anio_publicacion']);
        $paisPublicacion = $_POST['pais_publicacion'];
        
        $result = mysqli_query($con, "update libros set categoria_id='{$categoria_id}', nombre_autor='{$nombreAutor}', codigo='{$codigo}', nombre_libro='{$nombreLibro}', editorial='{$editorial}', numero_paginas='{$numeroPaginas}', anio_publicacion='{$anioPublicacion}', pais_publicacion='{$paisPublicacion}' where id_libro='{$id}';");
        mysqli_close($con);
        header('Location: ../../libros/');
    }
}
