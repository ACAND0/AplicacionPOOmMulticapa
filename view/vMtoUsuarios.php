<h1 class="titulo">MANTENIMIENTO DE USUARIOS</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

    <div class="cajabusqueda" >
        <input class="cajabuscar" type="text"  name="buscarPorDesc" placeholder="Introduzca búsqueda por descripción"
               value="<?php echo $_SESSION['buscarPorDesc']; ?>" >

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
        foreach ($_SESSION['aUsuarios'] as $key => $Usuario) {//Recorro el array de usuarios por usuarios y obteniendo el key/índice

            $codigo = $Usuario->getCodUsuario();
            $desc = $Usuario->getDescUsuario();
            $perfil = $Usuario->getPerfil();
            $Visitas = $Usuario->getNumAccesos();
            


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
           <?php if ($codigo != $_SESSION['usuario']->getCodUsuario()) {//Si el código del usuario actual coincide con el de el usuario que ha iniciado una sesión, no se muestra?>

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

            <?php }else{
                echo "Usuario actual";
            }
        } ?>
    </table>
    
    <br>
    <div class="paginacion">

        <?php
        if ($totalPaginas != 0) {//Si existe más de una página, es decir si existen departamentos

            /*             * ******************BOTÓN DE PRIMERA PÁGINA************************** */
            if ($totalPaginas >= 1 && $pagina != 1) { //Si hay más de uyna página se muestra el botón de primero
                echo "<a href='?pag=1&?buscarPorDesc" . $_SESSION['buscarPorDesc'] . "&?criterioBusqueda=" ."'>Primera</a>";
            } else {
                echo " <a href='' id='inactivo'>Primera</a> "; //Link inactivo para mantener la apariencia
            }

            /*             * ******************BOTÓN DE ATRASO DE PÁGINA************************** */
            if ($pagina > 1) {//Si la página es mayor que uno muestro el botón de siguiente página
                echo " <a href='?pag=" . (($_GET[pag]) - 1) . "&?buscarPorDesc=" . $_SESSION['buscarPorDesc']."'>⬅</a> "; //Link que al pulsarlo almacena una variable en la URL llamada página con el valor de páginas
            } else {
                echo " <a href='' id='inactivo'>⬅</a> "; //Link inactivo para mantener la apariencia
            }

            /*             * ******************BOTÓN DE AVANCE DE PÁGINA************************** */
            if ($pagina < $totalPaginas) {
                if (($_GET[pag] == "")) {//Cuando la variable get no está definida en la URL, es decir la primera vez que se entra a la página
                    //Se suman 2 páginas para que vaya a ala segunda y no a la primera
                    echo " <a href='?pag=" . (($_GET[pag]) + 2) . "&?buscarPorDesc=" . $_SESSION['buscarPorDesc'] ."'>➡</a> "; //Link que al pulsarlo almacena una variable en la URL llamada página con el valor de páginas
                } else {
                    echo " <a href='?pag=" . (($_GET[pag]) + 1) . "&?buscarPorDesc=" . $_SESSION['buscarPorDesc'] ."'>➡</a> "; //Link que al pulsarlo almacena una variable en la URL llamada página con el valor de páginas
                }
            } else {
                echo " <a href='' id='inactivo'>➡</a> "; //Link inactivo para mantener la apariencia
            }

            /*             * ******************BOTÓN DE ÚLTIMA PÁGINA************************** */
            if ($totalPaginas > 1 && $pagina != $totalPaginas) { //Si hay más de uyna página se muestra el botón de último y no es la última
                echo "<a href='?pag=" . $totalPaginas . "'>Última</a>";
            } else {
                echo " <a href='' id='inactivo'>Última</a> "; //Link inactivo para mantener la apariencia
            }

            /*             * ******************INFORMACIÓN PÁGINA ACTUAL Y TOTAL************************** */
            echo "<br>Página " . $pagina . " de " . $totalPaginas;
        } else {//Si no existen resultados se muestra un mensaje de error
            echo "Parece que el departamento que busca no existe...";
        }
        ?>
    </div>
</form>