<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insertar</title>
  </head>
  <body>
    <form  action="guardar.php" method="post">
      <fieldset>
        <legend>Guardar Usuario</legend>
        <div>
          <input type="text" name="nombre" placeholder="Nombre">
        </div><br>
        <div>
          <input type="password" name="password" placeholder="Contraseña">
        </div><br>
        <div>
          <input type="text" name="claveapi" placeholder="Clave API">
        </div><br>
        <div>
          <input type="email" name="email" placeholder="Email">
        </div><br>
        <div>
          <input type="submit" value="Guardar">
          <input type="reset"  value="Limpiar">
        </div><br>
        <a href="seleccionar.php">Ver registros</a><br>
        <a href="seleccionarId.php">Buscar por Id</a>
      </fieldset>
    </form>
  </body>
</html>
