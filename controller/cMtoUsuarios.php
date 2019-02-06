<?php

$contador = 0; //Variable que utilizao para concatenar en el name de cada departamento para así
//poder referenciarlo y distinguirlo a la hora de utilizar los botones individuales de cada departamento como
//el de borrar

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Importar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['limpiarBuscar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Exportar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Añadir'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Editar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Borrar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


$_SESSION['pagina'] = 'mtoUsuarios';
require_once $vistas['layout'];


//Abro la tabla que contendrá los datos de los departamentos en la vista

$descripcion = "";

if (isset($_REQUEST['Buscar'])) {
    $descripcion = $_REQUEST['buscarPorDesc'];
}

$aUsuarios = Usuario::buscaUsuariosPorDesc($descripcion);
if ($aUsuarios) {
    foreach ($aUsuarios as $Usuario) {
        $codigo = $Usuario->getCodUsuario();
        $desc = $Usuario->getDescUsuario();
        $perfil = $Usuario->getPerfil();
        $Visitas = $Usuario->getNumAccesos();
        if (is_null($Usuario->getFechaHoraUltimaConexion())) {
            $ultimaConexion = "Este usuario no ha visitado la página";
        }else{
            $ultimaConexion = strftime("%Y-%m-%d  %H:%M:%S", $Usuario->getFechaHoraUltimaConexion());
        }
        echo "<tr style='background-color: white'>"; //Si la fechad e baja es nula se verá el fondo verde
        echo "<td>$codigo</td>"; //Muestro el actual código de departamento
        echo "<td>$desc</td>"; //Muestro la actual descripción del departamento
        echo "<td>$perfil</td>"; //Muestro la actual descripción del departamento
        echo "<td>$Visitas</td>"; //Muestro la actual descripción del departamento
        echo "<td>$ultimaConexion</td>"; //Muestro la actual descripción del departamento
        echo "<td>";

        echo "<div class='bocadillo'>"; //Cada bloque como este produce un icono   
        echo "<button  type='submit' name='Editar'><img src='webroot/images/editar.png'/></button>";
        echo "<span class='textoBocadillo'>Editar</span>";
        echo "</div>";

        echo "<div class='bocadillo'>";
        echo "<button  type='submit' name='Borrar'><img src='webroot/images/borrar.png'/></button>";
        echo "<span class='textoBocadillo'>Borrar</span>";
        echo "</div>";

        echo "</td>";
        echo "</tr>";
    }
}

echo "</table>";
echo "</form>";






