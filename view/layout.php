<?php

$vista = $vistas['login'];

if (isset($_SESSION['usuario'])) {//Si hay una sesión iniciada
    $vista = $vistas['inicio'];//Cargamos la vista de inicio
} 
if (isset($_SESSION['pagina'])) {//Si hay una página definida
    $vista = $vistas[$_SESSION['pagina']];//Cargamos la vista de dicha página
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aplicación 17-18</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="webroot/css/style01.css">
        <link rel="stylesheet" type="text/css" href="webroot/css/carrusel.css">
    </head>

    <body>
        <?php

       require_once $vista;
        
        ?>
        
        

    </body>
    <footer>
        <a href=""><img src="webroot/images/GitHub_Logo.png"/></a>
    </footer>
</html>
