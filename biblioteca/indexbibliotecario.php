
<?php 
	
	include('../dbconexion.php');

	/*$id = $_GET["id"];*/

	session_start();
	$id = $_SESSION["idb"];

	$query= "SELECT Nombres, Apellidos, Nro_Carnet FROM bibliotecario wHERE CodBibliotecario = '$id'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);

	$nombre = $fila['Nombres'];
	$apellidos = $fila['Apellidos'];
	$carnet  = $fila['Nro_Carnet'];


	$texto = "Bibliotecario: " .$nombre ." " .$apellidos ." | " ."Nro Carnet: " .$carnet;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<script type="text/javascript" src="js/funcionesBibliotecario.js"></script>
	<script type="text/javascript" src="js/funcionesLector.js"></script>
	<script type="text/javascript" src="js/funcioneslibro.js"></script>
	<script type="text/javascript" src="js/funcionesAutor.js"></script>
	<script type="text/javascript" src="js/funcionesEditorial.js"></script>
	<script type="text/javascript" src="js/funcionesGenero.js"></script>
	<script type="text/javascript" src="js/funcionesAccionesLector.js"></script>

<script type="text/javascript" src="js/funcionesPrestamo.js"></script>

	<link rel="stylesheet" href="css_l/hoja_index_bibliotecario.css">
	<!-- Importando Iconos de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	
	<title>Sistema de Biblioteca</title>



</head>
<body onload="VistaInicio()">
	<div id="contenedor">

	

		<header>
		
			

			<div id="titulo">
				<h1>Sistema de Biblioteca</h1>
				<h3 ><?php echo $texto;?></h3>
			</div>	

			
		</header>

		<br>
		<hr>

		<nav>
		<center>

			<ul id="menu">
				<li ><a class="bi-house-fill" onclick="VistaInicio();"> Inicio</a></li>
				<li><a class="bi-people-fill" onclick="VistaBibliotecario();"> Bibliotecarios</a></li>
				<li><a class="bi-shuffle"> Transacciones</a> 
					<ul>
						<li ><a class="bi-card-list" onclick="VistaPrestamo(<?php echo $id ?>);"> Prestamos</a></li>
						<li><a class="bi-journal-bookmark" onclick="VistaLibrosPrestados();"> Libros Prestados</a></li>
						<li><a class="bi-journal-check" onclick="VistaLibrosRetornados();"> Libros Devueltos</a></li>
						<li><a class="bi-journals" onclick="VistaLibrosReservadosBi();"> Ver Reservas</a></li>
					</ul>
				</li>

				<li><a class="bi-book" onclick="VistaLibro();"> Libros</a></li>
				<li><a class="bi-person-badge" onclick="VistaLector();"> Estudiantes</a></li>
				<li><a class="bi-power"  href="../index.php"> Salir</a></li>
			</ul>
		</center>
		</nav>
		<section>
			<div id="contenido">
			</div>
		</section>
		<footer class="p-3 mb-2 bg-secondary text-white">
			<p>ULS Diseño de Sistemas Infomáticos | Proyecto Sistema de Biblioteca © | 2023</p>
		</footer>
	</div>
</body>
</html>