<?php

require_once 'model/Usuario.php';



if(isset($_REQUEST['salir'])){//Si hemos pulsado salir
        unset($_SESSION['usuario']);  //Vaciamos la variable SESSION del usuario
        session_destroy();//Destruimos la sesión
        header("Location: index.php"); //Y redireccionamos al index
}

if (!isset($_SESSION['usuario'])) { //Si no existe un usaurio logueado
    header("Location: index.php"); //Redireccionamos al index
} else{//Si existe, cargamos el layout
   require_once 'view/layout.php';
}


