
<?php

	include('../dbconexion.php');
	$dcodLe = $_POST['vcod'];
	$query= "SELECT * FROM lector wHERE CodLector = '$dcodLe'";
	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);
	$Nombres = $fila['Nombres'];
	$Apellidos = $fila['Apellidos'];
	$Direccion = $fila['Direccion'];
	$Email = $fila['Email'];
	$Telefono = $fila['Telefono'];
	$Seccion = $fila['seccion'];
	$Bachillerato= $fila['bachillerato'];
	$Carnet= $fila['Nro_Carnet'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_ModLector.css">
	<title></title>
</head>
<body>
	<div id="CModLe">
		
		<div id="formulario">
			<h1>Modificar Lector</h1>
			<form>
			<input type="hidden" id="txtcod" value="<?php echo $dcodLe ;?>">
			<div>
			<label for="txtnombres">Nombres:</label>
			<input type="text" required id="txtnombres" value="<?php echo $Nombres ;?>" >
			</div>

			<div>
			<label for="txtapellidos">Apellidos:</label>
			<input type="text" required id="txtapellidos" value="<?php echo $Apellidos ;?>" >	
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
			<input type="numb" required id="txttelefono" value="<?php echo $Telefono ;?>" min="1" >	
			</div>

			
			<div>
			<label for="txtseccion">Sección:</label>
			<input type="text" required id="txtseccion" value="<?php echo $Seccion;?>" min="1" >	
			</div>

		

			<div>
			<label for="txtbachillerato">Bachillerato:</label>
			<select required id="txtbachillerato" name="txtbachillerato">
			
			<option  value="<?php echo $Bachillerato;?>"> <?php echo $Bachillerato;?></option> 
                              <option>Primer año General</option>
                              <option>Segundo año General</option>
                              <option>Primer año  Contador</option>
                              <option>Segundo año Contador</option>
                              <option>Tecer año Contador</option>
			</select>	
			</div>

		 
			<div>
			<label for="txtseccion">Num Carnet:</label>
			<input type="text" required id="txtcarnet" value="<?php echo $Carnet;?>" min="1" >	
			</div>

	

			<div id= 'botones'>
				<button class="btn btn-success bi-save" type="button" onclick="DModificarLe();"> Aceptar </button>
				<button class="btn btn-danger bi-x-octagon" type="button" onclick="VistaLector();"> Cancelar </button>
			</div>
			



			

			</form>
		
			

		</div>

	</div>

</body>
</html>