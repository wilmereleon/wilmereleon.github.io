<?php
// Declaración de variables para guardar valores de conexión:

$servidor = "localhost";
$usuario = "root";
$contrasenna = "";
$basedatos = "oncohumana_vivir";
$conecta = mysqli_connect($servidor, $usuario, $contrasenna, $basedatos);

if($conecta->connect_error){
    die("Error al conectar de base de datos de Oncohumana Vivir".$conecta->connect_error);
}
echo "Conexión establecida...";

?>