<?php
/**
 * Archivo cExportarUsuarios.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */
if (isset($_REQUEST['Cancelar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

$fichero = "tmp/datosUsuarios.json";
$datosJSON = []; //Array que gurdará los departamentos
$numeroUsuarios = Usuario::contarUsuariosPorDesc("");


$aUsuarios = Usuario::buscaUsuariosPorDesc("",0,$numeroUsuarios);

foreach ($aUsuarios as $Usuario) {
    $aUsuario['CodUsuario'] = $Usuario->getCodUsuario();
    $aUsuario['Password'] = $Usuario->getPassword();
    $aUsuario['DescUsuario'] = $Usuario->getDescUsuario();
    $aUsuario['NumAccesos'] = $Usuario->getNumAccesos();
    $aUsuario['FechaHoraUltimaConexión'] = $Usuario->getFechaHoraUltimaConexion();
    $aUsuario['Perfil'] = $Usuario->getPerfil();
//Inserto los elementos al array
    array_push($datosJSON, $aUsuario);
}

//Esta última opción se utiliza para formatear legiblemente el fichero JSON creado
    $stringJSON = json_encode($datosJSON, JSON_PRETTY_PRINT);

    if (file_put_contents($fichero, $stringJSON) != 0) { //Guarda el elemento XML anterior en la ruta especificada. 
//Si todo sale bien se muestra este mensaje con el enlace al fichero JSON
        echo '<h1  style=color:green>Se han exportado los datos en el fichero <a href=' . $fichero . ' target="_blank">datosDepartamentos.json</a></h1><br>';
    } else {
        echo '<h1  style=color:red>No se han exportado los datos en el fichero ' . $fichero . '</h1><br>';
    }
    
$_SESSION['pagina'] = 'exportarUsuarios';
require_once $vistas['layout'];    