<?php
	include("../dbconexion.php");
	$tabla = $cnmysql->query('SELECT * FROM libros');
	$NroLibros = mysqli_num_rows($tabla);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_libro.css">
<script type="text/javascript" src="js/funcioneslibro.js"></script>
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};
			$.ajax({
			data: parametros,
			url: 'listarLibro.php', //función para listar libros en el co
			type: 'POST',
			beforeSend: function(){
			$("#ListaLi").html("Procesando")
			},
			success: function(datos){
			$("#ListaLi").html(datos);
			}
			});
			})	
//funcion para imprimir los libros en pdf
// Evento clic para imprimir

		</script>

		<script>
		



			//funcion para imprimir los libros segun buscador
document.getElementById("btnImprimir").addEventListener("click", function () {
    // Obtener el valor de búsqueda
    var busqueda = document.getElementById("txtbusqueda").value;

    // Llamar al archivo PHP que genera el contenido de impresión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "listarLibroI.php?busqueda=" + encodeURIComponent(busqueda), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var contenido = xhr.responseText;
            // Crear una ventana de impresión
            var ventimp = window.open('', 'popimpr');
            // Agregar el título y el logotipo al contenido de impresión
            var contenidoConEncabezado = "<h1>Reporte de Libros de lddvdva Biblioteca</h1>" + contenido;
            ventimp.document.write(contenidoConEncabezado);
            ventimp.document.close();
            ventimp.print();
            ventimp.close();
        }
    };
    xhr.send();
});
		</script>


<script>
	
//funcion para imprimir Viñetas
function imprimirCodigo(Codigo, Titulo, numEjemplares) {
  var contenido = "";

  for (var i = 1; i <= numEjemplares; i++) {
    contenido += "<div style='font-size: 16px; display: inline-block; padding: 15px;'>" + Codigo + "</div>";

    // Realizar un salto de página después de cada 40 ejemplares
    if (i % 40 === 0) {
      contenido += "<div style='page-break-after: always;'></div>";
    }
  }

  var ventimp = window.open("", "popimpr");
  ventimp.document.write("<html><head><style>div { font-size: 70px; } h1 { font-size: 30px; }</style></head><body><div style='text-align: center;'><h1>" + Titulo + "</h1>" + contenido + "</div></body></html>");
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
}


</script>



	<div id="ContenidoLi">
		<div id="DatosLi">
			<div id="tablaLi">	
				<h1>Lista de Libros</h1>
				<div id="busqueda">
					<div id="NuevoLi">
					<button class="btn btn btn-success bi-plus" onclick="VNuevoLi();"> Agregar Libro</button>
					<button class="btn btn-info bi-people" onclick="VistaDetalleAutor();"> Autor</button>
					<button class="btn btn-info bi-book" onclick="VistaDetalleEditorial();"> Editorial</button>
					<button class="btn btn-info bi-clipboard-plus" onclick="VistaDetalleGenero();"> Género</button>
				
					<button class="btn btn-danger bi-printer" id="btnImprimir">Imprimir</button>
					</div>	
					
					<div id="BusquedaLi">
					
					<input type="text" id= "txtbusqueda" name="" placeholder="Titulo,Autor,Editorial,Genero">
					<button class="btn btn-primary bi-search" type="button" onclick="ListarLibro();"> Buscar</button>		
					</div>
				</div>
			


				<div id="ListaLi">
				</div>
				<p id="NroLibros"><?php echo "Cantidad de Libros:" .$NroLibros; ?></p>
			</div>
		</div>
	</div>
</body>
</html>