<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript">
		

	document.getElementById("btnImprimirdesv").addEventListener("click", function () {
    // Llamar al archivo PHP que genera el contenido de impresión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "listarlibrosdevueltoslectorimpri.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var contenido = xhr.responseText;
            // Crear una ventana de impresión
            var ventimp = window.open('', 'popimpr');
            // Agregar el título y el logotipo al contenido de impresión
            var contenidoConEncabezado =  "<h2>Reporte de tus libros devueltos de la Biblioteca</h2>" +
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

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosDevueltosLector.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
			data: parametros,
			url: 'listarlibrosdevueltoslector.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLDL").html("Procesando")
			},
			success: function(datos){
			$("#ListaLDL").html(datos);
			}
			});



		})



</script>


	<div id="ContenidoLDL">
		
		<div id="DatosLDL">
			


			<div id="tablaLDL">
				
				<h1>Mis Libros Devueltos</h1>
				<div id="busqueda">




					<div id="ImprimirLDL">
					<button class="btn btn-danger bi-printer" id="btnImprimirdesv">Imprimir</button>
					</div>	

					<!--<div id="BusquedaLR">
					<input type="text" id="txtbusqueda" name="" placeholder="Nro Carnet Lector">
					<button type="button" onclick="ListarLibrosDevueltos();">Buscar</button>
					</div>-->


					
				</div>

				<div id="ListaLDL">
					
				</div>

			</div>


		</div>

	</div>




</body>
</html>