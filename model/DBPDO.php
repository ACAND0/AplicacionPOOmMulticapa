<?php

Class DBPDO {

    public static function ejecutarConsulta($sentenciaSQL, $parametros) {
        try {//Establecemos la conexión a la base de datos
            $DB = new PDO(DSN, usuario, contraseña, opciones);
            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultSet = $DB->prepare($sentenciaSQL); //Preparamamos la consulta que será pasada como un parámetro
            $resultSet->execute($parametros); //Ejecutamos la consulta con los parámetros
        } catch (PDOException $error) {//Si hay algún error
            $resultSet = null; //Destruimos la consulta
            echo "<span>ERROR: " . $error->getMessage() . "</span>"; //Se muestra un mensaje de error si lo hay    
            echo "<span>CÓDIGO: " . $error->getCode() . "</span>"; //Se muestra el código del error
            unset($DB);
        }
        return $resultSet; //Resultado que nos devuelve un conjunto de registros afectados.
    }
}

?>