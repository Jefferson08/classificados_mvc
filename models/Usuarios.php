<?php 

	class Usuarios extends model{

		function cadastrar($nome, $email, $telefone, $senha){

			$sql = "SELECT * FROM usuarios WHERE email = :email";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":email", $email);
			$sql->execute();


			if ($sql->rowCount() == 0) {
				$sql = "INSERT INTO usuarios SET nome = :nome, email = :email, telefone = :telefone, senha = :senha";

				$sql = $this->db->prepare($sql);
				$sql->bindValue(":nome", $nome);
				$sql->bindValue(":email", $email);
				$sql->bindValue(":telefone", $telefone);
				$sql->bindValue(":senha", md5($senha));
				$sql->execute();

				return true;
			}else {
				return false;
			}
		}

		function login($email, $senha){
			

			$sql = "SELECT id, nome FROM usuarios WHERE email = :email AND senha = :senha";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dado = $sql->fetch();
				$_SESSION['cLogin'] = $dado['id'];
				$_SESSION['nome'] = $dado['nome'];
				return true;
			} else {
				return false;
			}
		}

		function getNome($id){
			

			$sql = "SELECT * FROM usuarios WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dados = $sql->fetch();

				return $dados['nome'];
			}
		}

		function getTotalUsuarios(){
			
			$sql = "SELECT COUNT(*) as total_usuarios FROM usuarios";
			$sql = $this->db->query($sql);

			$row = $sql->fetch();

			return $row['total_usuarios'];
		}
	}
 ?>