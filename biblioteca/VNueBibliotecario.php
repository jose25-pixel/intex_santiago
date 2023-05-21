<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_NueBibliotecario.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<script type="text/javascript">
		function GenerarCarnetBi(){

		var parametros = {};

        $.ajax({
            data:  parametros,
            url:   'NuevoCarnetBibliotecario.php',
            type:  'POST',
            beforeSend: function () {
                //$("#contenido").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                var arreglo = new Array()
                arreglo = response.split("|");
                $("#txtnroCarnet").val(arreglo[0]);
            }
        });
		}

	</script>

	<div id="CModBi">
		
		<div id="formulario">
			<h1>Nuevo Bibliotecario</h1>
			<form>
			
			<div>
			<label for="txtnombres">Nombres:</label>
			<input type="text" required id="txtnombres" value="" >
			</div>

			<div>
			<label for="txtapellidos">Apellidos:</label>
			<input type="text" required id="txtapellidos" value="" >	
			</div>


			<div>
			<label for="txtcargo">Cargo:</label>
			<input type="text" required id="txtcargo" value="" >	
			</div>

			<div>
			<label for="txtdireccion">Dirección:</label>
			<input type="text" required id="txtdireccion" value="" >	
			</div>

			<div>
			<label for="txtemail">Email:</label>
			<input type="text" required id="txtemail" value="" >	
			</div>

			<div>
			<label for="txttelefono">Telefono:</label>
			<input type="number" required id="txttelefono" value="" pattern=".{9,}" maxlength="9" >	
			</div>

			<div>
			<label for="txtdni">DNI:</label>
			<input type="text" required id="txtdni" value="" pattern=".{8,}" maxlength="8">	
			</div>

			<div>
			<label for="txtnroCarnet">Nro Carnet:</label>
			<input type="text" required id="txtnroCarne" value="" >	
			</div>
		

			<div>
			<label for="txtclave">Contraseña:</label>
			<input type="password" required id="txtclave" value="" >
			
			</div>		

			<div id= 'botones'>
				<button class="btn btn-success bi-save" type="button" onclick="DNuevoBi();"> Guardar</button>
				<button class="btn btn-danger bi-x-octagon" type="button" onclick="VistaBibliotecario();"> Cancelar</button>
			</div>
			

			</form>
		
			



</body>
</html>