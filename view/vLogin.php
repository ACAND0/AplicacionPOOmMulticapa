<?php
/**
 * Archivo vLogin.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package view
 */
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: flex;justify-content: center;">
    <div>
        <table  class="tabla01 login">
            <caption>INICIAR SESIÓN</caption>
            <tr>
                <td>Usuario: </td>
                <td><input type="text" size="15" name="CodUsuario" value="<?php echo $_REQUEST['CodUsuario']; ?>">
                    <font class="error"><?php echo $aErrores[CodUsuario]; ?></font>
                </td>
            </tr>
            <tr>
                <td>Contraseña: </td>
                <td><input type="password" size="15" name="Password" id="Password" value="<?php echo $_REQUEST['Password']; ?>">
                    <a style="cursor: pointer;" onclick="mostrarPassword()">👁️</a>
                    <font  class="error"><?php echo $aErrores[Password]; ?></font>
                </td>
            </tr>
            <tr>
                <td></td> 
                <td colspan="2">
                    <input class='btn' type="submit" name="Aceptar" value="Entrar">
                    <input class='btn' type="submit" name="Registrarse" value="Registrarse">
                </td>
            </tr>
        </table>
    </div>
</form>

<!--
<div class="carrusel" style="margin: 20px auto auto auto;">
    <div>
        <a href="webroot/images/DiagramaDeClases.png" target="_blank">DIAGRAMA DE CLASES<img src="webroot/images/DiagramaDeClases.png" /></a>    
        <a href="webroot/images/ModeloFisicoDeDatos.png" target="_blank">MODELO FÍSICO DE DATOS<img src="webroot/images/ModeloFisicoDeDatos.png" /></a>        
        <a href="webroot/images/EstructuraDeAlmacenamiento.JPG" target="_blank">ESTRUCTURA DE ALMACENAMIENTO<img src="webroot/images/EstructuraDeAlmacenamiento.JPG" /></a>       
        <a href="webroot/images/ArbolNavegacion.jpg" target="_blank">ÁRBOL DE NAVEGACIÓN<img src="webroot/images/ArbolNavegacion.jpg" /></a>
        <a href="webroot/images/CasosDeUso.jpg" target="_blank">DIAGRAMA DE CASOS DE USO<img src="webroot/images/CasosDeUso.jpg" /></a>
        <a href="webroot/images/RelacionDeFicheros.jpg" target="_blank">RELACIÓN DE FICHEROS<img src="webroot/images/RelacionDeFicheros.jpg" /></a>
    </div>
</div>-->
<br>
<section class="sUno">
    <div class="contenedor">
        <div class="imagenes">
            <div>
                <a href="webroot/images/DiagramaDeClases.png" target="_blank">DIAGRAMA DE CLASES<img src="webroot/images/DiagramaDeClases.png" height="400" width="650" /></a>    
                <a href="webroot/images/ModeloFisicoDeDatos.png" target="_blank">MODELO FÍSICO DE DATOS<img src="webroot/images/ModeloFisicoDeDatos.png" height="400" width="650" /></a>        
                <a href="webroot/images/EstructuraDeAlmacenamiento.JPG" target="_blank">ESTRUCTURA DE ALMACENAMIENTO<img src="webroot/images/EstructuraDeAlmacenamiento.JPG" height="400" width="650" /></a>       
                <a href="webroot/images/ArbolNavegacion.jpg" target="_blank">ÁRBOL DE NAVEGACIÓN<img src="webroot/images/ArbolNavegacion.jpg" height="400" width="650" /></a>
                <a href="webroot/images/CasosDeUso.jpg" target="_blank">DIAGRAMA DE CASOS DE USO<img src="webroot/images/CasosDeUso.jpg" height="400" width="650" /></a>
                <a href="webroot/images/RelacionDeFicheros.jpg" target="_blank">RELACIÓN DE FICHEROS<img src="webroot/images/RelacionDeFicheros.jpg" height="400" width="650" /></a>
            </div>
        </div><br>
        <div class="botones">
            <label></label>
            <label></label>
            <label></label>
            <label></label>
            <label></label>
            <label></label>
        </div>
    </div>
</section>




