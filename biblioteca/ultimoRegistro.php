<?php


include('../dbconexion.php');


$query="SELECT codigo, Ejemplar FROM libros ORDER BY CodLibro DESC LIMIT 1";
	$resultado = $cnmysql->query($query);

	if ($resultado) {
		$registro = $resultado->fetch_assoc();
		//echo json_encode($registro);
		$ultimoCodigo = $registro['codigo'];
		$ultimoEjemplares = $registro['Ejemplar'];

		for ($i = 1; $i <= $ultimoEjemplares; $i++) {
			echo $ultimoCodigo . "<br>". "<br>";
		}

		
	  } else {
		echo "Error al obtener el último registro insertado.";
	  }


	

?>





