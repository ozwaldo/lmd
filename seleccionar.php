<?php
//seleccionar.php
require_once "datos/conexion.php";

//$sql = "SELECT idUsuario, nombre, contrasena, claveApi, correo, fechaRegistro FROM usuario";
$sql = "CALL getUsuariosProc()";
try {
  $pdo = Conexion::getInstancia()->conectar();
  $query = $pdo->query($sql);
  $query->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error al realiza la consulta: ". $e;
}
?>
<table border="1">
  <tr>
    <th>idUsuario</th>
    <th>Nombre</th>
    <th>Contraseña</th>
    <th>Clave Api</th>
    <th>Correo</th>
    <th>Fecha Registro</th>
  </tr>
  <?php while ($r = $query->fetch()): ?>
    <tr>
      <td><?php echo($r['idUsuario']) ?></td>
      <td><?php echo($r['nombre']) ?></td>
      <td><?php echo($r['contrasena']) ?></td>
      <td><?php echo($r['claveApi']) ?></td>
      <td><?php echo($r['correo']) ?></td>
      <td><?php echo($r['fechaRegistro']) ?></td>
    </tr>
  <?php endwhile; ?>
</table>
