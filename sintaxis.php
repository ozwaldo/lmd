<?php
  //sintaxis.php

  $x = 3;
  $y = 7;

  if ($x > $y) {
    echo $x . " es el mayor.";
  } else {
    echo $y . " es el mayor.";
  }

  $carrera = "informatica";
  switch ($carrera) {
    case 'sistemas':
      echo "<br> Tu carrera es: " . $carrera;
      break;
    case 'industrial':
      echo "<br> Tu carrera es: " . $carrera;
      break;
    default:
      echo "<br> Tu carrera no existe";
      break;
  }

  for ($i=0; $i < 10 ; $i++) {
    echo "<br>" . $i;
  }
  while ($a <= 100) {
    echo "<br> while";
    $a++;
  }

  /**
   *
   */
  class MiClase
  {

    private $x;

    function __construct($x)
    {
      $this->x = $x;
    }

    public function getX()
    {
      return $this->x;
    }
    public function setX($x)
    {
      $this->x = $x;
    }
  }

  $obj = new MiClase(5);
  echo "<br>".$obj->getX();

  $obj->setX("123");
  echo "<br>".$obj->getX();




?>
