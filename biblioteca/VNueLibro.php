<?php

include('../dbconexion.php');
$tablaautor = $cnmysql->query("SELECT * FROM autor");
$tablagenero = $cnmysql->query("SELECT * FROM genero");
$tablaeditorial = $cnmysql->query("SELECT * FROM editorial");

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_NueLibro.css">
	<meta charset="utf-8">
	<title></title>
</head>
<script>
$("#FormNuevoLibro").on("submit", function(e){
	e.preventDefault();

	var formData = new FormData(document.getElementById("FormNuevoLibro"));

	$.ajax({
		url: "DNueLibro.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(datos){
		$("#ContenidoLi").html(datos);
		// Obtener los datos del último registro insertado
	/*	$.ajax({
  url: "ultimoRegistro.php",
  type: "GET",
  dataType: "HTML"
}).done(function(datos){
  // Mostrar ventana de impresión con los datos del último registro insertado
  var ventanaImpresion = window.open('', '', 'height=500,width=800');
  ventanaImpresion.document.write("<html><head><title>Último registro insertado</title></head><body>");
  ventanaImpresion.document.write("<h1>Último registro insertado</h1>");
  ventanaImpresion.document.write("<p style='font-size: 35px; padding: 20px 20px 20px'>" + datos + "</p>");
  ventanaImpresion.document.write("</body></html>");
  ventanaImpresion.document.close();
  ventanaImpresion.focus();
  ventanaImpresion.print();

});*/
	});
});


</script>
<body>
	<div id="CModLi">	
		<div id="formulario">
			<h1>Nuevo Libro</h1>
			<form enctype="multipart/form-data"   id="FormNuevoLibro" method="POST">
				<div>
				<label for="txttitulo">Titulo:</label>
				<input type="text" required id="txttitulo" name="txttitulo" placeholder="Cuentos de barro">
				</div>

				<div>
				<label for="txtcodigo">Dewey:</label>
				<input type="text" required id="txtcodigo" name="txtcodigo" placeholder="800.890">
				</div>
				<div>
					<label for="picimagen">Portada:</label>
					<input style="color:black" type="file" required id="picimagen" type="" name="picimagen">
				</div>
				<div>
				<label for="cboautor">Autor:</label>
				<select id="cboautor" name="cboautor">
					<?php
					
					while ($fila = mysqli_fetch_array($tablaautor)) {

						echo "<option value='" .$fila['CodAutor'] ."'>" .$fila['Descripcion'] ."</option>";			
					}
					?>
				</select>
				</div>
				<div>
				<label for="cbogenero">Género:</label>
				<select id="cbogenero" name="cbogenero">
					<?php
					
					while ($fila = mysqli_fetch_array($tablagenero)) {

						echo "<option value='" .$fila['CodGenero'] ."'>" .$fila['Descripcion'] ."</option>";			
					}
					?>
				</select>	
				</div>
				<div>
				<label for="cboeditorial">Editorial:</label>
				<select id="cboeditorial" name="cboeditorial">
					<?php
					
					while ($fila = mysqli_fetch_array($tablaeditorial)) {

						echo "<option value='" .$fila['CodEditorial'] ."'>" .$fila['Descripcion'] ."</option>";			
					}
					?>
				</select>	
				</div>
				<div>
				<label for="txtubicacion">Ubicacion:</label>
				<input type="text" required id="txtubicacion" name="txtubicacion" placeholder="Estante "1-A" >	
				</div>
                 
				<div>
				<label for="txtano_edicion">Año_edición:</label>
				<input type="text" required id="txtano_edicion" value="" name="txtano_edicion" min="1" placeholder="1956">
				</div>	


				<div>
				<label for="txtpaginas">Paginas:</label>
				<input type="number" required id="txtpaginas" value="" name="txtpaginas" min="1" placeholder="400">
				</div>	


				<div>
				<label for="txtejemplar">Ejemplares:</label>
				<input type="number" required id="txtejemplar" value="" name="txtejemplar" min="1" placeholder="30">
				</div>	


				<div>
				<label for="txtdescripcion">Descripcion:</label>
				<input type="text" required id="txtdescripcion" value="" name="txtdescripcion" min="1" placeholder="Mitologia Cuscatleca">
				</div>					
				

				<div id= 'botones'>
					<button class="btn btn-success bi-save" type="submit"> Guardar</button>
					<button class="btn btn-danger bi-x-octagon" type="button" onclick="VistaLibro();"> Cancelar</button>
				</div>
			</form>
		</div>	
	</div>
</body>
</html>