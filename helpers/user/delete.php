<?php
if (isset($_POST)) {
    if (isset($_GET['id'])) {
        require_once('../connect.php');
        $id = $_GET['id'];
        $result = mysqli_query($con, "delete from usuarios where id_usuario='{$id}';");
        mysqli_close($con);
        header('Location: ../../user/');
    }
}
