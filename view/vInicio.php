<?php 
    if(($_SESSION['usuario']->getNumAccesos())> 0){
        setlocale(LC_TIME, 'es_ES.UTF-8'); //Selecciona el idioma. 
        date_default_timezone_set('Europe/Madrid');//Zona horaria
        
        echo "<p class='formCentrado' style='font-size: 1.5em'>";
        echo "Bienvenid@ de nuevo, " . $_SESSION['usuario']->getCodUsuario() . "<br>";
        echo "Usted ha visitado esta página " . $_SESSION['usuario']->getNumAccesos() . " veces hasta ahora<br>";
        echo 'Usted se ha conectado por última vez el ' . strftime("%A %d de %B del %Y a las %H:%M:%S",$_SESSION['usuario']->getFechaHoraUltimaConexion()) . "</p>";
        
    }else{
        echo "<p class='formCentrado' style='font-size: 1.5em'>";
        echo "Bienvenid@ por primera vez, " . $_SESSION['usuario']->getCodUsuario() . "<br></p>";
    }

?>

<form class="formCentrado"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input class='btn' type="submit" name="EditarPerfil" value="Editar Perfil"/>
    <input class='btn' type="submit" name="MantenimientoDepartamentos" value="Mantenimiento Departamentos"/> 
    <input class='btn' type="submit" name="Salir" value="Cerrar Sesión"/>

    <?php
    if ($_SESSION['usuario']->getPerfil() == "administrador") {
        //Este botón tan sólo estará disponible si entras con una cuenta de administrador
        ?>
        <input class='btn' type="submit" name="MantenimientoUsuarios" value="MantenimientoUsuarios"/>            
    <?php } ?>
</form>