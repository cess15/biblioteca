<?php
//Numeros de categorias existentes

function getCantidadLibros($con)
{
    $cantidadLibros = mysqli_query($con, "select count(*) from libros");
    $numberLibros  = mysqli_fetch_array($cantidadLibros);
    return $numberLibros;
}

function getCategorias($con)
{
    $categorias=mysqli_query($con, "select * from categoria");
    if($categorias){
        return $categorias;
    }
    mysqli_close($con);
    return null;
}
