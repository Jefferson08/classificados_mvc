<hr>
 <div class="container">
 	<h1>Novo Anúncio</h1>
 	<hr>

 	<?php 
 		if ($status == 1) {
 			?>
 				<div class="alert alert-danger">Preencha todos os campos!!!</div>
 			<?php
 		}
 	 ?>

 	<form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>anuncios/novoAnuncio/">
 		<div class="form-group">
 			<label for="categoria">Categoria:</label>
 			<select name="categoria" id="categoria" class="form-control">
 				<?php 

 					foreach($lista as $item): ?>

 					<option value="<?php echo $item['id']; ?>"><?php echo utf8_encode($item['nome']); ?></option>

 				<?php endforeach; ?>
 			</select>
 		</div>

 		<div class="form-group">
 			<label for="titulo">Título:</label>
 			<input type="text" name="titulo" id="titulo" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="valor">Valor:</label>
 			<input type="text" name="valor" id="valor" class="form-control">
 		</div>

 		<div class="form-group">
 			<label for="descricao">Descrição:</label>
 			<textarea class="form-control" name="descricao"></textarea>
 		</div>

 		<div class="form-group">
 			<label for="estado">Estado de conservação:</label>
 			<select name="estado" id="estado" class="form-control">
 				<option value="1">Ruim</option>
 				<option value="2">Bom</option>
 				<option value="3">Ótimo</option>
 			</select>
 		</div>

 		 <input type="submit" name="enviar" value="Adicionar anúncio" class="btn btn-success">

 	</form>
 </div>