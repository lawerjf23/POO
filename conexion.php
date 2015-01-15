<?php
class Conexion {
	// Atributos (Variable miembro: definidas dentro de la clase pero fuera de los metodos)
	private $host;
	private $user;
	private $pwd;
	private $db;
	private $port;
	private $link;

	// Metodos, eventos
	public function __construct()
	{
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pwd = 'toor';
		$this->db = 'udo';
		$this->port = '3306';
		$this->conectar();
	}

	public function __construct1($host,$user,$pwd,$db,$port='3306')
	{
		$this->host = $host;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->db = $db;
		$this->port = $port;
		$this->conectar();
	}

	public function conectar()
	{
		$this->link = mysqli_connect($this->host,$this->user,$this->pwd,$this->db,$this->port);
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