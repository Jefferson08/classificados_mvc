<div class="container">
	<hr>
	<h1>Cadastre-se </h1>
	<hr>

	<?php 

		if ($status == 0) {
			
		} else if($status == 1){
			?>
				<div class="alert alert-warning">Preencha os campos!!!</div>
			<?php
		} else if($status == 2){
			?>
				<div class="alert alert-danger">Esse usuário já existe!!!</div>
			<?php
		} elseif ($status == 3) {
			?>
				<div class="alert alert-success">Cadastrado com sucesso!!!</div>
			<?php
		}
		
	 ?>

	<form method="POST" action="<?php echo BASE_URL; ?>cadastrar/salvar/">

		<div class="form-group">
			<label for="nome">Nome: *</label>
			<input type="text" name="nome" id="nome" class="form-control">
		</div>

		<div class="form-group">
			<label for="email">Email: *</label>
			<input type="text" name="email" id="email" class="form-control">
		</div>

		<div class="form-group">
			<label for="telefone">Telefone: </label>
			<input type="text" name="telefone" id="telefone" class="form-control">
		</div>

		<div class="form-group">
			<label for="senha">Senha: *</label>
			<input type="password" name="senha" id="senha" class="form-control">
		</div>

		<h4>(*) campos obrigatórios</h4><br>

		<input type="submit" value="Cadastrar" class="btn btn-success">
	</form>

	<hr>

</div>