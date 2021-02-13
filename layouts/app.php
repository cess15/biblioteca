<?php
require_once('../helpers/helpers.php');
session_start();
$hora = date('H:i');
$session_id = session_id();
$token = hash('sha256', $hora . $session_id);
$_SESSION['token'] = $token;
if (!isset($_SESSION["id"])) {
    header("Location: ../auth/login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if ($_SESSION["role_id"] == 1) { ?>
        <title>Administrador</title>
    <?php } ?>
    <?php if ($_SESSION["role_id"] == 2) { ?>
        <title>Bibliotecario</title>
    <?php } ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/app.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-autofill/css/autoFill.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-select/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">