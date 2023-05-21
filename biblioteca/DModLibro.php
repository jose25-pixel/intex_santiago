<?php
include('../dbconexion.php');


$dcod = $_POST["txtcod"];
$dtitulo = $_POST['txttitulo'];
$dcodigo = $_POST['txtcodigo'];





$dautor = $_POST['cboautor'];
$dgenero = $_POST['cbogenero'];
$deditorial = $_POST['cboeditorial'];
$dubicacion = $_POST['txtubicacion'];
$dano_edicion = $_POST['txtano_edicion'];
$dpaginas = $_POST['txtpaginas'];
$dejemplar = $_POST['txtejemplar'];
$ddescripcion = $_POST['txtdescripcion'];


$sql = "SELECT * FROM detalle_prestamo WHERE CodLibro = '$dcod' and CodEstado = 1";
$resultado = $cnmysql->query($sql);
$cantidad = mysqli_num_rows($resultado);
	
if ($dejemplar < $cantidad) {
	echo "<p
	style='	background-color: #EE9393;
			padding: 10px;
			box-sizing: border-box;
			color: #E33E3E;
			border:2px dotted #E33E3E;'
	><strong>Error!</strong> No puede ingresar menor número de ejemplares, porque el número de prestados execede a este.</p>";
	exit();
}




$nombreArchivo = $_FILES['picimagen']['name'];
$rutaArchivoTemporal = $_FILES['picimagen']['tmp_name'];

// Ruta de destino para guardar la imagen
$directorioDestino = "imagenes_libros/";

// Verificar si se cargó una nueva imagen
if (!empty($nombreArchivo) && !empty($rutaArchivoTemporal)) {
	// Mover el archivo al directorio de destino
	$rutaArchivoDestino = $directorioDestino . $nombreArchivo;
	move_uploaded_file($rutaArchivoTemporal, $rutaArchivoDestino);
	
	// Actualizar la ruta de la imagen en la base de datos
	$rutaArchivoBD = $directorioDestino . $nombreArchivo;


	$query = "
	UPDATE libros
	SET 
	Titulo = '$dtitulo',
	Codigo = '$dcodigo',
	Portada = '$rutaArchivoBD',
	CodAutor = '$dautor',
	CodGenero = '$dgenero',
	CodEditorial = '$deditorial',
	Ubicacion = '$dubicacion',
	ano_edicion ='$dano_edicion',
	Paginas = '$dpaginas',
	Ejemplar = '$dejemplar',
	Descripcion  = '$ddescripcion '
	WHERE 
	CodLibro = '$dcod'
   ";

        $resultado = $cnmysql->query($query);

	if (!$resultado) {
		echo "Error al actualizar la imagen en la base de datos";
		exit();
	}
}
else{
	$query = "
	 UPDATE libros
	 SET 
	 Titulo = '$dtitulo',
	 Codigo = '$dcodigo',
	 CodAutor = '$dautor',
	 CodGenero = '$dgenero',
	 CodEditorial = '$deditorial',
	 Ubicacion = '$dubicacion',
	 ano_edicion ='$dano_edicion',
	 Paginas = '$dpaginas',
	 Ejemplar = '$dejemplar',
	 Descripcion = '$ddescripcion'
	 WHERE 
	 CodLibro = '$dcod'
	";


}



$resultado = $cnmysql->query($query);



if ($resultado) {


	$nuevaCantidad = $dejemplar - $cantidad;

	$consult = "UPDATE stocklibros SET Descripcion = '$nuevaCantidad' WHERE CodLibro = '$dcod'";

	$result = $cnmysql->query($consult);


	
	include('Vlibro.php');
}else{
		echo "Error al Modificar";

}
?>