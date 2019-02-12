<h1 class="titulo">MANTENIMIENTO DE USUARIOS</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

    <div class="cajabusqueda" >
        <input class="cajabuscar" type="text"  name="buscarPorDesc" placeholder="Introduzca búsqueda por descripción"
               value="<?php echo $_REQUEST['buscarPorDesc']; ?>" >

        <input class='btn' type="submit" name="Buscar" value="Buscar">
        <input class='btn' type='submit' name='limpiarBuscar' value='Limpiar Búsqueda' ><br>


    </div>

    <br><br>
    <div style="margin: 0 auto;text-align: center;">
        <input class='btn' type="submit" name="Importar" value="Importar" >
        <input class='btn' type="submit" name="Exportar" value="Exportar" >
        <input class='btn' type="submit" name="Salir" value="Volver atrás">
    </div>


    <table class='tabla02'>
        <tr class='primerafila'>
            <td>Código</td>
            <td>Descripción</td>
            <td>Perfil</td>
            <td>Visitas</td>
            <td>Fecha Última Conexión</td>
            <td>Acciones</td>
        </tr>
        <?php
        foreach ($aUsuarios as $key => $Usuario) {//Recorro el array de usuarios por usuarios y obteniendo el key/índice

            $codigo = $Usuario->getCodUsuario();
            $desc = $Usuario->getDescUsuario();
            $perfil = $Usuario->getPerfil();
            $Visitas = $Usuario->getNumAccesos();
            if ($codigo != $_SESSION['usuario']->getCodUsuario()) {//Si el código del usuario actual coincide con el de el usuario que ha iniciado una sesión, no se muestra


                if (is_null($Usuario->getFechaHoraUltimaConexion())) {
                    $ultimaConexion = "Este usuario no ha visitado la página";
                } else {
                    $ultimaConexion = strftime("%Y-%m-%d  %H:%M:%S", $Usuario->getFechaHoraUltimaConexion());
                }
                ?>
                <tr style='background-color: white'>
                    <td><?php echo $codigo ?></td>
                    <td><?php echo $desc ?></td>
                    <td><?php echo $perfil ?></td>
                    <td><?php echo $Visitas ?></td>
                    <td><?php echo $ultimaConexion ?></td>
                    <td>

                        <div class='bocadillo'>
                            <button  type='submit' name='Editar<?php echo $key ?>'><img src='webroot/images/editar.png'/></button>
                            <span class='textoBocadillo'>Editar</span>
                        </div>
                        <div class='bocadillo'>
                            <button  type='submit' name='Borrar<?php echo $key ?>'><img src='webroot/images/borrar.png'/></button>
                            <span class='textoBocadillo'>Borrar</span>
                        </div>

                    </td>
                </tr>

            <?php }
        } ?>
    </table>
</form>