<?php
function getUser($con,$id)
{
    $result = mysqli_query($con, "select * from usuarios where id_usuario='{$id}';");
    $user = mysqli_fetch_array($result);

    if (is_array($user)) {
        return $user;
    }
    return null;
}
