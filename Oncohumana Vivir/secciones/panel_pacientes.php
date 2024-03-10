<?php
include '../configuraciones/conecta.php';
// Consulta:
$consulta = "SELECT * FROM agenda";
$guardar = $conecta->query($consulta);
?>

<?php include('../plantillas/header.php'); ?>

<h1>Panel de pacientes</h1>

<div class="col-md-5">
  <div class="mb-3">
    <label for="" class="form-label">Ingrese ID de paciente</label>
      <input type="text"
             class="form-control"
             name="id"
             id="id"
             aria-describedby="helpId"
             placeholder="ID">
  </div>
    <div class="mb-3">
      <label for="nombre_paciente" class="form-label">Nombre de paciente</label>
        <input type="text"
          class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Ingrese nombre de paciente</small>
    </div>
</div>
<div class="container">
  <div class="col-sm-12 col-md-12 col-lg-12">
     <h3 class="text-center">Listado de citas diarias</h3>
     <div class="table-responsive table-hover" id="tablaConsulta">
        <table class="table">
          <thead class="text-muted">
              <th class="text-center">Número de identificación</th>
              <th class="text-center">Tipo</th>
              <th class="text-center">Nombres</th>
              <th class="text-center">Apellidos</th>
              <th class="text-center">Fecha y hora de cita</th>
              <th class="text-center">Estado de ingreso</th>
          </thead>
          <tbody>
          <?php while($row = $guardar->fetch_assoc()) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id']; ?></td>
              <td class="text-center"><?php echo $row['tipo']; ?></td>
              <td class="text-center"><?php echo $row['nombres']; ?></td>
              <td class="text-center"><?php echo $row['apellidos']; ?></td>
              <td class="text-center"><?php echo $row['fecha_cita']; ?></td>
              <td ><?php echo $row['estado']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table></
    </div>
  </div>
</div>

<?php include('../plantillas/footer.php'); ?>