<?php
//conexion.php
require_once 'db.php';

/**
 * Clase para crear la conexión con
 * la base de datos
 */
class Conexion
{
  private static $bd = null;
  private static $pdo;
  function __construct()
  {
    try {
      self::conectar();
    } catch (PDOException $e) {
      echo "<h2>Error en la conexión con la base de datos.</h2> " . $e;
    }
  }
  public function conectar()
  {
    if (self::$pdo == null) {
      self::$pdo = new PDO(
        'mysql:dbname=' . NOMBRE_BD .
        ';host=' . HOST . ';',
        USUARIO,
        PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8')
      );
      //Habilitamos excepcion
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$pdo;
  }

  public static function getInstancia()
  {
    if (self::$bd == null) {
      self::$bd = new self();
    }
    return self::$bd;
  }

  function __destruct() {
    self::$pdo = null;
  }
}
?>
