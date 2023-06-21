<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript">
		

		document.getElementById("btnImprimirpres").addEventListener("click", function () {
    // Llamar al archivo PHP que genera el contenido de impresión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "listarlibrosprestadoLectImprimir.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var contenido = xhr.responseText;
            // Crear una ventana de impresión
            var ventimp = window.open('', 'popimpr');
            // Agregar el título y el logotipo al contenido de impresión
            var contenidoConEncabezado =  "<h2>Reporte de tus libros prestados de la Biblioteca</h2>" +
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
	

	
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosPrestadosLector.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
			data: parametros,
			url: 'listarlibrosprestadoslector.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLPL").html("Procesando")
			},
			success: function(datos){
			$("#ListaLPL").html(datos);
			}
			});



		})



</script>


	<div id="ContenidoLPL">
		
		<div id="DatosLPL">
			


			<div id="tablaLPL">
				
				<h1>Mis Libros Prestados</h1>
				<div id="busqueda">




					<div id="ImprimirLPL">
					<button class="btn btn-danger bi-printer" id="btnImprimirpres">Imprimir</button>
					</div>	

					<!--<div id="BusquedaLR">
					<input type="text" id="txtbusqueda" name="" placeholder="Nro Carnet Lector">
					<button type="button" onclick="ListarLibrosDevueltos();">Buscar</button>
					</div>-->


					
				</div>

				<div id="ListaLPL">
					
				</div>

			</div>


		</div>

	</div>




</body>
</html>