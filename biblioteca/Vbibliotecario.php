
<?php
	include("../dbconexion.php");

	$tabla = $cnmysql->query('SELECT * FROM bibliotecario');

	$Nrobiblios = mysqli_num_rows($tabla);

?>	


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_bibliotecario.css">

	


</head>
<body>

		<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarBibliotecario.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaBi").html("Procesando")
			},
			success: function(datos){
			$("#ListaBi").html(datos);
			}
			});


			})
		</script>


	<div id="ContenidoBi">
		
		<div id="DatosBi">
			


			<div id="tablaBi">
				
				<h1>Bibliotecarios</h1>

				<div id="busqueda">

					<div id="NuevoBi">
					<button class="btn btn-success bi-plus" onclick="VNuevoBi();"> Agregar Nuevo</button>
					</div>	

					<div id="BusquedaBi">
					<input type="text" id= "txtbusqueda" name="">
					<button class="btn btn-primary bi-search" type="button" onclick="ListarBibliotecario();"> Buscar</button>
					</div>



				</div>

				<div id="ListaBi">
					
				</div>

				<p id="Nrobibliotecario"><?php echo "Cantidad de bibliotecarios: " .$Nrobiblios; ?></p>
			</div>


		</div>

	</div>
</body>
</html>