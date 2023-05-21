<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/hoja_libros.css">
	<script type="text/javascript" src="js/funcionesLibros.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarlibros.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLi").html("Procesando")
			},
			success: function(datos){
			$("#ListaLi").html(datos);
			}
			});


			})
		</script>


	<div id="ContenidoLi">
		
		<div id="DatosLi">
			


			<div id="tablaLi">
				
				<h1>Lista de Libros</h1>
				<div id="busqueda">

					<div id="NuevoLi">

					</div>	

					<div id="BusquedaLi">
					<input type="text" id= "txtbusqueda" name="" placeholder="Titulo,Autor,Género,Editorial">
					<button type="button" onclick="ListarLibros();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLi">
					
				</div>

			</div>


		</div>

	</div>




</body>
</html>