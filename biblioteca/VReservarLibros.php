<?php

include('../dbconexion.php');
session_start();
$id = $_SESSION["idl"];

$query = "SELECT Nro_Carnet FROM lector wHERE CodLector = '$id'";

$resultado = $cnmysql->query($query);

$fila = mysqli_fetch_array($resultado);

$carnet  = $fila['Nro_Carnet'];



?>
<script type="text/javascript">
	var msj = <?php echo $carnet ?>;
	alert(msj);
</script>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />


	<link rel="stylesheet" type="text/css" href="css_l/hoja_reservarlibros.css">
	<title></title>
</head>

<script type="text/javascript">
	$(function VistaDefault() {

		var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
		};

		$.ajax({
			data: parametros,
			url: 'listarStockLibros.php',
			type: 'POST',
			beforeSend: function() {
				$("#ListLibros").html("Procesando")
			},
			success: function(datos) {
				$("#ListLibros").html(datos);
			}
		});
	})
</script>

<body>



	<div class="container tex-center">
		<div class="row">
			<div class="col-md-4  col-lg-4 col-sm-6 mt-4">
			
					<label  class="form-control-label  text-black" for="txtCodLector">Nro Carnet:</label>
					<input type="hidden" id="txtCodLector" value="<?php echo $id ?>">
					<input type="text" class=" form-control " id="txtNroCarnetLector" readonly value="<?php echo $carnet ?>">
				

			</div>



			<div class="col-md-4  col-lg-4 col-sm-6 mt-5">
					<label class="form-control-label  text-black" for="txtCodLibro">Codigo Libro:</label>
					<input type="number" id="txtCodLibro" min="1">
				
			</div>
			

			<div class="col-md-3  col-sm-6 col-lg-4 mt-4">
			
				<button type="button" class="btn btn-primary btn-sms mt-4" onclick="ReservarLibro();">Reservar</button>
			
			</div>
		
	
		</div>

		
		<div class="row">
			<div class="col-md-12 col-sm-6">
				<div id="MsjReserva">

				</div>
			</div>
		</div>
	</div>







	<div id="datosLista">
		<div id="busqueda">

			<input type="text" id="txtbusqueda" placeholder="Titulo,Autor,Editorial,Genero" style="width: 200px;">
			<button  type="button" onclick="ListarReservaLibro();">Buscar</button>

		</div>
		<div id="ListLibros">

		</div>

	</div>


	</div>

</body>

</html>