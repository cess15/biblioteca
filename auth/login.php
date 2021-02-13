<?php
session_start();
require_once('../helpers/connect.php');
if (count($_POST) > 0) {
    //password_verify($_POST['password'],$row['password']);
    $password = $_POST['password'];
    $result = mysqli_query($con, "select * from usuarios where nombre_usuario='{$_POST['username']}'");
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        if (password_verify($password, $row['password'])) {
            if (password_needs_rehash($row['password'], PASSWORD_DEFAULT, [12])) {
                $newPassword = mysqli_query($con, "update usuarios set password='{$password}' where nombre_usuario='{$_POST['username']}'");
            }
            $_SESSION["id"] = $row['id'];
            $_SESSION["role_id"] = $row['role_id'];
        } else {
            $_SESSION['error'] = 'No pudimos encontrar estas credenciales';
        }
    }
}
if (isset($_SESSION["id"])) {
    header("Location:../user/profile.php");
}
?>
<?php require_once('../helpers/helpers.php') ?>
<?php require_once('app.php'); ?>
<div class="login-page">
    <div class="form">
        <?php if (isset($_SESSION['error'])) { ?>
            <span class="error text-danger"><?= $_SESSION['error'] ?></span>
        <?php } ?>
        <form action="" method="POST">
            <input id="username" type="text" name="username" placeholder="Nombre de usuario" autofocus />
            <input id="password" type="password" name="password" placeholder="Contraseña" />
            <button type="submit">Iniciar sesión</button>
        </form>
        <?php delete_session() ?>
        <a href="../"><button type="button" class="mt-3">Regresar</button></a>
    </div>
</div>
</body>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</html>