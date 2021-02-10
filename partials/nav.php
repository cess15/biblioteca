<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    <title>Biblioteca</title>
</head>

<body>
    <div class="w3-top">
        <div id="myNavbar" class="w3-bar w3-green w3-card">
            <a href="#home" class="w3-bar-item w3-wide">
                <img src="./assets/images/logo-biblioteca.png" class="rounded mx-auto d-block" alt="Logo" style="width: 40px;">
            </a>
            <div class="w3-left w3-hide-small">
                <a href="#home" class="w3-bar-item w3-button">Inicio</a>
                <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Nosotros</a>
                <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-map-marker"></i> Localización</a>
            </div>
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="auth/login.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Iniciar
                    Sesión</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->

            <a href="javascript:void(0)" class="mr-5 w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Cerrar
            &times;</a>
        <a href="#home" onclick="w3_close()" class="w3-bar-item w3-button">Inicio</a>
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Nosotros</a>
        <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">Localización</a>
        <a href="auth/login.php" onclick="w3_close()" class="w3-bar-item w3-button">Iniciar Sesión</a>
    </nav>