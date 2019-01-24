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
