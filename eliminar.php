<?php
require_once "datos/conexion.php";

// eliminar.php
$idusuario = $_GET['idusuario'];
$sql = "DELETE FROM usuario
  WHERE idUsuario = :idusuario";
$pdo = Conexion::getInstancia()->conectar();
$query = $pdo->prepare($sql);
$result = $query->execute([':idusuario'=>$idusuario]);
if ($result) {
  header("Location: seleccionar.php");
}else{
  echo "Error al eliminar registro.";
}
?>
