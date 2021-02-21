<?php
//Numeros de usuarios existentes

function getCantidadUsuarios($con)
{
    $cantidadUsuarios = mysqli_query($con, "select count(*) from usuarios where role_id=2");
    $number  = mysqli_fetch_array($cantidadUsuarios);
    return $number;
}