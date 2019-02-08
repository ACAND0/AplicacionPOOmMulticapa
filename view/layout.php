<?php
/*
 * layout
 * 
 * Esta es una plantilla, que contiene lo que cualquier vista de la aplicación tiene, encabezado cuerpo y footer.
 * 
 */


if (isset($_SESSION['usuario'])) {//Si hay una sesión iniciada
    $vista = $vistas['inicio']; //Cargamos la vista de inicio
}
if (isset($_SESSION['pagina'])) {//Si hay una página definida
    $vista = $vistas[$_SESSION['pagina']]; //Cargamos la vista de dicha página
} else {
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
        <link rel = "stylesheet" type = "text/css" href = "webroot/css/mantenimientos.css">

        <link rel="icon" href="webroot/favicon/favicon.ico" type="image/gif" >
        <script type="text/javascript" src="webroot/js/funciones.js"></script>

    </head>

    <body>
        <?php
        require_once $vista;
        ?>



    </body>
    <footer>
        <a href="https://github.com/ACAND0/AplicacionPOOmMulticapa" target="_blank"><img src="webroot/images/GitHub_Logo.png"/></a>        
        <a href="doc/catalogoDeRequisitos.pdf" target="_blank"><img src="webroot/images/catalogo.png"/>Catálogo de requisitos</a>
        <a href="../indexProyectoDWES.php" style="font-size: 1.5em">Adrián Cando Oviedo®</a>        
        <a href="doc/cv.pdf" target="_blank"><img src="webroot/images/cv.svg"/></a>     
        <a href="doc/phpDoc/index.html" target="_blank"><img src="webroot/images/phpDoc.png" />PHPDoc</a>
        <a href="http://DAW-USGIT.sauces.local/acando/AplicacionPOOmMulticapa.git" target="_blank"><img src="webroot/images/GitLab_logo.png"/></a>
    </footer>
</html>
