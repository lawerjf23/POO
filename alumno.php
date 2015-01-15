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
		if (mysqli_num_rows($rst)>0) {
			while ($row = mysqli_fetch_assoc($rst)) {
				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->correo = $row['correo'];
				return $alumno;
			}
		} else {
			return false;
		}
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
}
?>




