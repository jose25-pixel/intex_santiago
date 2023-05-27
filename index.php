<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<link rel="stylesheet" href="css/hoja_index.css">

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />

	<title>INSTEX</title>

</head>

<script type="text/javascript">
	function AbrirVentaLogin() {
		document.forms['formingreso'].reset();
		$("#ventanalogin").slideDown("slow");
		$('#ErrorUsuario').hide('fast');
	}

	function CerrarVentaLogin() {
		document.forms['formingreso'].reset();
		$("#ventanalogin").slideUp("fast");
		$('#ErrorUsuario').hide('fast');
	}
</script>

<body onload="VistaInicio()">



	<div class="container">


		<div id="contenedor">

			<div id="ventanalogin">


				<div id="formlogin">

					<h1 class="btn ">Ingresar al Sistema</h1>
					<hr><br>

					<form method="POST" name="formingreso">

						<input type="text" name="txtnrcarnet" placeholder="Nro. Carnet..." required>
						<input type="password" name="txtclave" placeholder="Contraseña..." required>
						<button type="submit" class="btn btn-primary" name="btnEntrar">Entrar</button>
						<button type="button" class="btn btn-danger" onclick="javascript:CerrarVentaLogin();">Cancelar</button>
						<div id='ErrorUsuario'><strong>Error!</strong>Usuario No Encontrado</div>
						<?php
						include('dbconexion.php');

						if (isset($_POST['btnEntrar'])) {

							$nrcarnet = $_POST['txtnrcarnet'];
							$clave = $_POST['txtclave'];

							$query_b = "SELECT CodBibliotecario, Nro_Carnet FROM bibliotecario WHERE Nro_Carnet='$nrcarnet' AND Contrasena ='$clave'";
							$query_l = "SELECT CodLector, Nro_Carnet FROM lector WHERE Nro_Carnet='$nrcarnet' AND Contrasena ='$clave'";

							$result_b = $cnmysql->query($query_b);
							$result_l = $cnmysql->query($query_l);

							$num_row_b = mysqli_num_rows($result_b);
							$num_row_l = mysqli_num_rows($result_l);



							if ($num_row_b > 0) {

								$row = mysqli_fetch_array($result_b);

								/*$idb = $row['CodBibliotecario'];*/

								session_start();
								$_SESSION["idb"] = $row['CodBibliotecario'];

								/*header("location: biblioteca/indexbibliotecario.php?id=$idb");*/
								header("location: biblioteca/indexbibliotecario.php");
							} elseif ($num_row_l > 0) {

								$row = mysqli_fetch_array($result_l);

								/*$idl = $row['CodLector'];*/

								session_start();
								$_SESSION["idl"] = $row['CodLector'];

								/*header("location: biblioteca/indexlector.php?id=$idl");*/
								header("location: biblioteca/indexlector.php");
							} else {


								echo "<script>";
								echo "$('#ventanalogin').slideDown('slow');";
								echo "$('#ErrorUsuario').slideDown('slow');";
								echo "</script>";
							}
						} else {
						}
						?>


					</form>
				</div>

			</div>

			<header>

				<div id="titulo">
					<h1 class="text-dark">Instituto Nacional de Santiago Texacuangos</h1>
				</div>

			</header>

			<br>
			<hr>
			<div class="container">
				<div class="">
					<nav class="navbar navbar-expand-lg  text-center data-bs-theme="" style=" background-color:#9cacc0;">
						<div class=" container-fluid">
							<img src="./img/Intex.png" alt="" style="width:50px;  ">
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                                 <li class="nav-item nav-link fs-5">
								 <a class="bi bi-house-door nav-link active" aria-current="page" onclick="VistaInicio();" href="#"> Inicio</a>
								 </li>

									<li class="nav-item nav-link fs-5">
										<a class="bi bi-book nav-link active" aria-current="page" onclick="VistaLibros();" href="#"> Libros</a>
									</li>
									<li class="nav-item nav-link fs-5">
										<a class="bi bi-box-arrow-right nav-link active" aria-current="page" href="javascript:AbrirVentaLogin();"> Ingresar</a>
									</li>
									<li class="nav-item nav-link fs-5">
										<a class="bi-info-circle-fill nav-link active" aria-current="page" onclick="VistaAcercaDe();" href="#"> Acerca de</a>
									</li>
								</ul>
							</div>

					</nav>
				</div>
				<hr>
				<hr>


				<div id="contenido" class="">

				</div>


				<div class="col-md-12 col-ms-12 mt-3">
					<footer class="p-1 bg-secondary text-white">
						<p>ULS Diseño de Sistemas Infomáticos | Proyecto Sistema de Biblioteca © | 2023</p>
					</footer>

				</div>
			</div>


		</div>
	</div>


</body>


</html>
