<?php if (isset($_SESSION['usuario'])) { ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <input type="submit" name="salir" value="Cerrar sesión">
    </form>
    <?php
}
?>