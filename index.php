<?php
require_once 'xajax/xajax.inc.php';

$xajax = new xajax();

$xajax->setCharEncoding('UTF8');

function name() {}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pruebas XAJAX</title>
</head>
<body>
	<h1>Pruebas XAJAX</h1>
	<button id="reporte">Mostrar reporte</button>
	<section id="contenido">
	<?php
	if(isset($_GET['opcion'])) {
		switch($_GET['opcion']) {
			case 'uno':
				echo '<iframe src="uno.php" frameborder="0" width="980"></iframe>';
				break;
			case 'dos':
				echo '<iframe src="dos.php" frameborder="0"></iframe>';
				break;
		}
	} else {
		// contenido del form login
	}
	?>
	</section>
</body>
</html>