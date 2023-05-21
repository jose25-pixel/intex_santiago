<?php
	include("../dbconexion.php");

	$tabla = $cnmysql->query('SELECT * FROM lector');

	$NroLector = mysqli_num_rows($tabla);

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_lector.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLector.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLe").html("Procesando")
			},
			success: function(datos){
			$("#ListaLe").html(datos);
			}
			});


			})
		</script>


<script>
document.getElementById("btnImprimirlector").addEventListener("click", function () {
    // Obtener el valor de búsqueda
    var busqueda = document.getElementById("txtbusqueda").value;

    // Llamar al archivo PHP que genera el contenido de impresión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "listarLibrolector.php?busqueda=" + encodeURIComponent(busqueda), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var contenido = xhr.responseText;
            // Crear una ventana de impresión
            var ventimp = window.open('', 'popimpr');
            // Agregar el título y el logotipo al contenido de impresión
            var contenidoConEncabezado = "<h1>Reporte de Estudiantes de la Biblioteca</h1><img src='ruta_del_logo.png' alt='Logo de la Biblioteca'>" + contenido;
            ventimp.document.write(contenidoConEncabezado);
            ventimp.document.close();
            ventimp.print();
            ventimp.close();
        }
    };
    xhr.send();
});
		</script>


	<div id="ContenidoLe">
		
		<div id="DatosLe">
			


			<div id="tablaLe">
				
				<h1>Estudiantes</h1>
				<div id="busqueda">

					<div id="NuevoLe">
					<button class="btn btn-success bi-plus" onclick="VNuevoLe();"> Agregar Nuevo</button>
					<button class="btn btn-warning bi-printer" id="btnImprimirlector">Imprimir</button>
					</div>	

					<div id="BusquedaLe">
					<input type="text" id= "txtbusqueda" name="">
					<button class="btn btn-primary bi-search" type="button" onclick="ListarLector();"> Buscar</button>
					
					</div>

					
				</div>

				<div id="ListaLe">
					
				</div>


				<p id="NroLectores"><?php echo "Cantidad de Estudiantes: " .$NroLector; ?></p>

			</div>


		</div>

	</div>




</body>
</html>