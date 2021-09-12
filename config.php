<?php
	session_start();

	date_default_timezone_set('America/Sao_Paulo');

	define('PATH','http://localhost/eagle_care/');
	define('ASSETS',PATH.'Classes/Views/paginas/assets/');
	define('IMAGENS','/Views/paginas/assets/imagens/');
	define('ARQUIVOS','/Views/paginas/assets/arquivos/');

	//==================================================================
	//conexão com banco de dados
	
	define('HOST','localhost');
	define('DATABASE','eagle_care');
	define('USER','root');
	define('PASSWORD','');

	//==================================================================
	//includes

	include('Classes/MySql.php');
	include('Classes/Metodos.php');
	include('Classes/Models/UsersModel.php');
	include('Classes/Bcrypt.php');
?>