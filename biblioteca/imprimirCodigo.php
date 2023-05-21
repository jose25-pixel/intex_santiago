<?php
$codLibro = $_GET["CodLibro"];
$Codigo = $_GET["Codigo"];
$numEjemplares = $_GET["numEjemplares"];

// Construir el contenido de impresión
$contenido = "";
for ($i = 1; $i <= $numEjemplares; $i++) {
    $contenido .= "Código del libro: " . $Codigo . "<br>";
}

echo $contenido;
?>