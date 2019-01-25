<?php 
    if($NumAccesos > 0){
        echo "<p class='formCentrado' style='font-size: 1.5em'>";
        echo "Bienvenid@ de nuevo, " . $CodUsuario . "<br>";
        echo "Usted ha visitado esta página " . $NumAccesos . " veces hasta ahora<br>";
        echo 'Usted se ha conectado por última vez el ' . $FechaHoraUltimaConexion . "</p>";
        
    }else{
        echo "<p class='formCentrado' style='font-size: 1.5em'>";
        echo "Bienvenid@ por primera vez, " . $CodUsuario . "<br></p>";
    }

?>

<form class="formCentrado"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input class='btn' type="submit" name="EditarPerfil" value="Editar Perfil"/>
    <input class='btn' type="submit" name="MantenimientoDepartamentos" value="Mantenimiento Departamentos"/> 
    <input class='btn' type="submit" name="Salir" value="Cerrar Sesión"/>

    <?php
    if ($Perfil == "administrador") {
        //Este botón tan sólo estará disponible si entras con una cuenta de administrador
        ?>
        <input class='btn' type="submit" name="MantenimientoUsuarios" value="MantenimientoUsuarios"/>            
    <?php } ?>
</form>