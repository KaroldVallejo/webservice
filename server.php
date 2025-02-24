<?php
require('conexion.php');

class serverSoap extends Conexion
{
    public function __construct()
    {
        parent::__construct(); // Heredar conexión a la BD
    }

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

    public function getProducts()
    {
        $query = "SELECT * FROM producto";
        $result = $this->db->query($query);
        $productos = [];

        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }

        return $productos;
    }

    public function validarUsuario($usuario, $clave)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ? AND clave = ?");
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return "Los datos ingresados son válidos";
        } else {
            return "Los datos ingresados no coinciden, intente de nuevo";
        }
    }
}

// Configuración del servidor SOAP
$options = array('uri' => 'http://localhost/webservices/tema2/');
$server = new SoapServer(NULL, $options);
$server->setClass('serverSoap');
$server->handle();
?>
