<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_ImprLibrosRetornados.css" media="print">
	<title></title>
</head>
<body>

</body>
</html>

<?php
	

include('../dbconexion.php');

// Título del reporte
echo "<h2> Instituto Nacional de Santiago Texacuangos</h2>";


$busqueda = $_GET['busqueda'];

	$query= "


	SELECT DP.Cod_Det_Prestamo AS 'CodDp', LI.Titulo AS 'Titulo del Libro',LE.Nro_Carnet, CONCAT(LE.Nombres,' ',LE.Apellidos) AS 'Lector', PR.Fec_Entrega AS 'Fecha Entrega',PR.Fec_Devolucion AS 'Fecha de Devolución', DP.Fec_Retorno AS 'Fecha de Retorno'
	FROM detalle_prestamo DP
	INNER JOIN libros LI on LI.CodLibro = DP.CodLibro
	INNER JOIN prestamo PR on PR.CodPrestamo = DP.CodPrestamo
	INNER JOIN lector LE on LE.CodLector = PR.CodLector
	INNER JOIN estado ES on ES.CodEstado = DP.CodEstado
	WHERE
	LE.Nro_Carnet LIKE '$busqueda%'
	AND
	ES.CodEstado = '2';
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
			text-align: center;
		}
		table tr{
			padding: 5px;
			box-sizing: border-box;
		}
		table td{
			border: 1px solid #000000;
			text-align: center;
			
		}

		table td a{
			margin: 4px;
			display: block;
			background: #1B7A38;
			padding: 5px;
			box-sizing: border-box;
			border-radius: 5px;
		}

		table td a:hover{
			text-decoration: underline;
		}
		</style>
		";
		
		echo "   
			<table>
				<theader>
					<tr>
						<th >Titulo del Libro</th>
						<th>Lector</th>
						<th>Fecha Entrega</th>
						<th>Fecha de Devolución</th>
						<th>Fecha de Retorno</th>

					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr height='20'>";
				echo "<td>" .$fila['Titulo del Libro'] ."</td>";
				echo "<td>" .$fila['Lector'] ."</td>";
				echo "<td>" .$fila['Fecha Entrega'] ."</td>";
				echo "<td>" .$fila['Fecha de Devolución'] ."</td>";
				echo "<td>" .$fila['Fecha de Retorno'] ."</td>";



			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "No Se Encontraron resultados...";
	}


?>