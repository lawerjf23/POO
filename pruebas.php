<?php
require_once 'conexion.php';
require_once 'alumno.php';

if (isset($_POST['opcion']) && $_POST['opcion'] == 'buscar') {
	$alumno = Alumno::buscarPorMatricula($_POST['matricula']);
	if (!$alumno) {
		echo '<p>Alumno no encontrado</p>';
	} else {
		echo '<p>Alumno '.$alumno->nombre.' encontrado.</p>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pruebas PHP</title>
</head>
<body>
	<form action="#" method="post">
		<input type="hidden" name="opcion" value="buscar">
		<input type="text" name="matricula" id="matricula">
		<button type="submit">Buscar alumno</button>
	</form>
</body>
</html>






