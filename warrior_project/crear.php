<?php
require_once 'clases.php';
?>

<link rel="stylesheet" href="estilos.css">
<div class="container">
<h1>Crear Guerrero</h1>
<form method="POST" action="guardar.php" onsubmit="return validarSeleccion();">
  Nombre: <input type="text" name="nombre" required><br>
  Raza: 
  <select name="raza">
    <option value="Elfo">Elfo</option>
    <option value="Orco">Orco</option>
    <option value="Humano">Humano</option>
  </select><br>
  Tipo: 
  <select name="tipo">
    <option value="Mago">Mago</option>
    <option value="Guerrero">Guerrero</option>
    <option value="Arquero">Arquero</option>
  </select><br>

  <h3>Selecciona mínimo 5 poderes:</h3>
  <p><strong>Poderes seleccionados: <span id="contador">0</span></strong></p>

  <?php
  foreach ($poderes as $index => $poder) {
      echo "<input type='checkbox' name='poderes[]' value='$index' id='p$index' onclick='contarPoderes()'>";
      echo "<label for='p$index'>{$poder->nombre} - {$poder->efecto}</label><br>";
  }
  ?>
  
  <br>
  <input type="submit" value="Crear Guerrero">
</form>
<a href="index.php">Volver</a>
</div>

<script>
function contarPoderes() {
  const checkboxes = document.querySelectorAll("input[name='poderes[]']");
  let count = 0;
  checkboxes.forEach(cb => { if (cb.checked) count++; });
  document.getElementById("contador").textContent = count;
}
function validarSeleccion() {
  const checkboxes = document.querySelectorAll("input[name='poderes[]']");
  let count = 0;
  checkboxes.forEach(cb => { if (cb.checked) count++; });
  if (count < 5) {
    alert("Debes seleccionar al menos 5 poderes.");
    return false;
  }
  return true;
}
</script>
