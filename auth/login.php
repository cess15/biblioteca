<?php
session_start();
require_once('../helpers/connect.php');
$message = "";
if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre_usuario='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'");
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["cedula"] = $row['cedula'];
        $_SESSION["nombre"] = $row['nombre'];
        $_SESSION["apellido"] = $row['apellido'];
        $_SESSION["genero"] = $row['genero'];
        $_SESSION["telefono"] = $row['telefono'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["role_id"] = $row['role_id'];
    } else {
        $message = "Nombre de usuario o contraseña inválido";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:../user/profile.php");
}
?>
<?php require_once('app.php'); ?>
<div class="login-page">
    <div class="form">
        <form action="" method="POST">
            <div class="message text-danger"><?php $message ? $message : ''?></div>
            <input id="username" type="text" name="username" placeholder="Nombre de usuario" autofocus />
            <input id="password" type="password" name="password" placeholder="Contraseña" />
            <button type="submit">Iniciar sesión</button>
        </form>
        <a href="../"><button type="button" class="mt-3">Regresar</button></a>
    </div>
</div>
</body>
<script src="https://kit.fontawesome.com/0db7df2fff.js" crossorigin="anonymous"></script>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/js/login.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</html>