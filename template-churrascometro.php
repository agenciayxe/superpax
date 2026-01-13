<?php 
/*
Template Name: Churrascometro
*/
get_header(); 
?>
<main>
	<section>
		<div class="container mx-auto px-4 text-base">
			<?php
			$listagemTypes = array(
				array('title' => 'Carnes', 'slug' => 'carnes'),
				array('title' => 'Complementos', 'slug' => 'complementos'),
				array('title' => 'Acompanhamentos', 'slug' => 'acompanhamentos'),
				array('title' => 'Suprimentos', 'slug' => 'suprimentos'),
				array('title' => 'Bebidas', 'slug' => 'bebidas'),
			);
			$listagemParametros = array(
				'carnes' => array(
					array('title' => 'Carne Bovina', 'slug' => 'carne_bovina', 'adulto' => 200, 'crianca' => 100, 'medida' => 'g'),
					array('title' => 'Drumet', 'slug' => 'drumet', 'adulto' => 180, 'crianca' => 90, 'medida' => 'g'),
					array('title' => 'Linguiça', 'slug' => 'linguica', 'adulto' => 100, 'crianca' => 50, 'medida' => 'g'),
				),
				'complementos' => array(
					array('title' => 'Queijo Coalho', 'slug' => 'queijo_coalho', 'adulto' => 100, 'crianca' => 50, 'medida' => 'g'),
				),
				'acompanhamentos' => array(
					array('title' => 'Arroz', 'slug' => 'arroz', 'adulto' => 115, 'crianca' => 57.5, 'medida' => 'g'),
					array('title' => 'Vinagrete', 'slug' => 'vinagrete', 'adulto' => 35, 'crianca' => 17.5, 'medida' => 'g'),
					array('title' => 'Farofa', 'slug' => 'farofa', 'adulto' => 30, 'crianca' => 15, 'medida' => 'g'),
				),
				'suprimentos' => array(
					array('title' => 'Copo', 'slug' => 'copo', 'adulto' => 3, 'crianca' => 1.5, 'medida' => 'unid'),
					array('title' => 'Prato', 'slug' => 'prato', 'adulto' => 2, 'crianca' => 1, 'medida' => 'unid'),
					array('title' => 'Guardanapo', 'slug' => 'guardanapo', 'adulto' => 5, 'crianca' => 2.5, 'medida' => 'unid'),
					array('title' => 'Garfo', 'slug' => 'garfo', 'adulto' => 2, 'crianca' => 1, 'medida' => 'unid'),
					array('title' => 'Faca', 'slug' => 'faca', 'adulto' => 2, 'crianca' => 1, 'medida' => 'unid'),
					array('title' => 'Colher', 'slug' => 'colher', 'adulto' => 2, 'crianca' => 1, 'medida' => 'unid'),
					array('title' => 'Sal Grosso', 'slug' => 'sal_grosso', 'adulto' => 10, 'crianca' => 5, 'medida' => 'g'),
					array('title' => 'Carvão', 'slug' => 'carvao', 'adulto' => 360, 'crianca' => 180, 'medida' => 'g'),
				),
				'bebidas' => array(
					array('title' => 'Refrigerante', 'slug' => 'refrigerante', 'adulto' => 500, 'crianca' => 250, 'medida' => 'ml'),
					array('title' => 'Cerveja', 'slug' => 'cerveja', 'adulto' => 500, 'crianca' => 0, 'medida' => 'ml'),
					array('title' => 'Suco', 'slug' => 'suco', 'adulto' => 500, 'crianca' => 250, 'medida' => 'ml'),
				),
			);
			// if ((!$_COOKIE['dados'] && !$_POST) || ($_GET['action'] && $_GET['action'] == 'new')) {
			$verifyForm = (!$_POST) ? true : false;
			if ($verifyForm) {
				?>
					<form action="" class="form" method="post" id="calculadora" name="Calculadora do Churrasco">
						<div class="flex flex-wrap my-3">
							<div class="w-full">
							<h3 class="font-bold text-lg uppercase my-2">Quantas Pessoas?</h3>
							</div>
							<div class="w-1/2 px-2">
								<label for="form-field-homens" class="elementor-field-label">Adultos</label>
								<input type="number" name="adultos" id="form-field-adultos" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" value="0" min="0" max="">
							</div>
							<div class="w-1/2 px-2">
								<label for="form-field-criancas" class="elementor-field-label">Crianças de até 12 anos</label>
								<input type="number" name="criancas" id="form-field-criancas" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" value="0" min="0" max="">
							</div>
						</div>
						

						<div class="flex flex-wrap my-3">
							<div class="w-1/2 px-2">
								<div class="flex flex-wrap my-3">
									<div class="w-full">
										<h3 class="font-bold text-lg uppercase my-2">Quais carnes?</h3>
									</div>
									<div class="w-full">
										<div class="elementor-field-subgroup">
											<?php 
											foreach ($listagemParametros['carnes'] as $singleCarne) {
												?>
												<div>
													<input type="checkbox" value="<?php echo $singleCarne['slug']; ?>" id="<?php echo $singleCarne['slug']; ?>" name="carnes[]">
													<label for="<?php echo $singleCarne['slug']; ?>">
														<?php echo $singleCarne['title']; ?>
													</label>
												</div>
												<?php 
											}
											?>
										</div>
									</div>
								</div>
								<div class="flex flex-wrap my-3">
									<div class="w-full">
										<h3 class="font-bold text-lg uppercase my-2">Complementos</h3>
									</div>
									<div class="w-full">
										<div class="elementor-field-subgroup">
											<?php 
											foreach ($listagemParametros['complementos'] as $singleComplemento) {
												?>
												<div>
													<input type="checkbox" value="<?php echo $singleComplemento['slug']; ?>" id="<?php echo $singleComplemento['slug']; ?>" name="complementos[]">
													<label for="<?php echo $singleComplemento['slug']; ?>">
														<?php echo $singleComplemento['title']; ?>
													</label>
												</div>
												<?php 
											}
											?>
										</div>
									</div>
								</div>
								<div class="flex flex-wrap my-3">
									<div class="w-full">
										<h3 class="font-bold text-lg uppercase my-2">Acompanhamentos</h3>
									</div>
									<div class="w-full">
										<div class="elementor-field-subgroup">
											<?php 
											foreach ($listagemParametros['acompanhamentos'] as $singleComplemento) {
												?>
												<div>
													<input type="checkbox" value="<?php echo $singleComplemento['slug']; ?>" id="<?php echo $singleComplemento['slug']; ?>" name="acompanhamentos[]">
													<label for="<?php echo $singleComplemento['slug']; ?>">
														<?php echo $singleComplemento['title']; ?>
													</label>
												</div>
												<?php 
											}
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="w-1/2 px-2">
								<div class="flex flex-wrap my-3">
									<div class="w-full">
										<h3 class="font-bold text-lg uppercase my-2">Suprimentos</h3>
									</div>
									<div class="w-full">
										<div>
											<?php 
											foreach ($listagemParametros['suprimentos'] as $singleSuprimento) {
												?>
												<div>
													<input type="checkbox" value="<?php echo $singleSuprimento['slug']; ?>" id="<?php echo $singleSuprimento['slug']; ?>" name="suprimentos[]">
													<label for="<?php echo $singleSuprimento['slug']; ?>">
														<?php echo $singleSuprimento['title']; ?>
													</label>
												</div>
												<?php 
											}
											?>
										</div>
									</div>
								</div>
								<div class="flex flex-wrap my-3">
									<div class="w-full">
										<h3 class="font-bold text-lg uppercase my-2">Bebidas</h3>
									</div>
									<div class="w-full">
										<div>
											<?php 
											foreach ($listagemParametros['bebidas'] as $singleBebida) {
												?>
												<div>
													<input type="checkbox" value="<?php echo $singleBebida['slug']; ?>" id="<?php echo $singleBebida['slug']; ?>" name="bebidas[]">
													<label for="<?php echo $singleBebida['slug']; ?>">
														<?php echo $singleBebida['title']; ?>
													</label>
												</div>
												<?php 
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="flex flex-wrap my-3">
							<div class="w-full">
								<button type="submit" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase" id="bt-sumit-calculo">
									<span>
										<span class=" elementor-button-icon">
											<i class="fa fa-calculator" aria-hidden="true"></i>
										</span>
										<span class="elementor-button-text">
											Calcular meu churrasco
										</span>
									</span>
								</button>
							</div>
						</div>
					</form>
				<?php
			}
			else {
				$dados = (isset($_POST)) ? $_POST : $_COOKIE['dados'];
				?>
				<h3 class="font-bold text-lg uppercase my-2">Resultado do Churrascometro</h3>
				<table class="table table-bordered">
					<tbody>
						<?php
							foreach ($listagemTypes as $singleType ) {
								$slugType = $singleType['slug'];
								if (!empty($dados[$slugType])) {
									?>
									<tr>
										<th><?php echo $singleType['title']; ?></th>
										<th>Quantidade</th>
									</tr>
									<?php
									foreach ($listagemParametros[$slugType] as $singleParametro) {
										$slugParametro = $singleParametro['slug'];
										if (in_array($slugParametro, $dados[$slugType])) {
											$adultoCalc = (isset($dados['adultos']) && $dados['adultos'] != 0) ? ($dados['adultos'] * $singleParametro['adulto']) : 0;
											$criancaCalc = (isset($dados['crianca']) && $dados['crianca'] != 0) ? ($dados['crianca'] * $singleParametro['crianca']) : 0;
											$finalCalc = $adultoCalc + $criancaCalc;
											?>
											<tr>
												<td><?php echo $singleParametro['title']; ?></td>
												<td><?php echo $finalCalc; ?> <?php echo $singleParametro['medida']; ?></td>
											</tr>
											<?php
										}
									}
								}
							}
						?>
					</tbody>
				</table>
				
				<div class="w-full">
					<a href="?action=new">
						<button type="submit" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase" id="bt-sumit-calculo">
							<span>
								<span class=" elementor-button-icon">
									<i class="fa fa-calculator" aria-hidden="true"></i>
								</span>
								<span class="elementor-button-text">
									Fazer Novo Calculo
								</span>
							</span>
						</button>
					</a>
				</div>
				<?php 
			}
			?>				
		</div>
	</section>
</main>
<?php get_footer(); ?>