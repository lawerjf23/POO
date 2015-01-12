<?php
// DB: io
$host = 'localhost';
$user = 'root';
$pwd = 'toor';
$db = 'io';
$port = '3306';



function conectarBase($host,$user,$pwd,$db,$port='3306')
{
	$link = mysqli_connect($host,$user,$pwd,$db,$port);
	return $link;
}

function desconectarBase($link)
{
	mysqli_close($link);
}

function consultaBase($link,$query)
{
	$rst = mysqli_query($link,$query);
	return $rst;
}

$link = conectarBase('localhost','root','toor','io');
$query = sprintf("select * from areas");
$rst = consultaBase($link,$query);
desconectarBase($link);

var_dump($rst);



?>