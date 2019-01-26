<?php

if (isset($_SESSION['usuario'])) {//Si hay una sesión iniciada
    $vista = $vistas['inicio']; //Cargamos la vista de inicio
}
if (isset($_SESSION['pagina'])) {//Si hay una página definida
    $vista = $vistas[$_SESSION['pagina']]; //Cargamos la vista de dicha página
}else{
    $vista = $vistas['login'];
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aplicación Multicapa / POO</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="webroot/css/style01.css">
        <link rel="stylesheet" type="text/css" href="webroot/css/carrusel.css">
        <link rel="icon" href="webroot/favicon/favicon.ico" type="image/gif" >

    </head>

    <body>
        <?php
        require_once $vista;
        ?>



    </body>
    <footer>
<<<<<<< HEAD
        <a href="doc/phpDoc/index.html" target="_blank"><img src="webroot/images/phpDoc.png" />PHPDoc</a>
        <a href="https://github.com/ACAND0/AplicacionPOOmMulticapa"><img src="webroot/images/GitHub_Logo.png"/></a>
        <a>Adrián Cando Oviedo®</a>
=======
        <a href="https://github.com/ACAND0/AplicacionPOOmMulticapa"><img src="webroot/images/GitHub_Logo.png"/></a>
        Adrián Cando Oviedo®
>>>>>>> origin/master
        <a href="http://DAW-USGIT.sauces.local/acando/AplicacionPOOmMulticapa.git"><img src="webroot/images/GitLab_logo.png"/></a>
    </footer>
</html>
