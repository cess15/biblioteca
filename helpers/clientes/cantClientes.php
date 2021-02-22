<?php
function getCantidadClientes($con)
{
    $cantidadClientes = mysqli_query($con, "select count(*) from clientes");
    $numberClientes  = mysqli_fetch_array($cantidadClientes);
    return $numberClientes;
}