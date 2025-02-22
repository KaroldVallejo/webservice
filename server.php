<?php

require('conexion.php');

class serverSoap extends Conexion
{
    public function calcular($num1, $num2, $operacion)
    {
        return $this->operacionRecursiva($num1, $num2, $operacion);
    }

    private function operacionRecursiva($num1, $num2, $operacion)
    {
        if ($operacion == '+') {
            return $num1 + $num2;
        } elseif ($operacion == '-') {
            return $num1 - $num2;
        } elseif ($operacion == '*') {
            return $num1 * $num2;
        } elseif ($operacion == '/') {
            return ($num2 != 0) ? $num1 / $num2 : 'Error: División por cero';
        } else {
            return 'Operación no válida';
        }
    }
}
    
// Crear un nuevo servidor SOAP
$options = array('uri' => 'http://localhost/webservices/tema2/');

// Instanciar el servidor SOAP
$server = new SoapServer(NULL, $options);

// Configurar que clase manejará las solicitudes SOAP
$server->setClass('serverSoap');

// Procesar las solicitudes SOAP
$server->handle();

?>
