<?php
function getCliente($con, $id)
{
    $result = mysqli_query($con, "select * from clientes where id_cliente='{$id}';");
    $cliente = mysqli_fetch_array($result);

    if (is_array($cliente)) {
        return $cliente;
    }
    return null;
}
