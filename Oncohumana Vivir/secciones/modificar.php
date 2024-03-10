<?php
session_start();
include '../configuraciones/conecta.php';
$usuario = $_SESSION['usuario'];
if (!isset($usuario)){
    header("location:vista_administrador_modificar.php");
}

// Hacer consulta para los datos:
$id = $_GET['id'];
$m = "SELECT * FROM pacientes_eps WHERE id = '$id'";
$modificar = $conecta->query($m);
$dato = $modificar->fetch_array();
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono_fijo = $_POST['telefono_fijo'];
    $telefono_celular = $_POST['telefono_celular'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $EPS = $_POST['EPS'];
    $categoria = $_POST['categoria'];
    // Modificación de datos en tabla:
    $actualiza = "UPDATE pacientes_eps SET id = '$id', tipo ='$tipo', nombres ='$nombres', apellidos ='$apellidos', telefono_fijo ='$telefono_fijo', telefono_celular ='$telefono_celular', correo ='$correo', fecha_nacimiento ='$fecha_nacimiento', EPS ='$EPS', categoria ='$categoria' WHERE id = '$id'";
    $actualizar = $conecta->query($actualiza);
    header("location:vista_administrador_modificar.php");
}
?>


<?php include('../plantillas/header_administrador.php'); ?>

<div class="container">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h3 class="text-center">Modificación de datos de pacientes</h3>
            <form class="" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="row">
                    <input type="number" name="id" class="form-control" value="<?php echo $dato['id'];?>" placeholder="Identificación" required>
                </div>
                <div class="row">
                    <select type="text" name="tipo" class="form-control" value="<?php echo $dato['tipo'];?>" placeholder="Tipo de identificación" required>
                        <option value="cc">CC</option>
                        <option value="ce">CE</option>
                        <option value="ti">TI</option>
                        <option value="pe">PE</option>
                        <option value="ps">PS</option>
                        <option value="rc">RC</option>
                    </select>
                </div>
                <div class="row">
                    <input type="text" name="nombres" class="form-control" value="<?php echo $dato['nombres'];?>" placeholder="Nombres" required>
                </div>
                <div class="row">
                    <input type="text" name="apellidos" class="form-control" value="<?php echo $dato['apellidos'];?>" placeholder="Apellidos" required>
                </div>
                <div class="row">
                    <input type="tel" name="telefono_fijo" class="form-control" value="<?php echo $dato['telefono_fijo'];?>" placeholder="Teléfono fijo" required>
                </div>
                <div class="row">
                    <input type="tel" name="telefono_celular" class="form-control" value="<?php echo $dato['telefono_celular'];?>" placeholder="Teléfono celular" required>
                </div>
                <div class="row">
                    <input type="email" name="correo" class="form-control" value="<?php echo $dato['correo'];?>" placeholder="Correo electrónico" required>
                </div>
                <div class="row">
                    <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $dato['fecha_nacimiento'];?>" placeholder="Fecha de nacimiento" required>
                </div>
                <div class="row">
                    <select type="text" name="EPS" class="form-control" value="<?php echo $dato['EPS'];?>" placeholder="EPS" required>
                        <option value="sura">SURA</option>
                        <option value="colsanitas">Colsánitas</option>
                        <option value="saludcoop">SaludCoop</option>
                    </select>
                </div>
                <div class="row">
                    <select type="text" name="categoria" class="form-control" value="<?php echo $dato['categoria'];?>" placeholder="Categoría" required>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                    </select>
                </div>
                <div class="row">
                    <input type="submit" name="modificar" class="btn btn-primary btn-sm btn-block" value="Modificar">
                </div>
            </form>
    </div>
</div>




<?php include('../plantillas/footer_administrador.php'); ?>