<?php
include '../configuraciones/conecta.php';
// Consulta:
$consulta = "SELECT * FROM pacientes_eps";
$guardar = $conecta->query($consulta);

// Consulta de búsqueda:
$where ="";
if (!empty($_POST)) {
  $valor = $_POST['busqueda'];
  if (!empty($valor)) {
    $where = "WHERE id LIKE '%$valor%'";
  }
}
$consultaB = "SELECT * FROM pacientes_eps $where";
$resultado = $conecta->query($consultaB);

// VALIDACIÓN DE EXISTENCIA DE BOTÓN ENVIAR:
if (isset($_POST['registrar'])) {
  // Recibir datos:
  $id = $_POST['id'];
  $tipo = $_POST['tipo'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $telefono_celular = $_POST['telefono_celular'];
  $correo = $_POST['correo'];

  // Consulta:
  $consulta = "INSERT INTO pacientes_eps (id, tipo, nombres, apellidos, fecha_nacimiento, telefono_celular, correo) VALUES ('$id', '$tipo','$nombres', '$apellidos', '$fecha_nacimiento', '$telefono_celular', '$correo')";
  $guardar = $conecta->query($consulta);

  // Validación:
  if ($guardar) {
    echo "<script>alert('Registro exitoso')</script>";
    echo "<script>window.location.replace('../secciones/vista_administrador_modificar.php')</script>";
  } else {
    echo "<script>alert('Registro fallido')</script>";
    echo "<script>window.location.replace('../secciones/vista_administrador_modificar.php')</script>";
  }
}
?>

<?php include('../plantillas/header_administrador.php'); ?>

<h1>Base de datos de Oncohumana Vivir (pacientes)</h1>

<div class="container">
  <div class="col-sm-12 col-md col-lg-12">
  <h4 class="text-center">Registro de pacientes en BD</h4>
    <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="number" name="id" placeholder="Número de identificación" class="form-control" required>
      <select type="text" class="form-control" name="tipo" placeholder="Tipo de identificación" required>
        <option value="cc">CC</option>
        <option value="ce">CE</option>
        <option value="ti">TI</option>
        <option value="pe">PE</option>
        <option value="ps">PS</option>
        <option value="rc">RC</option>
      </select>
      <input type="text" name="nombres" placeholder="Nombres" class="form-control" required>
      <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" required>
      <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" class="form-control" required>
      <!-- Selección de género (pendiente para que previamente se añada la columna de género) -->
      <!-- <select class="form-control" name="genero" required> -->
        <!-- <option value="">Selecciona un género</option> -->
      <!-- </select> -->
      <input type="tel" name="telefono_celular" placeholder="Teléfono celular" class="form-control" required>
      <input type="email" name="correo" placeholder="Correo electrónico" class="form-control" required>
      <input type="submit" name="registrar" value="registrar" class="btn btn-primary btn-block">

    </form>

  </div>
<div class="container">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <h4>Búsqueda de pacientes</h4>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="number" name="busqueda" placeholder="Buscar paciente por identificación" class="form-control"><br>
        <input type="submit" name="buscar" value="Buscar" class="btn btn-primary btn-block">
      </form>
      <div class="col-sm-12 col-md-12 col-lg-12"><br>
        <div class="table-responsive">
          <table class="table">
            <thead class="text-muted">
            <th class="text-center">Id</th>
              <th class="text-center">Tipo</th>
              <th class="text-center">Nombres</th>
              <th class="text-center">Apellidos</th>
              <th class="text-center">Telefono celular</th>
              <th class="text-center">Correo</th>
              <th class="text-center">EPS</th>
              
            </thead>
            <tbody>
          <?php while($row = $resultado->fetch_assoc()) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id']; ?></td>
              <td class="text-center"><?php echo $row['tipo']; ?></td>
              <td class="text-center"><?php echo $row['nombres']; ?></td>
              <td class="text-center"><?php echo $row['apellidos']; ?></td>
              <td class="text-center"><?php echo $row['telefono_celular']; ?></td>
              <td class="text-center"><?php echo $row['correo']; ?></td>
              <td class="text-center"><?php echo $row['EPS']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
  
</div>
<div class="container">
  <div class="col-sm-12 col-md-12 col-lg-12">
     <h3 class="text-center">Listado de pacientes en BD</h3>
     <div class="table-responsive table-hover" id="tablaConsulta">
     <div class="table-responsive"> 
        <table class="table">
          <thead class="text-muted">
              <th class="text-center">Id</th>
              <th class="text-center">Tipo</th>
              <th class="text-center">Nombres</th>
              <th class="text-center">Apellidos</th>
              <th class="text-center">Edad</th>
              <th class="text-center">Telefono fijo</th>
              <th class="text-center">Telefono celular</th>
              <th class="text-center">Correo</th>
              <th class="text-center">Fecha de nacimiento</th>
              <th class="text-center">EPS</th>
              <th class="text-center">Categoría</th>
          </thead>
          <tbody>
          <?php while($row = $guardar->fetch_assoc()) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id']; ?></td>
              <td class="text-center"><?php echo $row['tipo']; ?></td>
              <td class="text-center"><?php echo $row['nombres']; ?></td>
              <td class="text-center"><?php echo $row['apellidos']; ?></td>
              <td class="text-center"><?php echo $row['edad']; ?></td>
              <td class="text-center"><?php echo $row['telefono_fijo']; ?></td>
              <td class="text-center"><?php echo $row['telefono_celular']; ?></td>
              <td class="text-center"><?php echo $row['correo']; ?></td>
              <td class="text-center"><?php echo $row['fecha_nacimiento']; ?></td>
              <td class="text-center"><?php echo $row['EPS']; ?></td>
              <td class="text-center"><?php echo $row['categoria']; ?></td>
              <td><a href="modificar.php?id=<?php echo $row['id']; ?>">Modificar</a></td>
              <td><a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a></td
            </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
      </div></
    </div>
  </div>
</div>

<?php include('../plantillas/footer_administrador.php'); ?>