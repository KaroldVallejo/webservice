<?php
$options = array(
    'location' => 'http://localhost/webservices/tema2/server.php',
    'uri'      => 'http://localhost/webservices/tema2/'
);

$client = new SoapClient(NULL, $options);

// Pruebas de operaciones matemáticas
$num1 = 4;
$num2 = 2;
$operaciones = ['+', '-', '*', '/'];

foreach ($operaciones as $operador) {
    echo "El resultado de $num1 $operador $num2 es: " . $client->calcular($num1, $num2, $operador) . "<br/>";
}

// Obtener lista de productos
echo "<br/>Lista de productos:<br/>";
$productos = $client->getProducts();
foreach ($productos as $producto) {
    echo "ID: " . $producto['id'] . " - Nombre: " . $producto['nombre'] . " - Precio: $" . $producto['precio'] . "<br/>";
}

// Prueba de validación de usuario
$usuario = "admin";
$clave = "12345";

echo "<br/>Validación de usuario: " . $client->validarUsuario($usuario, $clave);
?>
