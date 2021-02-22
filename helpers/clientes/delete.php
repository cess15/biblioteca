<?php
if (isset($_POST)) {
    if (isset($_GET['id'])) {
        require_once('../connect.php');
        $id = $_GET['id'];
        $result = mysqli_query($con, "delete from clientes where id_cliente='{$id}';");
        var_dump($con);
        mysqli_close($con);
        header('Location: ../../clientes/');
    }
}
