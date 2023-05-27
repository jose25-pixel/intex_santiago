<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosPrestados.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibrosPrestados.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLP").html("Procesando")
			},
			success: function(datos){
			$("#ListaLP").html(datos);
			}
			});


			})


			function imprSelec(nombre) {
			  var ficha = document.getElementById(nombre);//obtenemos el objeto a imprimir
			  var ventimp = window.open(' ', 'popimpr'); //abrimos una ventana vacía nueva
			  ventimp.document.write( ficha.innerHTML ); //imprimimos el HTML del objeto en la nueva ventana
			  ventimp.document.close(); //cerramos el documento
			  ventimp.print( ); //imprimimos la ventana
			  ventimp.close(); //cerramos la ventana

			}



</script>


	<div id="ContenidoLP">
		
		<div id="DatosLP">
			


			<div id="tablaLP">
				
				<h1>Libros Prestados admin</h1>
				<div id="busqueda">

					<div id="NuevoLP">
					<button class="btn btn-primary text-white" onclick="imprSelec('ListaLP');">Imprimir</button>
					</div>	

					<div id="BusquedaLP">
					<input type="text" id= "txtbusqueda" name="" placeholder="Nro Carnet Lector">
					<button type="button" id="" class="btn btn-primary  bi-search" onclick="ListarLibrosPrestados();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLP">
					
				</div>



			</div>


		</div>

	</div>




</body>
</html>