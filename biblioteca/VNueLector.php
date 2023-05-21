<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_NueLector.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<script type="text/javascript">
		function GenerarCarnetLe(){

		var parametros = {};

        $.ajax({
            data:  parametros,
            url:   'NuevoCarnetLector.php',
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

	<div id="CModLe">
		
		<div id="formulario">
			<h1>Nuevo Estudiante</h1>
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
			<label for="txtdireccion">Dirección:</label>
			<input type="text" required id="txtdireccion" value="" >	
			</div>

			<div>
			<label for="txtemail">Email:</label>
			<input type="text" required id="txtemail" value="" >	
			</div>
			<div>
			<label for="txttelefono">Telefono:</label>
			<input type="number" required id="txttelefono" value="" pattern=".{9,}" maxlength="9" min="1" >	
			</div>

			<div>
			<label for="txtseccion">Seccion:</label>
			<input type="text" required id="txtseccion" value="" >	
			</div>

			<div>
			<label for="txtbachillerato">Bachillerato:</label>
			<select  class="select" required id="txtbachillerato" name="txtbachillerato">
			<option selected></option> 
                              <option>Primer año General</option>
                              <option>Segundo año General</option>
                              <option>Primer año  Contador</option>
                              <option>Segundo año Contador</option>
                              <option>Tecer año Contador</option>
			</select>	
			</div>
		
			<div>
			<label for="txtc">N_carnet:</label>
			<input type="text" required id="txtc" value="">    
			</div>		
		
			<div>
			<label for="txtclave">Contraseña:</label>
			<input type="password" required id="txtclave" value="" >
			
			</div>	

			

			<div id= 'botones'>
				<button class="btn btn-success bi-save" type="button" onclick="DNuevoLe();">Guardar</button>
				<button class="btn btn-danger bi-x-octagon" type="button" onclick="VistaLector();"> Cancelar</button>
			</div>		
			</form>
</body>
</html>