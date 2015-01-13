<?php
require_once 'conexion.php';

class Alumno extends Conexion {
	private $matricula;
	private $nombre;
	private $correo;

	public buscarPorMatricula($matricula)
	{
		parent::__construct();
		$query = sprintf("select * from alumno where matricula='%s'",$matricula);
		$rst = mysqli_query($this->getLink(),$query);
		$this->desconectar();
		return $rst;
	}
}
?>