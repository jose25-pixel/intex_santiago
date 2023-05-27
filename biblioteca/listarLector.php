
<?php


include('../dbconexion.php');

	$vbusqueda = $_POST["dbusqueda"];

	$query= "

	SELECT * FROM `lector` WHERE Nombres LIKE '$vbusqueda%' or Apellidos LIKE '$vbusqueda%' or Nro_Carnet LIKE '$vbusqueda%'
	 ";

	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{
			color: #000000;
			width: 100%;
			text-align: center;
			border: 1px solid #000000;
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
						<th>Direccion</th>
						<th>Email</th>
						<th>Telefono</th>
						<th>seccion</th>
						<th>bachillerato</th>
						<th>Nro Carnet</th>
						<th colspan='2'>Operaciones</th>
					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
				echo "<td>" .$fila['CodLector'] ."</td>";
				echo "<td>" .$fila['Nombres'] ."</td>";
				echo "<td>" .$fila['Apellidos'] ."</td>";
				echo "<td>" .$fila['Direccion'] ."</td>";
				echo "<td>" .$fila['Email'] ."</td>";
				echo "<td>" .$fila['Telefono'] ."</td>";
				echo "<td>" .$fila['seccion'] ."</td>";
				echo "<td>" .$fila['bachillerato'] ."</td>";
				echo "<td>" .$fila['Nro_Carnet'] ."</td>";


				echo "<td>";
				echo "<a style='cursor:pointer' onclick =' VModificarLe(" .$fila['CodLector'] ."); '><img src='img_l/icon-modify.png' width='32' height='32'></a>";
				echo "</td>";


				echo "<td>";
				echo "<a style='cursor:pointer' onclick =' VEliminarLe(" .$fila['CodLector'] ."); '><img src='img_l/icon-delete.png' width='32' height='32'></a>";
				echo "</td>";




			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "<p style='color: #000000;'>No Se Encontraron resultados...</p>";
	}


?>