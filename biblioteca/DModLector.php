<?php
include('../dbconexion.php');


$dcod = $_POST['vcod'];
$dnombres = $_POST['vnombres'];
$dapellidos = $_POST['vapellidos'];
$ddireccion = $_POST['vdireccion'];
$demail = $_POST['vemail'];
$dtelefono = $_POST['vtelefono'];
$dseccion = $_POST['vsecion']; 
$dbachillerato = $_POST['vbachillerato']; 
$dcarnet= $_POST['vcarnet']; 


$query = "  
UPDATE lector
SET
Nombres = '$dnombres',
Apellidos = '$dapellidos',
Direccion = '$ddireccion',
Email = '$demail',
Telefono = '$dtelefono',
seccion ='$dseccion',
bachillerato='$dbachillerato',
Nro_Carnet='$dcarnet'
WHERE
CodLector = '$dcod'

";

$resultado = $cnmysql->query($query);

if ($resultado) {
	include('Vlector.php');
}else{
		echo "Error al Modificar";

}
?>