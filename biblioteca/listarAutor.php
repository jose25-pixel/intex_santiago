
<?php


include('../dbconexion.php');


	$query= "
	SELECT CodAutor, Descripcion FROM autor
	 ";

	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{
			color: #000000;
			width: 100%;
			text-align: center;
			border: 1px solid #fff;
		}

		table td{
			border: 1px solid #000000;
			text-align: center;
		}

		</style>
		";
		
		echo "   
			<table>
				<theader>
					<tr>
						<th>Codigo</th>
						<th>Autor</th>
					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
				echo "<td>" .$fila['CodAutor'] ."</td>";
				echo "<td>" .$fila['Descripcion'] ."</td>";
			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados...";
	}


?>