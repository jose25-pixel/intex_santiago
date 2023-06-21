<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosreservados.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibrosReservados.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLRS").html("Procesando")
			},
			success: function(datos){
			$("#ListaLRS").html(datos);
			}
			});


			})

	


</script>

<script>
		



		//funcion para imprimir los libros segun buscador
document.getElementById("btnimprimirRes").addEventListener("click", function () {
// Obtener el valor de búsqueda
var busqueda = document.getElementById("txtbusqueda").value;

// Llamar al archivo PHP que genera el contenido de impresión
var xhr = new XMLHttpRequest();
xhr.open("GET", "listarLibrosReservadosImprimir.php?busqueda=" + encodeURIComponent(busqueda), true);
xhr.onreadystatechange = function () {
	if (xhr.readyState === 4 && xhr.status === 200) {
		var contenido = xhr.responseText;
		// Crear una ventana de impresión
		var ventimp = window.open('', 'popimpr');
		// Agregar el título y el logotipo al contenido de impresión
		var contenidoConEncabezado =  "<h2>Reporte de tus libros reservados de la Biblioteca</h2>" +
				'<img id="logo" src="./img_l/logo.jpg" alt="Logo de la Biblioteca" width="160" height="100">'  + contenido;
				ventimp.document.write('<style>#logo { position: absolute; top: 0; right: 0; }</style>');
		ventimp.document.write(contenidoConEncabezado);
		ventimp.document.close();
		ventimp.document.getElementById("logo").onload = function() {
			// Imprimir después de que la imagen se haya cargado
			ventimp.print();
			ventimp.close();
		};
	}
};
xhr.send();
});
	</script>

	<div id="ContenidoLRS">
		
		<div id="DatosLRS">
			


			<div id="tablaLRS">
				
				<h1>Libros Reservados nuevos </h1>
				<div id="busqueda">

					<div id="NuevoLRS">
					<button class="btn btn-danger bi-printer" id="btnimprimirRes">Imprimir</button>
					</div>	

					<div id="BusquedaLRS">
					<input type="text" id= "txtbusqueda" name="" placeholder="Titulo">
					<button type="button" onclick="ListarLibrosReservados();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLRS">
					
				</div>



			</div>


		</div>

	</div>




</body>
</html>