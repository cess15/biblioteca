<?php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["role_id"]);
    header("Location:../../auth/login.php");
?>