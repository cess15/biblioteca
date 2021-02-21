<?php
//Numeros de categorias existentes

function getCantidadCategorias($con)
{
    $cantidadCategorias = mysqli_query($con, "select count(*) from categoria");
    $numberCategoria  = mysqli_fetch_array($cantidadCategorias);
    return $numberCategoria;
}
