<?php
//Numeros de usuarios existentes

function getCantidadPrestamos($con)
{
    $cantidadPrestamos = mysqli_query($con, "select count(*) from prestamos");
    $numberPrestamos  = mysqli_fetch_array($cantidadPrestamos);
    return $numberPrestamos;
}

function getCantidadDevolucion($con)
{
    $cantidadPrestamos = mysqli_query($con, "select count(*) from devolucion");
    $numberPrestamos  = mysqli_fetch_array($cantidadPrestamos);
    return $numberPrestamos;
}

function getClientesEstadoIsFalse($con)
{
    $clientes = mysqli_query($con, "select * from clientes where estado_cliente=false");
    if ($clientes) {
        return $clientes;
    }
    return null;
}

function getClientesEstadoIsTrue($con)
{
    $clientes = mysqli_query($con, "select * from clientes where estado_cliente=true");
    if ($clientes) {
        return $clientes;
    }
    return null;
}

function getLibrosEstadoIsFalse($con)
{
    $libros = mysqli_query($con, "select * from libros where estado_libro=false");
    if ($libros) {
        return $libros;
    }
    return null;
}

function getLibrosEstadoIsTrue($con)
{
    $libros = mysqli_query($con, "select * from libros where estado_libro=true");
    if ($libros) {
        return $libros;
    }
    return null;
}

function getCantidadPrestamosById($con, $id)
{
    $cantidadPrestamos = mysqli_query($con, "select count(*) from prestamos p inner join usuarios u on p.bibliotecario_id=u.id_usuario where p.bibliotecario_id='{$id}'");
    $numberPrestamos  = mysqli_fetch_array($cantidadPrestamos);
    return $numberPrestamos;
}

function getCantidadDevolucionById($con, $id)
{
    $cantidadPrestamos = mysqli_query($con, "select count(*) from devolucion p inner join usuarios u on p.bibliotecario_id=u.id_usuario where p.bibliotecario_id='{$id}'");
    $numberPrestamos  = mysqli_fetch_array($cantidadPrestamos);
    return $numberPrestamos;
}

function convertDate($date)
{
    setLocale(LC_ALL, 'spanish_ecuador.utf-8');
    $myDate = str_replace("/", "-", $date->format('Y-m-d H:i:s'));
    $newDate = date('d-m-Y H:i:s', strtotime($myDate));
    return strftime('%A, %d de %B de %T %p', strtotime($newDate));
}

