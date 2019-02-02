<?php
/*
 * confApplicación
 * 
 * Fichero php con la función de albergar los require de los ficheros necesarios y 2 arrays
 * Uno con los contrladores necesarios
 * Otro con las vistas necesarias
 * Se utilizan para poder llamar a todos los fichero sin necesidad de poner un path cada vez que los necesitemos
 */
require_once "conf/configDB.php";
require_once "model/Usuario.php";
require_once "model/Departamento.php";
require_once "core/validacion.php";
$vistas = [
    'layout' => 'view/layout.php',
    'login' => 'view/vLogin.php',
    'inicio' => 'view/vInicio.php',
    'miCuenta' => 'view/vMiCuenta.php',
    'error' => 'view/vError.php',
    'mtoCuestiones' => 'view/vMiCuenta.php',
    'mtoUsuarios' => 'view/vMtoUsuarios.php',
    'mtoDepartamentos' => 'view/vMtoDepartamentos.php',
    'eliminarCuestion' => 'view/vEliminarCuestion.php',
    'eliminarUsuario' => 'view/vEliminarUsuario.php',
    'eliminarDepartamento' => 'view/vEliminarDepartamento.php',
    'consultarModificarCuestion' => 'view/vConsultarModificarCuestion.php',
    'consultarModificarOpiniones' => 'view/vConsultarModificarOpiniones.php',
    'consultarModificarUsuario' => 'view/vConsultarModificarUsuario.php',
    'consultarModificarDepartamento' => 'view/vConsultarModificarDepartamento.php',
    'borrarCuenta' => 'view/vBorrarCuenta.php',
    'cambiarPassword' => 'view/vCambiarPassword.php',//Añadido
    'analisisOpiniones' => 'view/vAnalisisOpiniones.php',
    'altaDepartamento' => 'view/vAltaDepartamento.php',
    'altaCuestion' => 'view/vAltaCuestion.php',
    'rest' => 'view/vREST.php',
    'rss' => 'view/vRSS.php',
    'registro' => 'view/vRegistro.php',
    'soap' => 'view/vSOAP.php',
    'tecnologias' => 'view/vTecnologias.php',
    'wip' => 'view/vWIP.php',
];

$controladores = [
    'login' => 'controller/cLogin.php',
    'inicio' => 'controller/cInicio.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'error' => 'controller/cError.php',
    'mtoCuestiones' => 'controller/cMiCuenta.php',
    'mtoUsuarios' => 'controller/cMtoUsuarios.php',
    'mtoDepartamentos' => 'controller/cMtoDepartamentos.php',
    'eliminarCuestion' => 'controller/cEliminarCuestion.php',
    'eliminarUsuario' => 'controller/cEliminarUsuario.php',
    'eliminarDepartamento' => 'controller/cEliminarDepartamento.php',
    'consultarModificarCuestion' => 'controller/cConsultarModificarCuestion.php',
    'consultarModificarOpiniones' => 'controller/cConsultarModificarOpiniones.php',
    'consultarModificarUsuario' => 'controller/cConsultarModificarUsuario.php',
    'consultarModificarDepartamento' => 'controller/cConsultarModificarDepartamento.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'cambiarPassword' => 'controller/cCambiarPassword.php', //Añadido
    'analisisOpiniones' => 'controller/cAnalisisOpiniones.php',
    'altaDepartamento' => 'controller/cAltaDepartamento.php',
    'altaCuestion' => 'controller/cAltaCuestion.php',
    'rest' => 'controller/cREST.php',
    'rss' => 'controller/cRSS.php',
    'registro' => 'controller/cRegistro.php',
    'soap' => 'controller/cSOAP.php',
    'tecnologias' => 'controller/cTecnologias.php',
    'wip' => 'controller/cWIP.php',
];
?>
