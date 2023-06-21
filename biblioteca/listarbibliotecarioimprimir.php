<?php

include('../dbconexion.php');

$busqueda = $_GET['busqueda'];

// Título del reporte
echo "<h1> Instituto Nacional de Santiago Texacuangos</h1>";

// 
	$query= "SELECT * FROM `bibliotecario` WHERE Nombres 
    LIKE '$busqueda%' or Apellidos LIKE '$busqueda %' or Nro_Carnet LIKE '$busqueda%'
	 ";

	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);
	
	//print_r($num_filas);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{
			color: #000000;
			width: 100%;
			border: 1px solid #000000;
			text-align: center;
			background-color:#f8f8f8;
			
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
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Cargo</th>
						<th>Direccion</th>
						<th>Email</th>
						<th>Telefono</th>
						<th>Dni</th>
						<th>Nro Carnet</th>
					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
				echo "<td>" .$fila['CodBibliotecario'] ."</td>";
				echo "<td>" .$fila['Nombres'] ."</td>";
				echo "<td>" .$fila['Apellidos'] ."</td>";
				echo "<td>" .$fila['Cargo'] ."</td>";
				echo "<td>" .$fila['Direccion'] ."</td>";
				echo "<td>" .$fila['Email'] ."</td>";
				echo "<td>" .$fila['Telefono'] ."</td>";
				echo "<td>" .$fila['Dni'] ."</td>";
				echo "<td>" .$fila['Nro_Carnet'] ."</td>";
			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "<p style='color: #000000;'>No Se Encontraron resultados... de Bibliotecarios</p>";
	}


?>