<?php
$options = array(
    'location' => 'http://localhost/webservices/tema2/server.php',
    'uri'      => 'http://localhost/webservices/tema2/'
);

$client = new SoapClient(NULL, $options);

$num1 = 4;
$num2 = 2;

$operaciones = ['+', '-', '*', '/'];

foreach ($operaciones as $operador) {
    echo "El resultado de $num1 $operador $num2 es: " . $client->calcular($num1, $num2, $operador) . "<br/>";
}
?>