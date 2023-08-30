<?php

$nombre = "Juan";
$saludo = "Hola";
$puntaje = 100;

// echo $saludo . " " . $nombre . ", tu puntaje es " . $puntaje;
// echo "$saludo $nombre, tu puntaje es $puntaje";

$puntajesDePersonas = [
   "Juan"   => 100,
   "Pedro"  => 200,
   "Maria"  => 300
];

$puntajesDePersonas["Juan"] = 1400;
$puntajesDePersonas["Jose"] = 2400;

$formatoJson = json_encode($puntajesDePersonas, JSON_PRETTY_PRINT);

class Fruta {
   private $nombre;
   private $color;
   private $precio;

   public function __construct($nombre, $color, $precio) {
      $this->nombre = $nombre;
      $this->color = $color;
      $this->precio = $precio;
   }

   public static function crearFruta($nombre, $color, $precio) {
      return new Fruta($nombre, $color, $precio);
   }

   public function mostrar() {
      echo "Nombre: $this->nombre, Color: $this->color, Precio: $this->precio\n";
   }
}

$fruta = new Fruta("Manzana", "Roja", 1000);
$fruta->mostrar();

Fruta::crearFruta("Pera", "Verde", 2000)->mostrar();