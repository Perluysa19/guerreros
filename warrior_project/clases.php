<?php
session_start();

class Raza {
    public $nombre, $descripcion;
    function __construct($nombre, $descripcion) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
}
class Tipo {
    public $nombre, $descripcion;
    function __construct($nombre, $descripcion) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
}
class Poder {
    public $nombre, $danio, $efecto;
    function __construct($nombre, $danio, $efecto) {
        $this->nombre = $nombre;
        $this->danio = $danio;
        $this->efecto = $efecto;
    }
}
class Guerrero {
    public $nombre, $raza, $tipo, $poderes;
    function __construct($nombre, $raza, $tipo, $poderes = []) {
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->tipo = $tipo;
        $this->poderes = $poderes;
    }
}

$poderes = [
    new Poder("Fuego", 50, "Quema al enemigo"),
    new Poder("Hielo", 40, "Congela al enemigo"),
    new Poder("Rayo", 60, "Aturde al enemigo"),
    new Poder("Curación", -30, "Cura al guerrero"),
    new Poder("Tierra", 45, "Empuja al enemigo"),
    new Poder("Viento", 35, "Derriba enemigos"),
    new Poder("Sombras", 55, "Ciega al enemigo"),
    new Poder("Luz", 20, "Revela enemigos ocultos"),
    new Poder("Veneno", 48, "Envenena lentamente"),
    new Poder("Clonación", 0, "Crea una copia del guerrero"),
];

$guerreros = [];
if (isset($_SESSION['guerreros'])) {
    foreach ($_SESSION['guerreros'] as $g) {
        $guerreros[] = unserialize($g);
    }
} else {
    for ($i = 1; $i <= 10; $i++) {
        $raza = new Raza("Elfo", "Ágil");
        $tipo = new Tipo("Guerrero", "Combate cuerpo a cuerpo");
        shuffle($poderes);
        $guerreros[] = new Guerrero("Guerrero $i", $raza, $tipo, array_slice($poderes, 0, 5));
    }
    foreach ($guerreros as $g) {
        $_SESSION['guerreros'][] = serialize($g);
    }
}
?>
