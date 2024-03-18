<?php
include '../configuraciones/conecta.php';
// Consulta:
$consulta = "SELECT * FROM agenda";
$guardar = $conecta->query($consulta);
?>

<?php include('../plantillas/header.php'); ?>


  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>


<div class="container">
  <div class="col-sm-12 col-md-12 col-lg-12">
     <h3 class="text-center">Entradas</h3>
     <div class="table-responsive table-hover" id="tablaConsulta">
        <table class="table">
          <thead class="text-muted">
              <th class="text-center">Número de identificación</th>
              <th class="text-center">Tipo</th>
              <th class="text-center">Nombres</th>
              <th class="text-center">Apellidos</th>
              <th class="text-center">Fecha y hora de cita</th>
              <th class="text-center">Estado de ingreso</th>
              <th class="text-center">Acción</th>
          </thead>
          <tbody>
          <?php while($row = $guardar->fetch_assoc()) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id']; ?></td>
              <td class="text-center"><?php echo $row['tipo']; ?></td>
              <td class="text-center"><?php echo $row['nombres']; ?></td>
              <td class="text-center"><?php echo $row['apellidos']; ?></td>
              <td class="text-center"><?php echo $row['fecha_cita']; ?></td>
              <td class="text-center"><?php echo $row['estado']; ?></td>
              <td><a href="#">Solicitar cita</a></td>
              <td><a href="#">Modificar cita</a></td>
              <td><a href="#">Cancelar cita</a></td>

            </tr>
          <?php } ?>
          </tbody>
        </table></
    </div>
  </div>
</div>

<?php include('../plantillas/footer.php'); ?>