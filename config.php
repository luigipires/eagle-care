<?php
	session_start();

	date_default_timezone_set('America/Sao_Paulo');

	define('CAMINHO','http://localhost/eagle_care/');
	define('ASSETS',CAMINHO.'Classes/Views/assets/');
	define('IMAGENS','/Views/assets/imagens/');
	define('ARQUIVOS','/Views/assets/arquivos/');

	//==================================================================
	//conexão com banco de dados
	
	define('HOST','localhost');
	define('DATABASE','eagle_care');
	define('USER','root');
	define('PASSWORD','');
?>