<?php
require_once 'clases.php';
?>
<link rel="stylesheet" href="estilos.css">
<div class="container">
<h1>Guerreros creados</h1>
<?php
foreach ($guerreros as $g) {
    echo "<div class='guerrero'>";
    echo "<strong>{$g->nombre}</strong><br>";
    echo "Raza: {$g->raza->nombre}<br>";
    echo "Tipo: {$g->tipo->nombre}<br>";
    echo "<a href='ver.php?nombre=" . urlencode($g->nombre) . "'>Ver detalles</a>";
    echo "</div>";
}
?>
<hr><a href='crear.php'>Crear nuevo guerrero</a>
</div>