
<hr>

<div class="container">
	<h1>Meus Anúncios</h1>
	<hr> 

	<?php 
		if ($status == 2) {
			?>
				<div class="alert alert-success">Anúncio adicionado com sucesso!!!</div>
			<?php
			
		} elseif($status == 3){
			?>
				<div class="alert alert-success">Anúncio excluído com sucesso!!!</div>
			<?php
		} else if($status == 4){
			?>
				<div class="alert alert-success">Anúncio editado com sucesso!!!</div>
			<?php
		}
	 ?>

	<table class="table table-bordered text-center bg-light">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Título</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		
		<?php 

			
			foreach ($anuncios as $item): ?>
				<tr>
					<td>
						<?php if(!empty($item['url'])): ?>
							<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $item['url']; ?>" width="50" height="50">
						<?php else: ?>
							<img src="<?php echo BASE_URL; ?>assets/images/anuncios/default-image.png" width="50" height = "50">
						<?php endif; ?>
					</td>
					<td class="align-middle"><?php echo $item ['titulo']; ?></td>
					<td class="align-middle">R$ <?php echo number_format($item['valor'], 2); ?></td>
					<td class="align-middle">
						<a href="<?php echo BASE_URL; ?>anuncios/editar/<?php echo($item['id']); ?>"><button class="btn btn-primary">Editar</button></a>
						<a href="<?php echo BASE_URL; ?>anuncios/excluirAnuncio/<?php echo($item['id']); ?>"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
			<?php
			endforeach;
			
		 ?>
	</table>

	<a href="<?php echo BASE_URL; ?>anuncios/novoAnuncio/"><button class="btn btn-secondary">Novo Anúncio</button></a>

	<hr>
</div>