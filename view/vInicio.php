<?php
if ($NumAccesos > 0) {
    echo "<p class='formCentrado apariciontexto' style='font-size: 1.5em'>";
    echo "Bienvenid@ de nuevo, " . $CodUsuario . "<br>";
    echo "Usted ha visitado esta página " . $NumAccesos . " veces hasta ahora<br>";
    echo 'Usted se ha conectado por última vez el ' . $FechaHoraUltimaConexion . "</p>";
} else {
    echo "<p class='formCentrado' style='font-size: 1.5em'>";
    echo "Bienvenid@ por primera vez, " . $CodUsuario . "<br></p>";
}
?>

<form class="formCentrado"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><br>
    <input class='btn' type="submit" name="EditarPerfil" value="Editar Perfil"/><br>
    <?php
    if ($Perfil == "administrador") {
        //Este botón tan sólo estará disponible si entras con una cuenta de administrador
        ?>
        <input class='btn' type="submit" name="MantenimientoUsuarios" value="MantenimientoUsuarios"/>
    <?php } ?>   
    <input class='btn' type="submit" name="MantenimientoDepartamentos" value="Mantenimiento Departamentos"/><br>


    <input class='btn' type="submit" name="SOAP" value="SOAP"/><br>
    <input class='btn' type="submit" name="REST" value="REST"/><br>
    <input class='btn' type="submit" name="Salir" value="Cerrar Sesión"/>


</form>