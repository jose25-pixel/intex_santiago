<?php
include('../dbconexion.php');


$dcod = $_POST['vcod'];
$dnombres = $_POST['vnombres'];
$dapellidos = $_POST['vapellidos']; 
$dcargo = $_POST['vcargo']; 
$ddireccion = $_POST['vdireccion'];
$demail = $_POST['vemail'];
$dtelefono = $_POST['vtelefono'];
$ddni = $_POST['vdni'];
$dcanet = $_POST['vcarnet'];



$query = "  
UPDATE bibliotecario 
SET
Nombres = '$dnombres',
Apellidos = '$dapellidos',
Cargo = '$dcargo',
Direccion = '$ddireccion',
Email = '$demail',
Telefono = '$dtelefono',
Dni = '$ddni',
Nro_Carnet = '$dcanet'
WHERE
CodBibliotecario = '$dcod'

";

$resultado = $cnmysql->query($query);

if ($resultado) {
	include('Vbibliotecario.php');
}else{
		echo "Error al Modificar";

}
?>