<?php

//Incluimos las configuraciones pertinentes
require_once "conf/confAplicacion.php";



session_start();//Recuperamos la sesión

if (isset($_SESSION['usuario'])) {
    include_once $controladores['inicio'];
}
if (isset($_SESSION['pagina'])) {
    include_once $controladores[$_SESSION['pagina']];
} else {
    include_once $controladores['login'];
}


