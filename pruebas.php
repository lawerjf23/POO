<?php
require_once 'conexion.php';
require_once 'alumno.php';

if (isset($_POST['opcion'])) {
	switch ($_POST['opcion']) {
		case 'buscar':
			$alumno = Alumno::buscarPorMatricula($_POST['matricula']);
			if ($alumno->nombre == '') {
				echo '<p>Alumno no encontrado</p>';
			} else {
				echo '<p>Alumno '.$alumno->nombre.' encontrado.</p>';
			}
			break;
		case 'alta':
			$alumno = Alumno::buscarPorMatricula($_POST['matricula']);
			if ($alumno->nombre == '') {
				$alumno->nombre = $_POST['nombre'];
				$alumno->correo = $_POST['correo'];
				$rst = $alumno->alta();
				if ($rst) {
					// header('Location: pruebas.php');
					echo 'Alumno registrado correctamente';
				}
			} else {
				echo "<h1>Alumno $alumno->nombre ya registrado.</h1>";
			}
			break;
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
	<form action="#" method="post" name="busqueda">
		<input type="hidden" name="opcion" value="buscar">
		<input type="text" name="matricula" id="matricula">
		<button type="submit">Buscar alumno</button>
	</form>
	<hr>
	<!-- Formulario de alta -->
	<form action="#" method="post" name="alta">
		<input type="hidden" name="opcion" value="alta">
		<input type="text" name="matricula" id="matricula" placeholder="Matricula" required>
		<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
		<input type="email" name="correo" id="correo" placeholder="Correo Electronico" required>
		<button type="submit">Registrar alumno</button>
	</form>
</body>
</html>






