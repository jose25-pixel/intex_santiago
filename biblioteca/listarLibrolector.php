<?php



echo '<style>
#logo {
  position: absolute;
  top: 0;
  right: 0;
}
</style>';

include('../dbconexion.php');

$vbusqueda = $_GET['busqueda'];
// Título del reporte
echo "<h1> Instituto Nacional de Santiago Texacuangos</h1>";

// Logotipo

echo '<div id="logo"><img src="./img_l/Intex.png" alt="Logo de la Biblioteca" width="160" height="100" ></div>';



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
			border: 1px solid #fff;
		}

		table td{
			border: 1px solid #fff;
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


			




			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados...";
	}

    echo "<h1>Número de Estudiantes: " . $num_filas . "</h1>";
?>