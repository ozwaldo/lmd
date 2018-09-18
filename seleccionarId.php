<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buscar por Id</title>
  </head>
  <body>
    <?php
    require_once "datos/conexion.php";

    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
      $id = $_POST['id'];
      $pdo = Conexion::getInstancia()->conectar();

      $sql = "SELECT * FROM usuario WHERE idUsuario = :idUsuario";

      $query = $pdo->prepare($sql);
      $query->bindParam(':idUsuario', $id, PDO::PARAM_INT);

      $query->execute();

      $row = $query->fetch(PDO::FETCH_ASSOC);

      echo "idUsuario: " . $row['idUsuario'];
      echo "<br>Nombre: " . $row['nombre'];
      echo "<br>Correo: " . $row['correo'];
      echo "<br>Fecha registro: " . $row['fechaRegistro'];

      echo "<br><a href='seleccionarId.php'>Regresar</a>";

    } else {
    ?>
      <form action="seleccionarId.php" method="post">
        <input type="text" name="id" placeholder="Escriba un Id" required>
        <br>
        <input type="submit" value="Buscar">
      </form>
    <?php
    }
    ?>
  </body>
</html>
