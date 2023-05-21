<!DOCTYPE html>
<html>

<head>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<script type="text/javascript">
	$(function() {

		$("#slider div:gt(0)").hide();

		setInterval(function() {
			$("#slider div:first-child").fadeOut(1000)
				.next("div").fadeIn(1000)
				.end().appendTo("#slider");
		}, 3000);

	})
</script>

<body>
	<br>

<div class="cuerpo" id="cuerpo">


	<div class="titulo text-center fw-bolder" >
		<h3 class="text-dark">Bienvenidos a la biblioteca del Instituto Nacional de Santiago Texacuangos</h3>
	</div>

	<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class=" cca carousel-item active">
				<img src="./img/img1.jfif" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="./img/img2.jfif" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="./img/img1.jfif" class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	        <div class="conenedorcard row mt-4">

			<div class="card col-sm-12 col-md-4">
					<img src="./img/bd.jpg" class="card-img-top" alt="...">
					<div class="card-body text-center">
						<h5 class="card-title text-dark">Beneficios de Leer</h5>
						<p class="card-text text-dark">La lectura aumenta la capacidad de las personas para concentrarse, favorece las conexiones neuronales y, si se realiza con frecuencia, es un ejercicio muy útil para evitar la pérdida de algunas funciones cognitivas. Leer mantiene activa la mente y esto, según estudios científicos, incrementa 
							la rapidez de respuesta de las personas dado que la lectura entrena al cerebro para ordenar ideas.</p>
					</div>
				</div>
				


				<div class="card col-sm-12 col-md-4">
					<img src="./img/img.jpg" class="card-img-top" alt="...">
					<div class="card-body text-center">
						<h5 class="card-title  text-dark">Bibliotecas Virtuales</h5>
						<p class="card-text text-dark">Es importante considerar que en el concepto de biblioteca virtual está presente el efecto de la integración de la informática y las comunicaciones cuyo exponente esencial es Internet. No se trata solamente de que los contenidos estén en formato digital lo que prevalece en el concepto de biblioteca digital.
							 Los contenidos digitales son una parte necesaria pero no suficiente.</p>
					</div>
				</div>
	       	</div>
</div>