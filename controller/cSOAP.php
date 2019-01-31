<?php

$cliente = new SoapClient("http://www.webservicex.net/CurrencyConvertor.asmx?WSDL");


$parametros = [
    FromCurrency => "EUR",
    ToCurrency => "USD"
];

$cliente->

$tasa = $cliente->ConversionRate($parametros);
$resultado = $tasa->ConversionRateResult;



$resultado = 3;

require_once $vistas['layout'];
