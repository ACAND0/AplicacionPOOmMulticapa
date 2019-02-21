<?php
/**
 * Archivo layout.php
 * 
 * Este archivo contiene una plantilla, la cual se utiliza en todas las vistas de la aplicación
 * incluye una vista dependiendo de la página que hayamos pasado
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package view
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
        <link rel="stylesheet" type="text/css" href="webroot/css/style01.css"><!-- CSS Por defecto -->
        <link rel="stylesheet" type="text/css" href="webroot/css/carrusel.css"><!-- CSS Carrusel -->
        <link rel="stylesheet" type="text/css" href="webroot/css/mantenimientos.css"><!-- CSS de los mantenimientos -->
        <link rel="stylesheet" type="text/css" href="webroot/css/calendario.css"><!-- CSS del calendario -->
        <link rel="icon" href="webroot/favicon/favicon.ico" type="image/gif" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
        <script type="text/javascript" src="webroot/js/funciones.js"></script>
        <script type="text/javascript" src="webroot/js/carrousel.js"></script>

    </head>

    <body>
        <?php
        require_once $vista;
        ?>

    </body>

    <footer >
        <a href="core/RSSdesarrollo.xml" target="_blank"><img src="webroot/images/rss.png"/></a>        
        <a href="https://github.com/ACAND0/AplicacionPOOmMulticapa" target="_blank"><img src="webroot/images/GitHub_Logo.png"/></a>        
        <?php if ($vista == $vistas['login']) { ?>
            <a href="doc/catalogoDeRequisitos.pdf" target="_blank"><img src="webroot/images/catalogo.png"/>Catálogo de requisitos</a>
        <?php } ?>
        <a href="../../index.html"   target="_blank">Adrián Cando Oviedo®</a>        
        <a href="doc/cv.pdf" target="_blank"><img src="webroot/images/cv.svg"/></a>     
        <a href="doc/phpDoc/index.html" target="_blank"><img src="webroot/images/phpDoc.png" />PHPDoc</a>
<!--        <a href="http://DAW-USGIT.sauces.local/acando/AplicacionPOOmMulticapa.git" target="_blank"><img src="webroot/images/GitLab_logo.png"/></a>-->
        <a href="doc/tecnologias.html" target="_blank"><img src="webroot/images/tecnologias.png"/>Tecnologías</a>
    </footer>
</html>
