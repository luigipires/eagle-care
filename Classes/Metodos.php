<?php
	namespace Classes;

	use Classes\MySql;

	class Metodos{

		public static function redirecionar($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		public static function converterMoeda($valor){
			return number_format($valor, 2, ',', '.');
		}

		public static function mensagem($resposta,$mensagem){
			if($resposta == 'sucesso'){
				echo '<div class="sucesso-mensagem">
						<h3><i class="fas fa-check-circle"></i></h3>
						<h2>'.$mensagem.'</h2>
					</div><!-- sucesso-mensagem -->';
			}else if($resposta == 'erro'){
				echo '<div class="erro-mensagem">
						<h3><i class="fas fa-exclamation-triangle"></i></h3>
						<h2>'.$mensagem.'</h2>
					</div><!-- erro-mensagem -->';
			}
		}

		public static function validateImage($imagem){
			//mime-types das imagens
			$jpg = 'image/jpg';
			$jpeg = 'image/jpeg';
			$png = 'image/png';

			if($imagem['type'] == $jpg || $imagem['type'] == $png || $imagem['type'] == $jpeg){
				$tamanhoimagem = intval($imagem['size']/3056);

				if($tamanhoimagem < 700){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		public static function uploadImage($arquivo,$pasta,$nomePasta){
			$formatoarquivo = explode('.',$arquivo['name']);
			$arquivonome = uniqid().'.'.$formatoarquivo[count($formatoarquivo) - 1];

			$imagens = dirname(__FILE__).IMAGENS.$pasta.'/'.$nomePasta;

			if(file_exists($imagens)){
				$upload = dirname(__FILE__).IMAGENS.$pasta.'/'.$nomePasta.'/';
			}else{
				mkdir($imagens,0777,true);
				$upload = dirname(__FILE__).IMAGENS.$pasta.'/'.$nomePasta.'/';
			}

			if(move_uploaded_file($arquivo['tmp_name'],$upload.=$arquivonome)){
				return $arquivonome;
			}else{
				return false;
			}
		}

		public static function deleteFolder($folder){
			$folder = dirname(__FILE__).$folder;

			foreach (new \DirectoryIterator($folder) as $file){
		        if(!$file->isDot()){
		            if($file->isDir()){
		                recursiveDelete($file->getPathname());
		            }else{
		                unlink($file->getPathname());
		            }
		        }
		    }

			rmdir($folder); 
		}

		public static function deleteFile($folder,$image){
			$folder = dirname(__FILE__).IMAGENS.$folder;

			@unlink($folder.'/'.$image);

			$infoFolder = glob($folder.'/*',GLOB_BRACE);

			if(count($infoFolder) == 0){
				@rmdir($folder);
			}
		}

		public static function recoverField($post){
			if(isset($_POST[$post])){
				echo $_POST[$post];
			}
		}

		public static function logout(){
			// setcookie('lembrar-senha',true,time() - 1,'/');
			session_unset();
			session_destroy();
			self::redirecionar(CAMINHO);
		}

		public static function pathFolder(){
			return dirname(__FILE__);
		}
	}
?>

