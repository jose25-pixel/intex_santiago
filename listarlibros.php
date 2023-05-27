
<?php


include('dbconexion.php');

$vbusqueda = $_POST["dbusqueda"];






$query= "

SELECT LI.CodLibro, LI.Titulo, LI.Portada, AU.Descripcion as Autor,GE.Descripcion as Genero , ED.Descripcion as Editorial, LI.Ubicacion, LI.Ejemplar FROM libros LI
INNER JOIN autor AU on AU.CodAutor = LI.CodAutor
INNER JOIN genero GE ON GE.CodGenero = LI.CodGenero
INNER JOIN editorial ED on ED.CodEditorial = LI.CodEditorial
WHERE
LI.Titulo like '$vbusqueda%' OR
AU.Descripcion like '$vbusqueda%' OR
GE.Descripcion like '$vbusqueda%' OR
ED.Descripcion like '$vbusqueda%' 
ORDER BY LI.CodLibro DESC;
"
;

	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>
		table{
			color: #000000;
			width: 100%;
			border: 1px solid #000000;
			background-color: #f8f8f8;
		}
		table td{
			padding: 1%;
			box-sizing: border-box;
			border: 1px solid #fff;
			text-align: left;
		}
		</style>
		";
		
		echo "   
			<table>

				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
			echo "<td><img height='200' width='200' src='./biblioteca/".$fila['Portada'] . "'/></td>";
			

				echo "<td>
					<strong><p style='color:green;'>Titulo: </p></strong>" .$fila['Titulo'] ."
					<strong><p style='color:green;'>Autor: </p></strong>"  .$fila['Autor'] ."
					<strong><p style='color:green;'>Género: </p></strong>" .$fila['Genero'] ."
					<strong><p style='color:green;'>Editorial: </p></strong>" .$fila['Editorial'];
				echo "</td>";
		




			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados... en libros";
	}


?>