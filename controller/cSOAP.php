<?php
/**
 * Archivo cSOAP.php
 * 
 * Controlador del servicio SOAP
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */

$provincia = "ZAMORA";
$municipio = "BENAVENTE";


$cliente = new nusoap_client("https://ovc.catastro.meh.es/ovcservweb/ovcswlocalizacionrc/ovccallejero.asmx?wsdl","wsdl");



$cliente-

$tasa = $cliente->ConversionRate($parametros);
$resultado = $tasa->ConversionRateResult;



$resultado = 3;

require_once $vistas['layout'];
