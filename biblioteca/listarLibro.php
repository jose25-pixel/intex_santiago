
<?php


include('../dbconexion.php');

	$vbusqueda = $_POST["dbusqueda"];

$query= "

SELECT LI.CodLibro, LI.Titulo,LI.Codigo, LI.Portada, LI.ano_edicion,  AU.Descripcion as Autor,GE.Descripcion as Genero , ED.Descripcion as Editorial, LI.Ubicacion, LI.Ejemplar FROM libros LI
INNER JOIN autor AU on AU.CodAutor = LI.CodAutor
INNER JOIN genero GE ON GE.CodGenero = LI.CodGenero
INNER JOIN editorial ED on ED.CodEditorial = LI.CodEditorial
WHERE
LI.Titulo like '$vbusqueda%' OR
AU.Descripcion like '$vbusqueda%' OR
GE.Descripcion like '$vbusqueda%' OR
ED.Descripcion like '$vbusqueda%' 
ORDER BY LI.CodLibro DESC;
";
	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{
			color: #000000;
			width: 100%;
			border: 1px solid #000000;
			background-color:#f8f8f8;
			text-align: center;;
		}

		table td{
			border: 1px solid #000000;
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
						<th colspan='2'>Operaciones</th>
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


				echo "<td>";
				echo "<a style='cursor:pointer' onclick =' VModificarLi(" .$fila['CodLibro'] ."); '><img src='img_l/icon-modify.png' width='32' height='32'></a>";
				echo "</td>";

				echo "<td>";
				echo "<a style='cursor:pointer' onclick =' VEliminarLi(" .$fila['CodLibro'] ."); '><img src='img_l/icon-delete.png' width='32' height='32'></a>";
				echo "</td>";
                 
				echo "<td>";
				echo "<a onclick=\"imprimirCodigo('" . $fila['Codigo'] . "', '" . $fila['Titulo'] . "', " . $fila['Ejemplar'] . ");\"> <img src='img_l/icon-print.png' width='32' height='32'></a>";
				echo "</td>";
			echo "</tr>";
		}
		echo "</tbody></table>";
	}else{
		echo "<p style='color: #000000;'>No Se Encontraron resultados... en libros</p>";
	}
?>