
<?php

	include('../dbconexion.php');
	$dcodBi = $_POST['vcod'];


	$query= "SELECT * FROM bibliotecario wHERE CodBibliotecario = '$dcodBi'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);

	$Nombres = $fila['Nombres'];
	$Apellidos = $fila['Apellidos'];
	$Cargo = $fila['Cargo'];
	$Direccion = $fila['Direccion'];
	$Email = $fila['Email'];
	$Telefono = $fila['Telefono'];
	$Dni = $fila['Dni'];
	$carnet = $fila['Nro_Carnet'];
?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_ModBibliotecario.css">
	<title></title>
</head>
<body>
	<div id="CModBi">
		
		<div id="formulario">
			<h1>Modificar Bibliotecario</h1>
			<form>
			<input type="hidden" id="txtcod" value="<?php echo $dcodBi ;?>">
			<div>
			<label for="txtnombres">Nombres:</label>
			<input type="text" required id="txtnombres" value="<?php echo $Nombres ;?>" >
			</div>

			<div>
			<label for="txtapellidos">Apellidos:</label>
			<input type="text" required id="txtapellidos" value="<?php echo $Apellidos ;?>" >	
			</div>
			

			<div>
			<label for="txtcargo">Cargo:</label>
			<input type="text" required id="txtcargo" value="<?php echo $Cargo;?>" >	
			</div>


			<div>
			<label for="txtdireccion">Dirección:</label>
			<input type="text" required id="txtdireccion" value="<?php echo $Direccion ;?>" >	
			</div>

			<div>
			<label for="txtemail">Email:</label>
			<input type="text" required id="txtemail" value="<?php echo $Email;?>" >	
			</div>

			<div>
			<label for="txttelefono">Telefono:</label>
			<input type="text" required id="txttelefono" value="<?php echo $Telefono ;?>" >	
			</div>

			<div>
			<label for="txtdni">DNI:</label>
			<input type="text" required id="txtdni" value="<?php echo $Dni ;?>" >	
			</div>
                  

			<div>
			<label for="txtcarne">Carnet:</label>
			<input type="text" required id="txtcarne" value="<?php echo $carnet;?>" >	
			</div>
			

			<div id= 'botones'>
				<button type="button" class="btn btn-primary" onclick="DModificarBi();">Aceptar Cambios</button>
				<button type="button" class="btn btn-danger" onclick="VistaBibliotecario();">Cancelar Cambios</button>
			</div>
			</form>
		</div>

	</div>

</body>
</html>