

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div>
        <table  class="tabla01">
            <caption>INICIAR SESIÓN</caption>
            <tr>
                <td>Usuario: </td>
                <td><input type="text" size="15" name="CodUsuario" value="<?php echo $_REQUEST['CodUsuario']; ?>">
                </td>
            </tr>
            <tr>
                <td>Contraseña: </td>
                <td><input type="password" size="15" name="Password" value="<?php echo $_REQUEST['Password']; ?>">
                </td>
            </tr>

            <tr>
                <td></td> 
                <td colspan="2">
                    <input class='btn' type="submit" name="Aceptar" value="Entrar">
                    <input class='btn' type="button" name="Registrarse" value="Registrarse">
                </td>
            </tr>
        </table>
    </div>
</form>


<div class="carrusel" style="margin: 20px auto auto auto;">
    <div>
        <a href="webroot/images/ArbolNavegacion.jpg" target="_blank">ÁRBOL DE NAVEGACIÓN<img src="webroot/images/ArbolNavegacion.jpg" /></a>
        <a href="webroot/images/CasosDeUso.jpg" target="_blank">DIAGRAMA DE CASOS DE USO<img src="webroot/images/CasosDeUso.jpg" /></a>
        <a href="webroot/images/DiagramaDeClases.jpg" target="_blank">DIAGRAMA DE CLASES<img src="webroot/images/DiagramaDeClases.jpg" /></a>
        <a href="webroot/images/EstructuraDeAlmacenamiento.JPG" target="_blank">ESTRUCTURA DE ALMACENAMIENTO<img src="webroot/images/EstructuraDeAlmacenamiento.JPG" /></a>
        <a href="webroot/images/ModeloFisicoDeDatos.jpg" target="_blank">MODELO FÍSICO DE DATOS<img src="webroot/images/ModeloFisicoDeDatos.jpg" /></a>
        <a href="webroot/images/RelacionDeFicheros.jpg" target="_blank">RELACIÓN DE FICHEROS<img src="webroot/images/RelacionDeFicheros.jpg" /></a>
      
    </div>
</div>



