<?php

include_once 'lib/nusoap.php'; //Incluyo el php d ela libreria SOAP

$servicio = new soap_server(); //Creo el servicio SOAP

$wsdl = "http://webservices.amazon.com/AWSECommerceService/AWSECommerceService.wsdl";//WSDL de amazon

$servicio->configureWSDL("ServicioSOAP", $namespace); //Nombre del servicio y espacio de nombres
$servicio->schemaTargetNamespace = $namespace;

//Nombre de la función que devuelve un resultado y parametros que devuelve
//Y sus parámetros almacenados en un array con sus tipos
//Podemos pasar varios parámetros, dependiendo los que albergue la función
$aParametros = [parametro1 => 'xsd:string', parametro2 => "xsd:integer"];

$servicio->register("Funcion", $aParametros);

function Funcion($num1, $num2) {

    $resultadoMult = $num1 * $num2;
    $resultado = "Su multiplicación de" . $num1 . " y " . $num2 . " es: " . $resultadoMult;
    return $resultado;
}


//$HTTP_RAW_POST_DATA -> Almacena datos POST sin tratar, si hay datos sin tratar se asignan 
//a una variable la cual se va a a asignar a el servicio
//http://php.net/manual/es/reserved.variables.httprawpostdata.php

 if (isset($HTTP_RAW_POST_DATA)) {
    $HTTP_RAW_POST_DATA = $HTTP_RAW_POST_DATA;
} else {
    $HTTP_RAW_POST_DATA = '';
};


$servicio->service($HTTP_RAW_POST_DATA);
?>
