<?php
echo '<style>
#logo {
  position: absolute;
  top: 0;
  right: 0;
}
</style>';

include('../dbconexion.php');

$busqueda = $_GET['busqueda'];

// Título del reporte
echo "<h1> Instituto Nacional de Santiago Texacuangos</h1>";

// Logotipo

echo '<img  width="160" height="100" src="./img_l/bimg6.jpg" alt="Logo de la Biblioteca" >';


$query= "

SELECT LI.CodLibro, LI.Titulo,LI.Codigo, LI.Portada, LI.ano_edicion,  AU.Descripcion as Autor,GE.Descripcion as Genero , ED.Descripcion as Editorial, LI.Ubicacion, LI.Ejemplar FROM libros LI
INNER JOIN autor AU on AU.CodAutor = LI.CodAutor
INNER JOIN genero GE ON GE.CodGenero = LI.CodGenero
INNER JOIN editorial ED on ED.CodEditorial = LI.CodEditorial
WHERE
LI.Titulo LIKE '%$busqueda%' OR
AU.Descripcion LIKE '%$busqueda%' OR
GE.Descripcion LIKE '%$busqueda%' OR
ED.Descripcion LIKE '%$busqueda%' 
ORDER BY LI.CodLibro DESC;
";
	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{
			color: #000000;
			width: 100%;
			border: 1px solid #fff;
		}

		table td{
			border: 1px solid #fff;
			text-align: center;
		}

		</style>
		";
		
		echo "   
			<table >
				<theader>
					<tr>
						<th>Codigo</th>
						<th>Portada</th>
						<th>Titulo</th>	
						<th>Dewey</th>
						<th>Autor</th>
						<th>Genero</th>
						<th>Editorial</th>
						<th>Ubicacion</th>
						<th>Año_Edicion</th>
					
						<th>Ejemplar</th>
					
					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
				echo "<td>" .$fila['CodLibro'] ."</td>";
				echo "<td><img height='100' width='100' src='" . $fila['Portada'] . "'/></td>";
				echo "<td>" .$fila['Titulo'] ."</td>";
				echo "<td>" .$fila['Codigo'] ."</td>";
				echo "<td>" .$fila['Autor'] ."</td>";
				echo "<td>" .$fila['Genero'] ."</td>";
				echo "<td>" .$fila['Editorial'] ."</td>";
				echo "<td>" .$fila['Ubicacion'] ."</td>";
				echo "<td>" .$fila['ano_edicion'] ."</td>";
				echo "<td>" .$fila['Ejemplar'] ."</td>";


			
		}
		echo "</tbody></table>";
	}else{
		echo "No Se Encontraron resultados... en libros";
	}

	echo "<h1>Número de Libros: " . $num_filas . "</h1>";
?>