<?php
  require_once "datos/conexion.php";


  if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    $usaurio = [
      ':idusuario' => $_POST['idusuario'],
      ':nombre' => $_POST['nombre'],
      ':password' => $_POST['password'],
      ':claveapi' => $_POST['claveapi'],
      ':correo' => $_POST['email']
    ];
    $sql = 'UPDATE usuario SET
              nombre = :nombre,
              contrasena = :password,
              claveApi = :claveapi,
              correo = :correo
            WHERE idUsuario = :idusuario';

  $pdo = Conexion::getInstancia()->conectar();
  $query = $pdo->prepare($sql);
  $result = $query->execute($usaurio);

  if ($result) {
    header("Location: seleccionar.php");
  } else {
    echo "Error al actualizar el registro.";
  }
  else:
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
          <input type="hidden" name="idusuario" value="<?php echo  $row['idUsuario']?>" >
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
  <?php
  endif;
  ?>
