
<?php 


	include('../dbconexion.php');
	session_start();
	$id = $_SESSION["idl"];
	/*$id = $_GET["id"];*/

	$query= "SELECT Nombres, Apellidos, Nro_Carnet FROM lector wHERE CodLector = '$id'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);
	$nombre = $fila['Nombres'];
	$apellidos = $fila['Apellidos'];
	$carnet  = $fila['Nro_Carnet'];
	$texto = "Lector: " .$nombre ." " .$apellidos ." | " ."Nro Carnet: " .$carnet;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<script type="text/javascript" src="js/funcionesAccionesLector.js"></script>
	<link rel="stylesheet" href="css_l/hoja_index_lector.css">
	<!-- Importando Iconos de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	
	<title>Sistema de Biblioteca</title>

</head>
	<script type="text/javascript">

		function AbrirVentaLogin(){
			document.forms['formingreso'].reset();

			$("#ventanalogin").slideDown("slow");
			$('#formdatos').slideDown('fast');


		}

		function CerrarVentaLogin(){
			document.forms['formingreso'].reset();
			$("#ventanalogin").slideUp("fast");
			$('#msj').hide('fast');
		}

		function CambiarContrasena(){
			var parametros = {
				"Aclve" : $('#txtclave').val(),
				"Nclve" : $('#txtnclave').val(),
				"Cclve" : $('#txtcclave').val()
			};

			$.ajax({
				data: parametros,
				url: 'DcambiarContrasena.php',
				type: 'POST',
				beforeSend: function(){
					$("#msj").html("Procesando")
				},
				success: function(msje){
					$("#msj").slideDown("fast");
					$('#msj').html(msje);
				}
			});



		}


	</script>


<body onload="VistaInicio()">
	<div id="contenedor">

	


		<div id="ventanalogin">
			

			<div id="formlogin">

				<div id="cerrar"><a href="javascript:CerrarVentaLogin();">Cerrar X</a></div>

				<h1>Cambiar Contraseña</h1>
				<hr><br>

				<form method="POST" name="formingreso" id="formcontra">
					<div id="formdatos">
						<input type="password" id="txtclave" placeholder="Contraseña" required>
						<input type="password" id="txtnclave" placeholder="Nueva Contraseña" required>
						<input type="password" id="txtcclave" placeholder="Confirmar Nueva Contraseña" required>


						<button type="button" onclick="CambiarContrasena();">Aceptar</button>
						<button type="button" onclick="CerrarVentaLogin();">Cancelar</button>
					</div>


					<div id='msj'>
						
					</div>
					

				</form>


			</div>

		</div>


		<header>
			<div id="titulo">
				<!--<h1>Sistema de Biblioteca</h1>-->
				<h3><?php echo $texto;?></h3>

				<a href="javascript:AbrirVentaLogin();">Cambiar Contraseña</a>
				
			</div>	
			
		</header>

		<br>
		<hr>

		<nav>
		<center>

			<ul id="menu">
				<li><a class="bi-house-fill" onclick="VistaInicio();"> Inicio</a></li>
				<li><a class="bi-card-list" onclick="VistaReserva();"> Reservar Libro</a></li>
				<li><a class="bi-list-ul"> Mi Historial</a> 
					<ul>
						<li><a class="bi-journals" onclick="VistaLibrosReservados();"> Libros Reservados</a></li>
						<li><a class="bi-journal-bookmark" onclick="VistaLibrosPrestadosLector();"> Libros Prestados</a></li>
						<li><a class="bi-journal-check" onclick="VistaLibrosDevueltosLector();"> Libros Devueltos</a></li>
					</ul>
				</li>

				<li><a class="bi-power" href="../index.php"> Salir</a></li>
			</ul>



		</center>
		</nav>


		<section>
			<div id="contenido">
			
			</div>
		</section>

		<footer class="p-3 mb-2 bg-secondary  text-white">
			<p>ULS Diseño de Sistemas Infomáticos | Proyecto Sistema de Biblioteca © | 2023</p>
		</footer>
		
	</div>








</body>
</html>