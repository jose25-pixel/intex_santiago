<?php
include('../dbconexion.php');


$dnombres = $_POST['vnombres'];
$dapellidos = $_POST['vapellidos'];
$ddireccion = $_POST['vdireccion'];
$demail = $_POST['vemail'];
$dtelefono = $_POST['vtelefono'];
$dseccion = $_POST['vseccion'];
$dbachillerato = $_POST['vbachillerato'];
$dnrcarnet = $_POST['vnrocarnet'];
$dclave = $_POST['vclave'];

if (!empty($dnombres) && !empty($dapellidos) && !empty($ddireccion)	&& !empty($demail)
 && $dtelefono != '0'   && !empty($dseccion) && !empty($dbachillerato)  && !empty($dnrcarnet) && !empty($dclave)
	) 
{
	$query = "  
	INSERT INTO Lector(
	Nombres,
	Apellidos,
	Direccion,
	Email,
	Telefono,
	seccion,
	bachillerato,
	Nro_Carnet,
	Contrasena)
	VALUES(
	'$dnombres',
	'$dapellidos',
	'$ddireccion',
	'$demail',
	'$dtelefono',
	'$dseccion',
	'$dbachillerato',
	'$dnrcarnet',
	'$dclave')
	";
	$resultado = $cnmysql->query($query);

	if ($resultado) {
		include('Vlector.php');
	}else{
		echo "<h1 style='color:#fff;'>Error al Agregar</h1>";
	}


}else{
	echo "<h1 style='color:#fff;'>Rellene todos los datos porfavor</h1>";
}




?>