<?php 
/*
Template name: Resultado da Roleta
*/
get_header(); 
?>
<main>
	<section>
		<div class="container mx-auto px-4 text-sm">

			<div class="flex">
				<div class="w-1/2 my-3">
					<h5>Total de Cadastros</h5>
					
					<?php 
					
					$wpdb->get_results( "SELECT *  FROM roleta_cadastros" );
					$quantidadeCadastros = $wpdb->num_rows;

					?>
					<p><strong><?php echo $quantidadeCadastros; ?> cadastros</strong> no sistema</p>
				</div>
				<div class="w-1/2 my-3">
					
					<h5>Quantidade de Premiados</h5>
					
					<?php 
					
					$wpdb->get_results( "SELECT *  FROM roleta_cadastros WHERE premio_id != 2 AND  premio_id != 6 AND  premio_id != 10" );
					$quantidadeCadastros = $wpdb->num_rows;

					?>
					<p><strong><?php echo $quantidadeCadastros; ?> premiados</strong> no sistema</p>
				</div>
			</div>
			<div class="w-full my-3">
				<h5>Relatório de Prêmios</h5>
				<?php 
				
				$listPremios = $wpdb->get_results( "SELECT *  FROM roleta_premios" );
				?>
				<table class="table">
					<thead>
						<tr>
						<th scope="col">ID</th>
						<th scope="col">Nome do Prêmio</th>
						<th scope="col">Prêmios Recebidos</th>
						<th scope="col">Quantidade Liberada</th>
						<th scope="col">Média cadastro/premio</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listPremios as $singlePremios){
							if ($singlePremios->is_premio == 0) { $variableTable = 'bg-dark'; }
							else if ($singlePremios->status == 1) { 
								if ($singlePremios->drawn == $singlePremios->quantity && $singlePremios->drawn > 0) {
									$variableTable = 'bg-primary';
								}
								else {
									$variableTable = 'bg-success';
								}
							 }
							else if ($singlePremios->status == 0) { $variableTable = 'bg-danger'; }
							else { $variableTable = ''; }
							?>
							<tr class="<?php echo $variableTable; ?>">
								<td>#<?php echo $singlePremios->id; ?></td>
								<td><?php echo $singlePremios->nome_normal; ?></td>
								<td><?php echo $singlePremios->drawn; ?></td>
								<td><?php echo $singlePremios->quantity; ?></td>
								<td><?php echo $singlePremios->media; ?></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			
			<div class="w-full my-3">
				<h5>Relatório de Premiados</h5>
				<?php 
				
				$listPremiados = $wpdb->get_results( "SELECT *  FROM roleta_cadastros WHERE premio_id != 2 AND  premio_id != 6 AND  premio_id != 10 ORDER BY data_hora ASC" );
				?>
				<table class="table">
					<thead>
						<tr>
						<th scope="col">Nome</th>
						<th scope="col">E-mail</th>
						<th scope="col">Loja</th>
						<th scope="col" width="90">Telefone</th>
						<th scope="col" width="90">CPF</th>
						<th scope="col" width="117">Prêmio</th>
						<th scope="col" width="106">Horário</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listPremiados as $singlePremiados){
								$listLojas = array(
									'post_type' => 'lojas',
									'posts_per_page' => 1,
									'p' =>  $singlePremiados->loja,
								);
								$wpLojas = new WP_Query($listLojas);
								if ($wpLojas->have_posts()) {
									while ($wpLojas->have_posts()) {
										$wpLojas->the_post();
										$categoryLojas = get_the_terms(get_the_ID(), 'lojas');
										$nomeLoja = $categoryLojas[0]->name . ' - ' . get_the_title() . ' - ' . get_the_content();
									}
								}

								$listPremios = $wpdb->get_results( "SELECT *  FROM roleta_premios WHERE id='{$singlePremiados->premio_id}'" );
								$quantity = $wpdb->num_rows;
								if ($quantity == 1) {
									foreach ($listPremios as $singlePremios) {
										$nomeDoPremio = $singlePremios->nome_normal;
									}
								}
								
							if ($singlePremiados->notification == 1) { $variableTable = 'bg-success'; }
							else { $variableTable = 'bg-danger'; }
							?>
							<tr class="<?php echo $variableTable; ?>">
								<td><?php echo $singlePremiados->nome; ?></td>
								<td><?php echo $singlePremiados->email; ?> <?php /* if ($singlePremiados->notification) { echo '<span class="badge badge-success">Notificado</span>'; } else { echo '<span class="badge badge-danger">Não Notificado</span>'; } */ ?></td>
								
								<td><a href="https://www.redeconomia.com.br/lojas/?loja=<?php echo $singlePremiados->loja; ?>"><?php echo $nomeLoja; ?></a></td>
								<td><?php echo $singlePremiados->telefone; ?></td>
								<td><?php echo $singlePremiados->cpf; ?></td>
								<td><?php echo $nomeDoPremio; ?> </td>
								<td><?php echo strftime("%d/%m/%Y %H:%M", strtotime($singlePremiados->data_hora)); ?></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</main>
<?php 
get_footer(); 
?>