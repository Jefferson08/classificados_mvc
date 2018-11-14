<?php 
	

	class produtoController extends controller{

		public function index(){
			header("Location: ".BASE_URL);
		}

		public function abrir($id){

			$dados = array();

			$a = new Anuncios();

			if (empty($id)) {
				header("Location: ".BASE_URL);
			} else {

				$info = $a->getAnuncio($id);

				if (!empty($info)) { //Verifica se info está vazio (Ou seja,se tem anuncio com aquele id)

					$dados['info'] = $info;
					
					$this->loadTemplate('produto', $dados);

				} else {
					header("Location: ".BASE_URL);
				}


			}

		}
	}
 ?>