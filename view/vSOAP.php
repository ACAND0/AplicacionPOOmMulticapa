<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div>
        <table  class="tabla01">
            <caption>CONVERSIÓN<br>$ / €</caption>
            <tr>
                <td>EUROS €</td>
                <td><input type="number" size="5" name="euros">
                </td>
            </tr>
            <tr>
                <td>USD $</td>
                <td><input type="text" size="5" name="USD" value="<?php echo $resultado ?>" disabled>
                </td>
            </tr>

            <tr>
                <td></td> 
                <td colspan="2">
                    <input class='btn' type="submit" name="Convertir" value="Convertir">
                </td>
            </tr>
        </table>
    </div>
</form>