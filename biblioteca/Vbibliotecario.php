
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

		<script>

document.getElementById("btnImprimirbibli").addEventListener("click", function () {
    // Obtener el valor de búsqueda
    var busqueda = document.getElementById("txtbusqueda").value;

    // Llamar al archivo PHP que genera el contenido de impresión
    var xhr = new XMLHttpRequest();
    xhr.open("GET","listarbibliotecarioimprimir.php?busqueda=" + encodeURIComponent(busqueda), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var contenido = xhr.responseText;
            // Crear una ventana de impresión
            var ventimp = window.open('', 'popimpr');
            // Agregar el título y el logotipo al contenido de impresión
            var contenidoConEncabezado =  "<h1>Reporte de bibliotecarios de la Biblioteca</h1>" +
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


	<div id="ContenidoBi">
		
		<div id="DatosBi">
			


			<div id="tablaBi">
				
				<h1>Bibliotecarios</h1>

				<div id="busqueda">

					<div id="NuevoBi">
					<button class="btn btn-success bi-plus" onclick="VNuevoBi();"> Agregar Nuevo</button>
					<button class="btn btn-danger bi-printer" id="btnImprimirbibli">Imprimir</button>
					</div>	

					<div id="BusquedaBi">
					<input type="text" id= "txtbusqueda" name="" placeholder="Nombre Apellidos Nu_carnet">
					<button class="btn btn-primary bi-search" type="button"   onclick="ListarBibliotecario();"> Buscar</button>
					</div>



				</div>

				<div id="ListaBi">
					
				</div>

				<p id="Nrobibliotecario" class="text-dark"><?php echo "Cantidad de bibliotecarios: " .$Nrobiblios; ?></p>
			</div>


		</div>

	</div>
</body>
</html>