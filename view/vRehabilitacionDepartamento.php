<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table class="tabla01">
        <caption>Rehabilitar departamento</caption>
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
            <td>Fecha de baja</td>
            <td><input type="text"  name="VolumenDeNegocio" value="<?php echo $fechaBaja ?>" disabled>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class='btn' type="submit" name="Aceptar" value="Rehabilitar">
                <input class='btn' type="submit" name="Cancelar" value="Cancelar" >
            </td>
        </tr>
    </table>
</form>