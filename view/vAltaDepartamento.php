<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="tabla01">
            <caption>REGISTRO</caption>
            <tr>
                <td>Nombre de departamento</td>
                <td><input type="text" size="15" name="CodDepartamento" value="<?php echo $_REQUEST['CodDepartamento']; ?>">
                    <font class="error"><?php echo $aErrores[CodDepartamento]; ?></font>
                </td>
            </tr>
            <tr>
                <td>Descripción del departamento</td>
                <td>
                    <textarea type="textarea"name="DescDepartamento" rows="5" cols="30"><?php echo $_REQUEST['DescDepartamento']; ?></textarea>
                    <font class="error"><?php echo $aErrores[DescDepartamento]; ?></font>
                </td>
            </tr>
            <tr>
                <td>Volumen de negocio</td>
                <td><input type="number" size="50" name="VolumenDeNegocio" value="<?php echo $_REQUEST['VolumenDeNegocio']; ?>">
                    <font class="error"><?php echo $aErrores[VolumenDeNegocio]; ?></font>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class='btn' type="submit" name="Aceptar" value="Aceptar">
                    <input class='btn' type="submit" name="Cancelar" value="Cancelar" >
                </td>
            </tr>
        </table>
</form>