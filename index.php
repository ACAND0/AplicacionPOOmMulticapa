<?php

//Incluimos las configuraciones pertinentes
require_once "conf/confAplicacion.php";



session_start();//Recuperamos la sesión

if (isset($_SESSION['usuario'])) {
    $controlador = $controladores['inicio'];
}
if (isset($_SESSION['pagina'])) {
    $controlador = $controladores[$_SESSION['pagina']];
} else {
    $controlador = $controladores['login'];
}
 
require_once $controlador;