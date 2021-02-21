<?php
//Numeros de usuarios existentes

function getCantidadPrestamos($con)
{
    $cantidadPrestamos = mysqli_query($con, "select count(*) from prestamos");
    $numberPrestamos  = mysqli_fetch_array($cantidadPrestamos);
    return $numberPrestamos;
}

function getCantidadPrestamosById($con,$id)
{
    $cantidadPrestamos = mysqli_query($con, "select count(*) from prestamos where id_prestamo='{$id}'");
    $numberPrestamos  = mysqli_fetch_array($cantidadPrestamos);
    return $numberPrestamos;
}