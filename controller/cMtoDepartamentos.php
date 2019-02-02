<?php

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Importar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['limpiarBuscar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Exportar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Añadir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'altaDepartamento';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Editar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}
$_SESSION['pagina'] = 'mtoDepartamentos';
require_once $vistas['layout'];


//Abro la tabla que contendrá los datos de los departamentos en la vista
echo "<table class='tabla02'>
        <tr class='primerafila'>
            <td>Código</td>
            <td>Descripción</td>
            <td>Volumen de negocio</td>
            <td>Acciones</td>
        </tr>";
$descripcion = $_REQUEST['buscarPorDesc'];

if (isset($_REQUEST['Buscar'])) {
    
    $criterioBusqueda = $_REQUEST['criterioBusqueda'];
    $aDepartamentos = Departamento::buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda); //Devuelve array de objetos
    if ($aDepartamentos) {
        foreach ($aDepartamentos as $Departamento) {
            $codigo =$Departamento->getCodDepartamento();
            $fechaCreacion = $Departamento->getCodDepartamento();
            $descripcion = $Departamento->getDescDepartamento();
            $volumen = $Departamento->getVolumenDeNegocio();
            $fechaBaja = $Departamento->getFechaBajaDepartamento();
            
            if ($fechaBaja == null) {//Muestro un encabezado u otro
                echo "<tr style='background-color: #80FC7A'>"; //Si la fechad e baja es nula se verá el fondo verde
            } else {
                echo "<tr style='background-color: #FF4545'>"; //Si la fechad e baja no es nula se verá el fondo rojo
            }
            echo "<td>$codigo</td>"; //Muestro el actual código de departamento
            echo "<td>$descripcion</td>"; //Muestro la actual descripción del departamento
            echo "<td>$volumen €</td>"; //Muestro la actual descripción del departamento
            echo "<td>";

            echo "<div class='bocadillo'>"; //Cada bloque como este produce un icono   
            echo "<button  type='submit' name='Editar..'><img src='webroot/images/editar.png'/></button>";
            echo "<span class='textoBocadillo'>Editar</span>";
            echo "</div>";

            echo "<div class='bocadillo'>";
            echo "<button  type='submit' name='Borrar'><img src='webroot/images/borrar.png'/></button>";
            echo "<span class='textoBocadillo'>Borrar</span>";
            echo "</div>";

            if ($fechaBaja != null) {//Dependiendo de el estado del departamento muestro un botón u otro
                echo "<div class='bocadillo'>";
                echo "<button  type='submit' name='Baja'><img src='webroot/images/alta.png'/></button>";
                echo "<span class='textoBocadillo'>Rehabilitación</span>";
                echo "</div>";
            } else {
                echo "<div class='bocadillo'>";
                echo "<button  type='submit' name='Rehabilitar'><img src='webroot/images/baja.png'/></button>";
                echo "<span class='textoBocadillo'>Baja lógica</span>";
                echo "</div>";
            }
            echo "</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
    echo "</form>"; //Cierro el form aquí para que los botones sean funcionales
} else {
    $aDepartamentos = Departamento::buscaDepartamentosPorDescripcion($descripcion, "Todos"); //Devuelve array de objetos

    if ($aDepartamentos) {
        foreach ($aDepartamentos as $Departamento) {
            $codigo =$Departamento->getCodDepartamento();
            $fechaCreacion = $Departamento->getCodDepartamento();
            $descripcion = $Departamento->getDescDepartamento();
            $volumen = $Departamento->getVolumenDeNegocio();
            $fechaBaja = $Departamento->getFechaBajaDepartamento();
            if ($Departamento->getFechaBajaDepartamento() == null) {//Muestro un encabezado u otro
                echo "<tr style='background-color: #80FC7A'>"; //Si la fechad e baja es nula se verá el fondo verde
            } else {
                echo "<tr style='background-color: #FF4545'>"; //Si la fechad e baja no es nula se verá el fondo rojo
            }
            echo "<td>$codigo</td>"; //Muestro el actual código de departamento
            echo "<td>$descripcion</td>"; //Muestro la actual descripción del departamento
            echo "<td>$volumen €</td>"; //Muestro la actual descripción del departamento
            echo "<td>";

            echo "<div class='bocadillo'>"; //Cada bloque como este produce un icono   
            echo "<button  type='submit' name='Editar..'><img src='webroot/images/editar.png'/></button>";
            echo "<span class='textoBocadillo'>Editar</span>";
            echo "</div>";

            echo "<div class='bocadillo'>";
            echo "<button  type='submit' name='Borrar'><img src='webroot/images/borrar.png'/></button>";
            echo "<span class='textoBocadillo'>Borrar</span>";
            echo "</div>";

            if ($fechaBaja != null) {//Dependiendo de el estado del departamento muestro un botón u otro
                echo "<div class='bocadillo'>";
                echo "<button  type='submit' name='Baja'><img src='webroot/images/alta.png'/></button>";
                echo "<span class='textoBocadillo'>Rehabilitación</span>";
                echo "</div>";
            } else {
                echo "<div class='bocadillo'>";
                echo "<button  type='submit' name='Rehabilitar'><img src='webroot/images/baja.png'/></button>";
                echo "<span class='textoBocadillo'>Baja lógica</span>";
                echo "</div>";
            }
            echo "</td>";
            echo "</tr>";
        }
    }
}
?>