<?php
//guardar.php
require_once "datos/conexion.php";

$nombre = $_POST['nombre'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
$clave = MD5($_POST['claveapi']);
$email = $_POST['email'];

$pdo = Conexion::getInstancia()->conectar();
$sql = "INSERT INTO usuario (nombre,contrasena,claveApi,correo)".
      " VALUES (?,?,?,?)";
$query = $pdo->prepare($sql);
$query->bindParam(1,$nombre);
$query->bindParam(2,$password);
$query->bindParam(3,$clave);
$query->bindParam(4,$email);
$result = $query->execute();
if ($result) {
  echo "Operación exitosa.";
} else {
  echo "Error al realizar la operación.";
}
?>
