<?php
class Conexion {
	private $link;

	public function __construct()
	{
		$this->conectar('localhost','root','toor','meeser','3306');
	}

	public function conectar($host,$user,$pwd,$db,$port)
	{
		$this->link = mysqli_connect($host,$user,$pwd,$db,$port);
	}

	public function consulta($consulta)
	{
		return mysqli_query($this->link, $consulta);
	}

	public function desconectar()
	{
		mysqli_close($this->link);
	}

	public function getLink()
	{
		return $this->link;
	}
}
?>