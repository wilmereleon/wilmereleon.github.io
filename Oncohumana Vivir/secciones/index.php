<?php

session_start();

// Solicitar la conexión a la base de datos para restringir ingreso
include '../configuraciones/conecta.php';


$usuario = $_SESSION['usuario'];

if(!isset($usuario)) {
    header("location:../index.php");
}

$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$ejecuta = $conecta->query($consulta);

// Selecciona toda la fila de datos del usuario invocado
$row = $ejecuta->fetch_assoc();
?>






<?php include('../plantillas/header.php'); ?>
 

<div class="container">
    <div class="row">
        <h1>Hola, <?php  echo $usuario;?></h1>
        
    </div>
</div>
<div class="container py-3">
    <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
          <p><b>Identificación:</b> <?php  echo $row['id_usuario']?></p>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <p><b>Nombres:</b> <?php  echo $row['nombres']?></p>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <p><b>Apellidos:</b> <?php  echo $row['apellidos']?></p>
        </div>
    </div>
</div>
    
<?php include('../plantillas/footer.php'); ?>
