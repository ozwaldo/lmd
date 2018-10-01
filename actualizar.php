<?php
  require_once "datos/conexion.php";

  $idUsuario = $_GET['idusuario'];

  $pdo = Conexion::getInstancia()->conectar();
  $sql = "SELECT * FROM usuario WHERE idUsuario = :idUsuario";
  $query = $pdo->prepare($sql);
  $query->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);
?>
  <form  action="actualizar.php" method="post">
    <fieldset>
      <legend>Guardar Usuario</legend>
      <div>
        <input type="text" name="id" value="<?php echo  $row['idUsuario']?>" disabled>
      </div><br>
      <div>
        <input type="text" name="nombre" value="<?php echo  $row['nombre']?>">
      </div><br>
      <div>
        <input type="password" name="password" value="<?php echo  $row['contrasena'] ?>">
      </div><br>
      <div>
        <input type="text" name="claveapi" value="<?php echo  $row['claveApi'] ?>">
      </div><br>
      <div>
        <input type="email" name="email" value="<?php echo  $row['correo'] ?>">
      </div><br>
      <div>
        <input type="submit" value="Acutalizar">
      </div><br>
      <a href="seleccionar.php">Ver registros</a><br>
      <a href="seleccionarId.php">Buscar por Id</a>
    </fieldset>
  </form>
