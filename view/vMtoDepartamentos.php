<h1 class="titulo">MANTENIMIENTO DE DEPARTAMENTOS</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

    <div class="cajabusqueda" >
        <input class="cajabuscar" type="text"  name="buscarPorDesc" placeholder="Introduzca búsqueda por descripción"
               value="<?php echo $_REQUEST['buscarPorDesc']; ?>" >

        <input class='btn' type="submit" name="Buscar" value="Buscar">
        <input class='btn' type='submit' name='limpiarBuscar' value='Limpiar Búsqueda' ><br>
        Criterios de búsqueda:

        <input type="radio" name="criterioBusqueda" <?php
        if ($_REQUEST['criterioBusqueda'] == "Baja") {
            echo "checked";
        }
        ?> value="Baja">Baja

        <input type="radio" name="criterioBusqueda" <?php
        if ($_REQUEST['criterioBusqueda'] == "Alta") {
            echo "checked";
        }
        ?> value="Alta">Alta

        <input type="radio" name="criterioBusqueda" <?php
        if ($_REQUEST['criterioBusqueda'] == "Todos") {
            echo "checked";
        }
        ?> value="Todos">Todos

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
        foreach ($aDepartamentos as $key => $Departamento) {
            $key = $key + $primerRegistro; //Con esto asigno al key su valor actual más el de la propia página
            
            $fechaBaja = $Departamento->getFechaBajaDepartamento();
            if ($fechaBaja == null) {
                ?>
                <tr style='background-color: #80FC7A'> <!-- Si la fechad e baja es nula se verá el fondo verde -->
                <?php } else { ?>
                <tr style='background-color: #FF4545'> <!-- Si la fechad e baja no es nula se verá el fondo rojo -->
                <?php } ?>
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

                    <?php if ($fechaBaja != null) { ?><!-- Dependiendo de el estado del departamento muestro un botón u otro -->
                        <div class='bocadillo'>
                            <button  type='submit' name='Rehabilitar<?php echo $key ?>'><img src='webroot/images/alta.png'/></button>
                            <span class='textoBocadillo'>Rehabilitación</span>
                        </div>
                    <?php } else { ?>
                        <div class='bocadillo'>
                            <button  type='submit' name='Baja<?php echo $key ?>'><img src='webroot/images/baja.png'/></button>
                            <span class='textoBocadillo'>Baja lógica</span>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>

    </table>
    <div class="paginacion">
        <a href="?pag=1">Primera</a>
        <a href="?pag=<?php if($_GET[pag]>1){echo (($_GET[pag])-1);}else{ echo "1";}?>"><</a>
        <?php
        //Array para recorrer las páginas y poder crear la paginación
        //Muestro los números de página creando links que podifican la página
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo " <a href='?pag=" . $i . "'>" . $i . "</a> "; //Link que al pulsarlo almacena una variable en la URL llamada página con el valor de páginas
        }
        
        ?>
        <a href="?pag=<?php if($_GET[pag]<$totalPaginas){echo (($_GET[pag])+1);}else{echo $totalPaginas;}?>">></a>
        <a href="?pag=<?php echo $totalPaginas ?>">Ultima</a>
        <br>Página  <?php echo $pagina ?> de <?php echo $totalPaginas?>
    </div>
</form>




