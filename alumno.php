<?php

class Alumno {
	private $campo = array(
		'matricula' => '',
		'nombre' => '',
		'correo' => ''
	);

	public static function buscarPorMatricula($matricula)
	{
		$cnn = new Conexion();
		$alumno = new Alumno();
		$query = sprintf("select * from alumno where matricula='%s'",$matricula);
		$rst = mysqli_query($cnn->getLink(),$query);
		$cnn->desconectar();
		$alumno->matricula = $matricula;
		if (mysqli_num_rows($rst)>0) {
			while ($row = mysqli_fetch_assoc($rst)) {
				$alumno->nombre = $row['nombre'];
				$alumno->correo = $row['correo'];
			}
		}
		return $alumno;
	}

// GETTERS con metodo magico __get()
	public function __get($variable) {
		if (array_key_exists($variable, $this->campo)) {
			return $this->campo[$variable];
		}
	}
// SETTERS con metodo magico __set()
	public function __set($variable, $valor) {
		if (array_key_exists($variable, $this->campo)) {
			$this->campo[$variable] = $valor;
		}
	}

	public function alta()
	{
		$cnn = new Conexion();
		$query = sprintf("INSERT INTO alumno (matricula, nombre, correo) values ('%s','%s','%s')",$this->matricula,$this->nombre,$this->correo);
		$rst = mysqli_query($cnn->getLink(), $query);
		$cnn->desconectar();
		return $rst;
	}

	public static function listar()
	{
		$cnn = new Conexion();
		$query = sprintf("SELECT * FROM alumno");
		$rst = mysqli_query($cnn->getLink(), $query);
		$cnn->desconectar();
		if (!$rst) {
			echo "<h1>Error en la consulta</h1>";
		} elseif (mysqli_num_rows($rst)>0) {
			echo '<table>';
			echo '<tr><th>MATRICULA</th><th>NOMBRE</th><th>CORREO</th></tr>';
			while ($row = mysqli_fetch_assoc($rst)) {
				echo '<tr>';
				echo '<td>'.$row['matricula'].'</td>';
				echo '<td>'.$row['nombre'].'</td>';
				echo '<td>'.$row['correo'].'</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
	}
}
?>











