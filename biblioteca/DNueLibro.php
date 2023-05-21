<?php
include('../dbconexion.php');
$dtitulo = $_POST['txttitulo'];
$dcodigo = $_POST['txtcodigo'];

//$dimagen = addslashes(file_get_contents($_FILES['picimagen']['tmp_name']));
$nombreArchivo = $_FILES['picimagen']['name'];
$rutaArchivoTemporal = $_FILES['picimagen']['tmp_name'];

// Ruta de destino para guardar la imagen
$directorioDestino = "imagenes_libros/";

// Mover el archivo al directorio de destino
$rutaArchivoDestino = $directorioDestino . $nombreArchivo;
move_uploaded_file($rutaArchivoTemporal, $rutaArchivoDestino);

$dautor = $_POST['cboautor'];
$dgenero = $_POST['cbogenero'];
$deditorial = $_POST['cboeditorial'];
$dubicacion = $_POST['txtubicacion'];
$ano_edicion = $_POST['txtano_edicion'];
$dpaginas = $_POST['txtpaginas'];
$dejemplar = $_POST['txtejemplar']; 
$ddescripcion= $_POST['txtdescripcion']; 
$rutaArchivoBD = $directorioDestino . $nombreArchivo;


if (!empty($dtitulo) && !empty($dcodigo ) && !empty($rutaArchivoBD) && !empty($dautor)	&& !empty($dgenero)
 && $deditorial != '0'  && !empty($dubicacion) && !empty($ano_edicion) && !empty($dpaginas)  && !empty($dejemplar) && !empty($ddescripcion)
	) 
{
	$query = "  
	INSERT INTO libros(
	Titulo,
	Codigo, 
	Portada,
	CodAutor,
	CodGenero,
	CodEditorial,
	Ubicacion,
	ano_edicion,
	Paginas,
	Ejemplar,
	Descripcion)
	VALUES(
	'$dtitulo',
	'$dcodigo ',
	'$rutaArchivoBD',
	'$dautor',
	'$dgenero',
	'$deditorial',
	'$dubicacion',
	'$ano_edicion',
	'$dpaginas', 
	'$dejemplar',
	'$ddescripcion')
	";
	$resultado = $cnmysql->query($query);
	if ($resultado) {

		
		include('Vlibro.php');	
	}else{
		echo "<h1 style='color:#fff;'>Error al Agregar Libro</h1>";
	}

}else{
	echo "<h1 style='color:#fff;'>Rellene todos los datos porfavor</h1>";
}

?>