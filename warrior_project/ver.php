<?php
require_once 'clases.php';

$nombreBuscado = $_GET['nombre'] ?? '';
foreach ($guerreros as $g) {
    if ($g->nombre === $nombreBuscado) {
        echo "<h2>Detalles de {$g->nombre}</h2>";
        echo "Raza: {$g->raza->nombre} - {$g->raza->descripcion}<br>";
        echo "Tipo: {$g->tipo->nombre} - {$g->tipo->descripcion}<br>";
        echo "Poderes:<ul>";
        foreach ($g->poderes as $p) {
            echo "<li>{$p->nombre} - Daño: {$p->danio}, Efecto: {$p->efecto}</li>";
        }
        echo "</ul><a href='index.php'>Volver</a>";
        exit;
    }
}
echo "Guerrero no encontrado. <a href='index.php'>Volver</a>";
?>