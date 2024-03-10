<?php
 $servidor = "localhost";
 $usuario = "root";
 $password = "";
 $basedatos = "oncohumana_vivir";

 $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
if($conexion->connect_error) {
    die("Error de conexión: ".$conexion->connect_error);

}
echo "Conexión establecida...";

// Crear TABLA paciente_EPS (verificar phpMyAdmin)
$sql = "CREATE TABLE pacientes_EPS (
    id INT PRIMARY KEY,
    tipo VARCHAR(50),
    nombres VARCHAR(100),
    apellidos VARCHAR(100),
    edad INT,
    telefono_fijo VARCHAR(20),
    telefono_celular VARCHAR(20),
    correo VARCHAR(100),
    fecha_nacimiento DATE,
    EPS ENUM('SURA', 'Cosánitas', 'SaludCoop'),
    categoria ENUM('A', 'B', 'C')
);";

// Crear TABLA agenda (verificar phpMyAdmin)
$sql = "CREATE TABLE agenda (
    id INT PRIMARY KEY,
    tipo VARCHAR(50),
    nombres VARCHAR(100),
    apellidos VARCHAR(100),
    fecha_cita DATETIME,
    estado ENUM('Paciente de ingreso', 'Paciente en sala', 'Atendido'),
    FOREIGN KEY (id) REFERENCES pacientes_EPS(id)
);";

if($conexion->query($sql)==TRUE) {
    echo "Tabla creada";

} else {
    echo "Error en la creación de la tabla".$conexion->error;
}


?>