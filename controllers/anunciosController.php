
<?php 
	class anunciosController extends controller{

		public function index($status = array()){ //Action principal
			//extract($status);

			$dados = array();

			$a = new Anuncios();

			if (empty($_SESSION['cLogin'])) {
				header("Location: ".BASE_URL);
				exit;
			}

			$anuncios = $a->getMeusAnuncios();

			$dados['anuncios'] = $anuncios;
			$dados['status'] = $status;

			$this->loadTemplate('anuncios', $dados);

			
		}

		public function novoAnuncio(){ 

			$dados = array();

			$cat = new Categorias();
 			$lista = $cat->getCategorias();

 			$status = 0;

			//status vazio - alert Preencha os campos!!
			//status 1 - alert Preencha os campos!!
			//status 2 - alert Anúncio adicionado com sucesso!!

			
			if (isset($_POST['titulo'])) {

				if (!empty($_POST['titulo']) && !empty($_POST['valor']) && !empty($_POST['descricao'])) { //Se título,valor e descrição estiverem preenchidos
					$a = new Anuncios();

					$titulo = addslashes($_POST['titulo']);
					$categoria = addslashes($_POST['categoria']);
					$valor = addslashes($_POST['valor']);
					$descricao = addslashes($_POST['descricao']);
					$estado = addslashes($_POST['estado']);

					$a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);

					$status = 2; //Status recebe 2 para exibir alerta de sucesso na view 'anuncios'

					$dados['status'] = $status;

					call_user_func_array(array($this, 'index'), $dados); 
					
					exit;

				} else { // status recebe 1 e carrega a view novamente para exibir o alert preencha os campos

					$status = 1;
					$dados['lista'] = $lista;
		 			$dados['status'] = $status;

					$this->loadTemplate('novo_anuncio', $dados);
					exit;

				}

			} 
			
			$dados['lista'] = $lista;
 			$dados['status'] = $status;

			$this->loadTemplate('novo_anuncio', $dados);

		}

		public function editar($id = array()){

			$dados = array();

			$a = new Anuncios();

			$cat = new Categorias();
 			$lista = $cat->getCategorias();

 			$status = 0;

 			//status 4 - alert Anúncio editado com sucesso

			
 			if (isset($id) && !empty($id)) {

 				$info = $a->getAnuncio($id);
 					
 				if (isset($_POST['titulo'])) {
					if (!empty($_POST['titulo']) && !empty($_POST['valor']) && !empty($_POST['descricao'])) {

						$titulo = addslashes($_POST['titulo']);
						$categoria = addslashes($_POST['categoria']);
						$valor = addslashes($_POST['valor']);
						$descricao = addslashes($_POST['descricao']);
						$estado = addslashes($_POST['estado']);

						if (isset($_FILES['fotos'])) {
							$fotos = $_FILES['fotos'];
						} else {
							$fotos = array();
						}

						$a->editarAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id);

						$status = 4;

						$dados['status'] = 4;

						call_user_func_array(array($this, 'index'), $dados); 
						exit;
						
					} else{

						$status = 1;

						$dados['lista'] = $lista;
			 			$dados['status'] = $status;
			 			$dados['info'] = $info;

						$this->loadTemplate('editar_anuncio', $dados);
						exit;
					}
				}	


				$dados['lista'] = $lista;
				$dados['status'] = $status;
				$dados['info'] = $info;

				$this->loadTemplate('editar_anuncio', $dados);

 			} else {

 				call_user_func_array(array($this, 'index'), $dados); 

 			}
		}

		public function excluirAnuncio($id){

			//Depois verificar se o anuncio existe,  se o usuario está logado e se o anuncio pertence a ele mesmo

			//status 3 - Anúncio excluido com sucesso!!

			$a = new Anuncios();
			$dados = array();
			$anuncios = $a->getMeusAnuncios();
			

			if (isset($id) && !empty($id)) {

				$a->excluirAnuncio($id);

				$status = 3; 

				print_r($dados);

				call_user_func_array(array($this, 'index'), $dados); 

			} else {

				call_user_func_array(array($this, 'index'), $dados); 

			}
			

		}

		public function excluirFoto($id = array()){

			$a = new Anuncios();

 			if (isset($id) && !empty($id)) {
 				
 				$id_anuncio = $a->excluirFoto($id);

 				header('Location: '.BASE_URL.'anuncios/editar/'.$id_anuncio);

 			} else {

 				header('Location: '.BASE_URL.'anuncios/editar/'.$id_anuncio);
 			}

		}

	}
 ?>