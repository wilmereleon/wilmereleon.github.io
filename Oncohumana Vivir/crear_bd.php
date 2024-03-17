<?php
 $servidor = "localhost";
 $usuario = "root";
 $password = "";

 $conexion = new mysqli($servidor, $usuario, $password);
if($conexion->connect_error) {
    die("Error de conexión: ".$conexion->connect_error);

}
echo "Conexión establecida...";

$sql = "CREATE DATABASE oncohumana_vivir";

if($conexion->query($sql)===TRUE) {
    echo "Base de datos creada";

} else {
    echo "Error a la hora de conectarse a la base de datos".$conexion->error;
}


?>