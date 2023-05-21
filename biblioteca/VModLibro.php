<?php

	include('../dbconexion.php');



	$dcodLi = $_POST['vcod'];


	$query= "SELECT * FROM libros wHERE CodLibro = '$dcodLi'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);




	$Titulo = $fila['Titulo'];
	$Codigo = $fila['Codigo'];

	$CodAutor = $fila['CodAutor'];
	$CodGenero = $fila['CodGenero'];
	$CodEditorial = $fila['CodEditorial'];
	$Ubicacion = $fila['Ubicacion'];
	$Ano_edicion = $fila['ano_edicion'];
	$Paginas = $fila['Paginas'];
	$Ejemplar = $fila['Ejemplar'];
	$Descripcion = $fila['Descripcion'];



$tablaautor = $cnmysql->query("SELECT * FROM autor");

$tablagenero = $cnmysql->query("SELECT * FROM genero");

$tablaeditorial = $cnmysql->query("SELECT * FROM editorial");


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_NueLibro.css"><!--CAMBIAR-->
	<title></title>
</head>

<script>


$("#FormModificarLibro").on("submit", function(e){
	e.preventDefault();

	var formData = new FormData(document.getElementById("FormModificarLibro"));

	$.ajax({
		url: "DModLibro.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(datos){
		$("#ContenidoLi").html(datos);
	});
});


</script>


<body>
	<div id="CModLi">
		
		<div id="formulario">
			<h1>Modificar Libro</h1>


			<form enctype="multipart/form-data" id="FormModificarLibro" method="POST">
				<input type="hidden" name="txtcod" id="txtcod" value="<?php echo $dcodLi; ?>">
				<div>
				<label for="txttitulo">Titulo:</label>
				<input type="text" required id="txttitulo" name="txttitulo" value="<?php echo $Titulo; ?>">
				</div>
				<div>
				<label for="txtcodigo">Dewey:</label>
				<input type="text" required id="txtcodigo" name="txtcodigo" value="<?php echo $Codigo; ?>">
				</div>
    
				<div>
					<label for="picimagen">Portada:</label>
					<input type="file"  id="picimagen" type="" name="picimagen">
				</div>

				<div>
				<label for="cboautor">Autor:</label>
				<select id="cboautor" name="cboautor">
					<?php
					
					while ($fila = mysqli_fetch_array($tablaautor)) {

						$filaCod = $fila['CodAutor'];
									
						echo "<option value='" .$fila['CodAutor'] ."'";

						if($filaCod == $CodAutor){
							echo 'selected';
						}
						echo ">" .$fila['Descripcion'] ."</option>";
	
					}
					?>

				</select>
				</div>



				<div>
				<label for="cbogenero">Género:</label>
				<select id="cbogenero" name="cbogenero">
					<?php
					
					while ($fila = mysqli_fetch_array($tablagenero)) {

						$filaCod = $fila['CodGenero'];

						echo "<option value='" .$fila['CodGenero'] ."'";

						if ($filaCod == $CodGenero) {
							echo 'selected';
						}
						echo ">" .$fila['Descripcion'] ."</option>";
								
					}
					?>
				</select>	
				</div>



				<div>
				<label for="cboeditorial">Editorial:</label>
				<select id="cboeditorial" name="cboeditorial">
					<?php
					
					while ($fila = mysqli_fetch_array($tablaeditorial)) {
						$filaCod = $fila['CodEditorial'];

						echo "<option value='" .$fila['CodEditorial'] ."'";

						if ($filaCod == $CodEditorial) {
							echo 'selected';
						}
						echo ">" .$fila['Descripcion'] ."</option>";
							
					}
					?>
				</select>	
				</div>




				<div>
				<label for="txtubicacion">Ubicacion:</label>
				<input type="text" required id="txtubicacion" name="txtubicacion" value="<?php echo $Ubicacion; ?>">	
				</div>


				<div>
				<label for="txtano_edicion">Año_Edición:</label>
				<input type="text" required id="txtano_edicion" name="txtano_edicion" value="<?php echo $Ano_edicion; ?>">	
				</div>

				<div>
				<label for="txttxtpaginas">Paginas:</label>
				<input type="number" required id="txtpaginas" name="txtpaginas" value="<?php echo $Paginas; ?>">	
				</div>


	
				<div>
				<label for="txtejemplar">Ejemplares:</label>
				<input type="number" required id="txtejemplar" name="txtejemplar" value="<?php echo $Ejemplar; ?>" min="1">
				
				</div>		

				<div>
				<label for="txtdescripcion">Descripcion:</label>
				<input type="text" required id="txtdescripcion" name="txtdescripcion" value="<?php echo $Descripcion
; ?>" min="1">
				
				</div>	

				<div id= 'botones'>
					<button class="btn btn-success bi-save" type="submit"> Aceptar Cambios</button>
					<button class="btn btn-danger bi-x-octagon" type="button" onclick="VistaLibro();"> Cancelar Cancelar</button>
				</div>

			</form>
		</div>	

	</div>

</body>
</html>