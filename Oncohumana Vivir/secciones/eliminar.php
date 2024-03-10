<?php
include '../configuraciones/conecta.php';
$id = $_GET['id'];
$eliminar = "DELETE FROM pacientes_eps WHERE id = '$id'";
$eliminar =$conecta->query($eliminar);
header("location:vista_administrador_modificar.php");
$conecta->close();
?>