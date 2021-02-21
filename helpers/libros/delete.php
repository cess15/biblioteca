<?php
if (isset($_POST)) {
    if (isset($_GET['id'])) {
        require_once('../connect.php');
        $id = $_GET['id'];
        $result = mysqli_query($con, "delete from libros where id_libro='{$id}';");
        mysqli_close($con);
        header('Location: ../../libros/');
    }
}
