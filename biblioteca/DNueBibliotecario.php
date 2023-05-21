<?php
include('../dbconexion.php');



$dnombres = $_POST['vnombres'];
$dapellidos = $_POST['vapellidos'];
$dcargo = $_POST['vcargo'];
$ddireccion = $_POST['vdireccion'];
$demail = $_POST['vemail'];
$dtelefono = $_POST['vtelefono'];
$ddni = $_POST['vdni'];
$dnrcarnet = $_POST['vnrocarnet'];
$dclave = $_POST['vclave'];

if (!empty($dnombres) && !empty($dapellidos)   && !empty($dcargo)	 && !empty($ddireccion)	&& !empty($demail) && $dtelefono != '0' && $ddni != '0' && !empty($dnrcarnet) && !empty($dclave)
	) 
{

	$query = "  
	INSERT INTO bibliotecario(
	Nombres,
	Apellidos,
	Cargo,
	Direccion,
	Email,
	Telefono,
	Dni,
	Nro_Carnet,
	Contrasena)
	VALUES(
	'$dnombres',
	'$dapellidos',
	'$dcargo',
	'$ddireccion',
	'$demail',
	'$dtelefono',
	'$ddni',
	'$dnrcarnet',
	'$dclave')
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {
		include('Vbibliotecario.php');
	}else{
		echo "<h1 style='color:#fff;'>Error al Agregar</h1>";
	}


}else{
	echo "<h1 style='color:#fff;'>Rellene todos los datos porfavor</h1>";
}




?>