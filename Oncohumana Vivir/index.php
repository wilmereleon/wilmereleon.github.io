<?php
session_start();
error_reporting(0);

// Solicitar la conexión a la base de datos
include 'configuraciones/conecta.php';

if(isset($_POST['entrar'])){
$usuario = $conecta->real_escape_string($_POST['usuario']);
$contrasenna = $conecta->real_escape_string($_POST['contrasenna']);


// generar consulta que extraiga datos de la base de datos
$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contrasenna = '$contrasenna'";
if($resultado = $conecta->query($consulta)){
  while($row = $resultado->fetch_array()){
    $userok = $row['usuario'];
    $passwordok = $row['contrasenna'];
  }
  $resultado->close();
 }
 $conecta->close();
 if(isset($usuario) && isset($contrasenna)){
  if($usuario == $userok && $contrasenna == $passwordok){
    $_SESSION['login'] = TRUE;
    $_SESSION['usuario'] = $usuario;
    header("location:secciones/vista_administrador_modificar.php");
  }
  else{
    $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Tus datos no son correctos. </strong> Verifica tus datos.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button>
              </div>";
  }
 }
 else {
  $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Tus datos no son correctos. </strong> Verifica tus datos.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
 }
}  

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <main>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
            
            </div>
            <div class="col-md-4">
            <br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="card">
                    <div class="card-header" style="background-color:#C2F0FF">
                        Inicio de sesión
                    </div>
                    <div class="card-body">
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Usuario</label>
                          <input type="text"
                            class="form-control"
                                name="usuario"
                                id="usuario"
                                aria-describedby="helpId"
                                placeholder="usuario">
                          <small id="helpId" class="form-text text-muted">Escriba su usuario</small>
                        </div>
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Contraseña</label>
                          <input type="password"
                            class="form-control"
                                name="contrasenna"
                                id="contrasenna"
                                aria-describedby="helpId"
                                placeholder="contraseña">
                          <small id="helpId" class="form-text text-muted">Escriba su contraseña</small>
                        </div>

                        <button type="submit" class="btn btn-primary" name="entrar">Iniciar sesión</button>
                        
                    </div>
                </div>
            </form>
            </div>
        </div>
        <?php echo $mensaje; ?>   
    </div>

  </main>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>