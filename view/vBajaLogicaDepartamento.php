<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table class="tabla01">
        <caption>Dar de baja departamento</caption>
        <tr>
            <td>Nombre de departamento</td>
            <td><input type="text" size="15" name="CodDepartamento" value="<?php echo $codigo ?>" disabled>
            </td>
        </tr>
        <tr>
            <td>Fecha de creación</td>
            <td><input type="text" size="15" name="CodDepartamento" value="<?php echo $fechaCreacion ?>" disabled>
            </td>
        </tr>
        <tr>
            <td>Descripción del departamento</td>
            <td>
                <textarea type="textarea"name="DescDepartamento" rows="5" cols="30" disabled><?php echo $descripcion ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Volumen de negocio</td>
            <td><input type="number" size="50" name="VolumenDeNegocio" value="<?php echo $volumen ?>" disabled>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class='btn' type="submit" name="Aceptar" value="Dar de baja">
                <input class='btn' type="submit" name="Cancelar" value="Cancelar" >
            </td>
        </tr>
    </table>
</form>