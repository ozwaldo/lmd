<?php
  require_once "datos/conexion.php";

  //print_r(Conexion::getInstancia());

$pdo = Conexion::getInstancia()->conectar();

$sql = "INSERT INTO usuario (nombre,contrasena,claveApi,correo)".
      " VALUES (?,?,?,?)";
$query = $pdo->prepare($sql);
$nombre = "juan";
$query->bindParam(1,$nombre);
$password = password_hash("123",PASSWORD_BCRYPT);
echo $password;
$query->bindParam(2,$password);
$clave = MD5("juan123");
$query->bindParam(3,$clave);
$email = "juan@mail.com";
$query->bindParam(4,$email);
$result = $query->execute();
if ($result) {
  echo "Operación exitosa.";
} else {
  echo "Error al realizar la operación.";
}



?>
