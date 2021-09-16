<?php
	namespace Classes\Views;

	class puxarViews{

		private static $header = 'paginas/template/header.php';
		private static $headerPainel = 'paginas/template/headerPainel.php';
		private static $login = 'paginas/template/login.php';
		private static $footer = 'paginas/template/footer.php';
		private static $footerPainel = 'paginas/template/footerPainel.php';
		private static $modal = 'paginas/template/engine/modal.php';

		public static function renderizar($caminhoPagina,$data = null,$anotherData = null){
			$header = self::$header;
			$login = self::$login;
			$footer = self::$footer;
			$modal = self::$modal;

			include($header);
			include($login);
			include($modal);
			include('paginas/'.$caminhoPagina.'.php');
			include($footer);
			die();
		}

		public static function renderizarErro($pagina){
			$header = self::$header;
			$login = self::$login;
			$footer = self::$footer;

			include($header);
			include($login);
			include('paginas/erro/'.$pagina.'.php');
			include($footer);
			die();
		}
	}
?>