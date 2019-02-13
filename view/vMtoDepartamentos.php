<h1 class="titulo">MANTENIMIENTO DE DEPARTAMENTOS</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
    <div class="cajabusqueda" >
        <input class="cajabuscar" type="text"  name="buscarPorDesc" placeholder="Introduzca búsqueda por descripción" value="<?php echo $_SESSION['buscarPorDesc']; ?>" >
        
        <input class='btn' type="submit" name="Buscar" value="Buscar">
        <input class='btn' type='submit' name='limpiarBuscar' value='Limpiar Búsqueda' ><br>
        
        Criterios de búsqueda:
        <input type="radio" name="criterioBusqueda" <?php if ($_SESSION['criterioBusqueda'] == "Baja") {echo "checked";}?> value="Baja">Baja
        <input type="radio" name="criterioBusqueda" <?php if ($_SESSION['criterioBusqueda'] == "Alta") {echo "checked";}?> value="Alta">Alta
        <input type="radio" name="criterioBusqueda" <?php if ($_SESSION['criterioBusqueda'] == "Todos") {echo "checked";}?> value="Todos">Todos
    </div>

    <br><br>
    
    <div style="margin: 0 auto;text-align: center;">
        <input class='btn' type="submit" name="Importar" value="Importar" >
        <input class='btn' type="submit" name="Exportar" value="Exportar" >
        <input class='btn' type="submit" name="Añadir" value="Añadir" >
        <input class='btn' type="submit" name="Salir" value="Volver atrás">
    </div>


    <table class='tabla02'>
        <tr class='primerafila'>
            <td>Código</td>
            <td>Descripción</td>
            <td>Fecha de creación</td>
            <td>Volumen de negocio</td>
            <td>Acciones</td>
        </tr>
        <?php
        foreach ($_SESSION['aDepartamentos'] as $key => $Departamento) {
            // $key = $key + $primerRegistro; //Con esto asigno al key su valor actual más el de la propia página

            $fechaBaja = $Departamento->getFechaBajaDepartamento();

            if ($fechaBaja == null) {
                ?>
                <tr style='background-color: #80FC7A'><!-- Si la fechad e baja es nula se verá el fondo verde -->
                    <td><?php echo $Departamento->getCodDepartamento(); ?></td>  <!-- Muestro el actual código de departamento -->
                    <td><?php echo $Departamento->getDescDepartamento(); ?></td> <!-- Muestro la actual descripción del departamento -->                
                    <td><?php echo $Departamento->getFechaCreacionDepartamento(); ?></td> <!-- Muestro la actual descripción del departamento -->
                    <td><?php echo $Departamento->getVolumenDeNegocio(); ?> €</td> <!-- Muestro la actual descripción del departamento -->
                    <td>                     
                        <div class='bocadillo'> <!-- Cada bloque como este produce un icono   -->
                            <button  type='submit' name='Editar<?php echo $key ?>'><img src='webroot/images/editar.png'/></button>
                            <span class='textoBocadillo'>Editar</span>
                        </div>
                        <div class='bocadillo'>
                            <button  type='submit' name='Borrar<?php echo $key ?>'><img src='webroot/images/borrar.png'/></button>
                            <span class='textoBocadillo'>Borrar</span>
                        </div>
                        <div class='bocadillo'>
                            <button  type='submit' name='Baja<?php echo $key ?>'><img src='webroot/images/baja.png'/></button>
                            <span class='textoBocadillo'>Baja lógica</span>
                        </div>
                    </td>
                </tr>

            <?php } else { ?>
                <tr style='background-color: #FF4545'> <!-- Si la fechad e baja no es nula se verá el fondo rojo -->
                    <td><?php echo $Departamento->getCodDepartamento(); ?></td>  <!-- Muestro el actual código de departamento -->
                    <td><?php echo $Departamento->getDescDepartamento(); ?></td> <!-- Muestro la actual descripción del departamento -->                
                    <td><?php echo $Departamento->getFechaCreacionDepartamento(); ?></td> <!-- Muestro la actual descripción del departamento -->
                    <td><?php echo $Departamento->getVolumenDeNegocio(); ?> €</td> <!-- Muestro la actual descripción del departamento -->
                    <td>                                             
                        <div class='bocadillo'>
                            <button  type='submit' name='Borrar<?php echo $key ?>'><img src='webroot/images/borrar.png'/></button>
                            <span class='textoBocadillo'>Borrar</span>
                        </div>
                        <div class='bocadillo'>
                            <button  type='submit' name='Rehabilitar<?php echo $key ?>'><img src='webroot/images/alta.png'/></button>
                            <span class='textoBocadillo'>Rehabilitación</span>
                        </div>
                    </td>
                </tr>

            <?php } ?>
    <?php } ?>
        </table>

    <br>
    <div class="paginacion">

        <?php
        if ($totalPaginas != 0) {//Si existe más de una página, es decir si existen departamentos

            /*             * ******************BOTÓN DE PRIMERA PÁGINA************************** */
            if ($totalPaginas >= 1 && $pagina != 1) { //Si hay más de uyna página se muestra el botón de primero
                echo "<a href='?pag=1&?buscarPorDesc" . $_SESSION['buscarPorDesc'] . "&?criterioBusqueda=" . $_SESSION['criterioBusqueda'] . "'>Primera</a>";
            } else {
                echo " <a href='' id='inactivo'>Primera</a> "; //Link inactivo para mantener la apariencia
            }

            /*             * ******************BOTÓN DE ATRASO DE PÁGINA************************** */
            if ($pagina > 1) {//Si la página es mayor que uno muestro el botón de siguiente página
                echo " <a href='?pag=" . (($_GET[pag]) - 1) . "&?buscarPorDesc=" . $_SESSION['buscarPorDesc'] . "&?criterioBusqueda=" . $_SESSION['criterioBusqueda'] . "'>⬅</a> "; //Link que al pulsarlo almacena una variable en la URL llamada página con el valor de páginas
            } else {
                echo " <a href='' id='inactivo'>⬅</a> "; //Link inactivo para mantener la apariencia
            }

            /*             * ******************BOTÓN DE AVANCE DE PÁGINA************************** */
            if ($pagina < $totalPaginas) {
                if (($_GET[pag] == "")) {//Cuando la variable get no está definida en la URL, es decir la primera vez que se entra a la página
                    //Se suman 2 páginas para que vaya a ala segunda y no a la primera
                    echo " <a href='?pag=" . (($_GET[pag]) + 2) . "&?buscarPorDesc=" . $_SESSION['buscarPorDesc'] . "&?criterioBusqueda=" . $_SESSION['criterioBusqueda'] . "'>➡</a> "; //Link que al pulsarlo almacena una variable en la URL llamada página con el valor de páginas
                } else {
                    echo " <a href='?pag=" . (($_GET[pag]) + 1) . "&?buscarPorDesc=" . $_SESSION['buscarPorDesc'] . "&?criterioBusqueda=" . $_SESSION['criterioBusqueda'] . "'>➡</a> "; //Link que al pulsarlo almacena una variable en la URL llamada página con el valor de páginas
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




