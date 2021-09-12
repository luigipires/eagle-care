<?php
	namespace Classes\Controllers;

	use Classes\Views\puxarViews;
	use Classes\Metodos;
	use Classes\MySql;
	
	use Classes\Models\UsersModel;
	use Classes\Models\PostagensModel;

	class HomeController{

		//nome da pastas
		private static $usuarios = 'usuarios';
		private static $postagens = 'postagens';

		public function index(){
			if(!isset($_SESSION['login'])){
				puxarViews::renderizar('inicio/home');
			}

			$data = PostagensModel::dataFriends();

			self::deslogar();
			self::deletarPostagem();
			self::deletarImagem();

			puxarViews::renderizarPainel('painel/home',$data);
		}

		//desloga da conta
		private static function deslogar(){
			if(isset($_GET['sair'])){
				Metodos::logout();
			}
		}

		//exclui postagem
		private static function deletarPostagem(){
			if(isset($_GET['excluir-postagem'])){
				$id = (int)$_GET['excluir-postagem'];

				$dados = PostagensModel::getDataPost($id);

				if($dados['nome_pasta'] != ''){
					//verificação de arquivos cadastrados
					$imagensPost = PostagensModel::issetImage($id);
					$arquivosPost = PostagensModel::issetArchive($id);

					//caminho para deletar pasta
					$pastaImagens = IMAGENS.'postagens/'.$dados['nome_pasta'];
					$pastaArquivos = ARQUIVOS.'postagens/'.$dados['nome_pasta'];

					if($imagensPost == true){
						if($arquivosPost == true){
							//deleta arquivos e pasta da postagem
							Metodos::deleteFolder($pastaImagens);
							Metodos::deleteFolder($pastaArquivos);

							PostagensModel::deleteImage('postagem_id',$id);
							PostagensModel::deleteArchive('postagem_id',$id);
							PostagensModel::deletePost($id);
						}else{
							//deleta arquivos e pasta da postagem
							Metodos::deleteFolder($pastaImagens);

							PostagensModel::deleteImage('postagem_id',$id);
							PostagensModel::deletePost($id);
						}
					}else if($arquivosPost == true){
						//deleta arquivos e pasta da postagem
						Metodos::deleteFolder($pastaArquivos);

						PostagensModel::deleteArchive('postagem_id',$id);
						PostagensModel::deletePost($id);
					}
				}else{
					PostagensModel::deletePost($id);
				}
			}
		}

		//exclui imagem
		private static function deletarImagem(){
			if(isset($_GET['excluir-imagem'])){
				$id = (int)$_GET['excluir-imagem'];

				$imagensPost = PostagensModel::getDataImage('id',$id);
				$dados = PostagensModel::getDataPost($imagensPost['postagem_id']);

				$pasta = self::$postagens.'/'.$dados['nome_pasta'];

				//deleta a imagem
				Metodos::deleteFile($pasta,$imagensPost['nome_imagem']);

				//exclui imagem da tabela
				PostagensModel::deleteImage('id',$id);

				//atualiza banco de dados para definir que a pasta não existe mais caso não tenha mais imagens
				$verifyFolder = glob(Metodos::pathFolder().IMAGENS.$pasta.'/*',GLOB_BRACE);

				if(count($verifyFolder) == 0){
					$sql = MySql::conexaobd()->prepare("UPDATE `postagens` SET nome_pasta = ? WHERE id = ?");
					$sql->execute(array('',$imagensPost['postagem_id']));
				}
			}
		}
	}
?>