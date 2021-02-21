<?php
function getLibro($con,$id)
{
    $result = mysqli_query($con, "select * from libros where id_libro='{$id}';");
    $libro = mysqli_fetch_array($result);

    if (is_array($libro)) {
        return $libro;
    }
    return null;
}
