<?php
/**
 * Archivo cImportarUsuarios.php
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

$todoOkey = true;
$fallos = 0;
$fichero = "tmp/datosUsuarios.json";

$json = file_get_contents($fichero); //Recojo el fichero JSON en una variable

if ($json == false) {//Si no se ha podido encontrar mostraremos un error
    echo '<h3 style=color:red>No se ha podido abrir el archivo JSON</h3>';
} else {//Si se ha recogido correctamente
    $Usuarios = json_decode($json, true); //Decodifico el fichero json en un array

    foreach ($Usuarios as $Usuario) {//Recorro el array json por filas
        $codigo = $Usuario['CodUsuario'];

        

        //Si ya existe un departamento con este codigo mostrará un error
        if (Usuario::validarCodNoExiste($codigo)) {
            $todoOkey = false;
            $fallos++;
            echo "<a style=color:red>El usuario con el código $codigo ya existe, por lo que no se ha importado.</a><br>";
        } else {//Si el departamento no existe en la base de datos procedemos a insertarlo
            Usuario::importarUsuario($codigo, $Usuario['Password'], $Usuario['DescUsuario'], $Usuario['NumAccesos'], $Usuario['FechaHoraUltimaConexión'], $Usuario['Perfil']);
            echo "<a style=color:green>Usuario " . $codigo . " importado correctamente</a><br>";
        }
    }
}

if ($todoOkey) {
    echo '<h3 style=color:green>Se han importado todos los archivos del fichero ' . $fichero . '</h3>';
} else {
    echo '<h3 style=color:red>No se han podido insertar ' . $fallos . ' usuarios del fichero ' . $fichero . ' </h3>';
}

$_SESSION['pagina'] = 'importarUsuarios';
require_once $vistas['layout'];
