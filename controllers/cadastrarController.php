<?php 

	class cadastrarController extends controller{

		public function index(){

			$status['status'] = 0;

			$this->loadTemplate('cadastrar', $status);

		}

		public function salvar(){
			$status['status'] = 0; //Variável de auxilio para exibir alerts no view cadastro

			//status 0 - Não exibe alert 
			//status 1 - alert Preencha os campos
			//status 2 - alert Usuário já existe
			//status 3 - alert Cadastrado com sucesso

			$user = new Usuarios();

			if (isset($_POST['nome']) && !empty($_POST['nome'])) {

				$nome = addslashes($_POST['nome']);
				$email = addslashes($_POST['email']);
				$telefone = addslashes($_POST['telefone']);
				$senha = $_POST['senha'];

				if (!empty($nome) && !empty($email) && !empty($senha)) {
					if ($user->cadastrar($nome, $email, $telefone, $senha)) {
						$status['status'] = 3;

						$this->loadTemplate('cadastrar', $status);
					} else {
						$status['status'] = 2;

						$this->loadTemplate('cadastrar', $status);
					}
				} else {
					$status['status'] = 1;

					$this->loadTemplate('cadastrar', $status);
				}
			} else {
				$status['status'] = 1;

				$this->loadTemplate('cadastrar', $status);
			}
		}
	}

 ?>