
<div class="container-fluid">
	<div class="jumbotron">
		<h2>Nós temos hoje <?php echo $totAnuncios['tot_anuncios_filtro']; ?> anúncios</h2>
		<p>E mais de <?php echo $totUsuarios - 1; ?> usuários cadastrados!!! </p>
	</div>

	<div class="row">
		<div class="col-sm-3">
			<h4>Pesquisa avançada</h4>
			<hr>

			<form method="GET">
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select id="categoria" name="filtros[categoria]" class="form-control">
						<option></option>
						
						<?php foreach ($categorias as $categoria): ?>
							<option value="<?php echo utf8_encode($categoria['id']); ?>" <?php echo ($categoria['id'] == $filtros['categoria'])?'selected=selected':''; ?>><?php echo utf8_encode($categoria['nome']); ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label for="preco">Preço:</label>
					<select id="preco" name="filtros[preco]" class="form-control">
						<option></option>
						<option value="0-50" <?php echo ($filtros['preco'] == "0-50")?'selected=selected':''; ?>>0-50</option>
						<option value="51-100" <?php echo ($filtros['preco'] == "51-100")?'selected=selected':''; ?>>51-100</option>
						<option value="101-200" <?php echo ($filtros['preco'] == "101-200")?'selected=selected':''; ?>>101-200</option>
						<option value="201-300" <?php echo ($filtros['preco'] == "201-300")?'selected=selected':''; ?>>201-300</option>
						<option value="301-400" <?php echo ($filtros['preco'] == "301-400")?'selected=selected':''; ?>>301-400</option>
						<option value="401-500" <?php echo ($filtros['preco'] == "401-500")?'selected=selected':''; ?>>401-500</option>
					</select>
				</div>

				<div class="form-group">
					<label for="estado">Estado de conservação:</label>
					<select id="estado" name="filtros[estado]" class="form-control">
						<option></option>
						<option value="1" <?php echo ($filtros['estado'] == "1")?'selected=selected':''; ?>>Ruim</option>
						<option value="2" <?php echo ($filtros['estado'] == "2")?'selected=selected':''; ?>>Bom</option>
						<option value="3" <?php echo ($filtros['estado'] == "3")?'selected=selected':''; ?>>Ótimo</option>
					</select>
				</div>

				<input type="submit" value="Filtrar" class="btn btn-primary">

			</form>
		</div>
		<div class="col-sm-9">
			<h4>Últimos Anuncios:</h4>
			<hr>

			<table class="table table-striped table-hover table-bordered text-center">
				<tbody>
					<?php foreach($anuncios as $anuncio): ?>
						<tr>
							<td>
								<?php if(!empty($anuncio['url'])): ?>
									<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['url']; ?>" width="50" height="50">
								<?php else: ?>
									<img src="<?php echo BASE_URL; ?>assets/images/anuncios/default-image.png" width="50" height = "50">
								<?php endif; ?>
							</td>

							<td>
								<a href="<?php echo BASE_URL; ?>produto/abrir/<?php echo $anuncio['id'] ?>"><?php echo $anuncio['titulo']; ?></a><br>
								<?php echo utf8_encode($anuncio['categoria']); ?>
							</td>

							<td class="align-middle">
								R$ <?php echo number_format($anuncio['valor'], 2) ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<ul class="pagination">
				<li class="page-item">
					<a href="index.php?page=<?php echo($pag_atual - 1); ?>" class="page-link" aria-label="Previous">
						 <span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<?php for ($i=1; $i <= $tot_paginas ; $i++): ?>
					<li class="<?php echo ($pag_atual == $i)?'page-item active':'page-item'; ?>"><a href="<?php echo BASE_URL; ?>?<?php 
						$filtros = $_GET;
						$filtros['page'] = $i;
						echo http_build_query($filtros);
					; ?>" class="page-link"><?php echo $i; ?></a></li>
				<?php endfor; ?>
				<li class="page-item">
					<a href="index.php?page=<?php echo($pag_atual + 1); ?>" class="page-link" aria-label="Next">
						 <span aria-hidden="true">&raquo;</span>
					</a>
				</li>

			</ul>

		</div>
	</div>
</div>