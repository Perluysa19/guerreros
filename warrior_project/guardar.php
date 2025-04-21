<?php
session_start();
require_once 'clases.php';

$nombre = $_POST['nombre'];
$razaNombre = $_POST['raza'];
$tipoNombre = $_POST['tipo'];
$poderesSeleccionados = $_POST['poderes'] ?? [];

if (count($poderesSeleccionados) < 5) {
    echo "<link rel='stylesheet' href='estilos.css'><div class='container'>";
    echo "<h2>Error</h2>";
    echo "Debes seleccionar al menos 5 poderes.<br>";
    echo "<a href='crear.php'>Volver</a></div>";
    exit;
}

$raza = new Raza($razaNombre, "Descripción de $razaNombre");
$tipo = new Tipo($tipoNombre, "Descripción de $tipoNombre");

$poderesElegidos = [];
foreach ($poderesSeleccionados as $indice) {
    $poderesElegidos[] = $poderes[$indice];
}

$nuevo = new Guerrero($nombre, $raza, $tipo, $poderesElegidos);
$_SESSION['guerreros'][] = serialize($nuevo);

header("Location: index.php");
exit;
