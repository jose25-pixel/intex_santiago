
<?php
include('../dbconexion.php');


$busqueda = $_GET['busqueda'];

echo "<h2> Instituto Nacional de Santiago Texacuangos</h2>";

// Título del reporte
	session_start();
	$codLector = $_SESSION["idl"];
	$query= "
SELECT RE.CodReserva AS Codigo, LE.CodLector AS Lector, LI.Titulo AS Titulo, RE.Fec_Reserva AS 'Fecha Reserva',DATE_ADD(RE.Fec_reserva, INTERVAL 1 DAY) AS 'Fecha Limite', ES.Descripcion AS Estado
FROM reservas RE 
INNER JOIN lector LE ON LE.CodLector = RE.CodLector
INNER JOIN libros LI ON LI.CodLibro = RE.CodLibro
INNER JOIN estado ES ON ES.CodEstado = RE.CodEstado
WHERE
LI.Titulo LIKE '$busqueda%'
AND 
LE.CodLector = '$codLector'
AND
ES.CodEstado = 1
ORDER BY RE.CodReserva DESC";

	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {

		echo "<style type='text/css'>

		table{
			color:#000000;
			width: 100%;
			border: 1px solid #000000;
			background-color:#f8f8f8;
			text-align: center;

		}

		table td{
			border: 1px solid #000000;
			text-align: center;
		}

		table td a{
			margin: 4px;
			display: block;
			background:blue;
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
						<th>Nro Registro</th>
						<th>Titulo</th>
						<th>Fecha de Reserva</th>
						<th>Fecha Limite</th>
						<th>Estado</th>
					</tr>
				</theader>
				<tbody>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
				echo "<td>" .$fila['Codigo'] ."</td>";
				echo "<td>" .$fila['Titulo'] ."</td>";
				echo "<td>" .$fila['Fecha Reserva'] ."</td>";
				echo "<td>" .$fila['Fecha Limite'] ."</td>";
				echo "<td>" .$fila['Estado'] ."</td>";
			echo "</tr>";
		}

		echo "</tbody></table>";


	}else{
		echo "<p style='color: #000000;'>No Se Encontraron resultados...</p>";
	}


?>