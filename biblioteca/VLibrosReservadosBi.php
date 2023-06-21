<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosreservadobi.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibrosReservadosBi.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLRSBi").html("Procesando")
			},
			success: function(datos){
			$("#ListaLRSBi").html(datos);
			}
			});
			})


								//funcion para imprimir los libros segun buscador
document.getElementById("btnImprimirrb").addEventListener("click", function () {
    // Obtener el valor de búsqueda
    var busqueda = document.getElementById("txtbusqueda").value;

    // Llamar al archivo PHP que genera el contenido de impresión
    var xhr = new XMLHttpRequest();
    xhr.open("GET","listarlibrosresercadosbiImprimir.php?busqueda=" + encodeURIComponent(busqueda), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var contenido = xhr.responseText;
            // Crear una ventana de impresión
            var ventimp = window.open('', 'popimpr');
            // Agregar el título y el logotipo al contenido de impresión
            var contenidoConEncabezado =  "<h2>Reporte de Libros reservados a la Biblioteca</h2>" +
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


	<div id="ContenidoLRSBi">
		
		<div id="DatosLRSBi">
			


			<div id="tablaLRSBi">
				
				<h1>Libros Reservados</h1>
				<div id="busqueda">

					<div id="NuevoLRSBi">
					<button class="btn btn-danger bi-printer" id="btnImprimirrb">Imprimir</button>
					<button onclick="ListarPorFecha();">Ver por Fecha Limite</button>
					</div>	

					<div id="BusquedaLRSBi">
					<input type="text" id= "txtbusqueda" name="" placeholder="Nro Carnet Lector">
					<button type="button" onclick="ListarLibrosReservadosBi();">Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLRSBi">
					
				</div>



			</div>


		</div>
	</div>
</body>
</html>