<style>
	canvas { background-image: url('<?php echo get_bloginfo('template_url'); ?>/futebol/background-futebol.jpg'); background-size: cover; background-position: center; border-radius: 15px; }
	button { background-color: #0f5faa; border: none; padding: 10px 7px; color: white; text-transform: uppercase;}
</style>
<div id="modal-popup" tabindex="-1" aria-hidden="true" class="font-reading hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 modal h-full">
	<div class="relative p-4 w-full max-w-4xl h-full">
		<div class="relative bg-white rounded-lg shadow">
			<div class="md:p-6 overflow-x-scroll md:overflow-x-visible text-sm md:text-base">
				
				<button type="button" class="absolute right-2 md:right-6 bg-gray-200 hover:bg-gray-900 text-gray-900 hover:text-gray-200 transition rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
					id="modal-close">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
							clip-rule="evenodd"></path>
					</svg>
				</button>
				<div class=" flex justify-center">
					<div class="w-full">
						<img src="<?php echo get_bloginfo('template_url'); ?>/futebol/banner.jpg" class="mx-auto w-full" alt="">
					</div>
				</div>
				<div class="content-center grid grid-cols-1 md:grid-cols-2">
					<div class="flex justify-center py-2">
						<div class="m-2">
							<div class="m-2">
								<img src="https://www.redeconomia.com.br/wp-content/themes/redeconomia/futebol/img-bola.png" id="premio-bola" alt="" style="display: none">
								<img src="https://www.redeconomia.com.br/wp-content/themes/redeconomia/futebol/img-gol.png" id="premio-gol" alt="" style="display: none">
								<canvas id="premio-futebol" width="380" height="320"></canvas>
							</div>
							
						</div>
					</div>
					<div class="flex justify-center items-center">
						<div id="power-controls">
							<form id="form-action" action="" method="post" enctype="multipart/form-data">
								<div class="my-3">
									<input type="text" name="nome" id="nome" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" placeholder="Nome completo" required>
								</div>
								<div class="my-3">
									<input type="text" name="cpf" id="cpf" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" placeholder="CPF" required>
								</div>
								<div class="my-3">
									<input type="email" name="email" id="email" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" placeholder="E-mail" required>
								</div>
								<div class="my-3">
									<input type="text" name="telefone" id="telefone" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" placeholder="Telefone" required>
								</div>
								<div class="my-3">
									<select name="loja" id="loja" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 area-contato">
										<option disabled selected>Loja mais próxima</option>
										<?php
										$listLojas = array(
											'post_type' => 'lojas',
											'posts_per_page' => -1
										);
										$wpLojas = new WP_Query($listLojas);

										if ($wpLojas->have_posts()) {
											while ($wpLojas->have_posts()) {
												$wpLojas->the_post();
												$categoryLojas = get_the_terms(get_the_ID(), 'lojas');
										?>
												<option value="<?php echo get_the_ID(); ?>"><?php echo $categoryLojas[0]->name . ' - ' . get_the_title(); ?></option>
										<?php
											}
										}
										?>
									</select>
									<div class="my-3">
										<input type="checkbox" name="aceito" id="aceito" value="sim"> <label for="aceito">Aceito os termos e condições</label>
									</div>
								</div>
								<div class="my-3">
									<button type="submit" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase" id="spin_button">Participar</button>
								</div>
								<div id="response-futebol"></div>
								<div class="my-3">
									<a href="#" class="text-red-700">VEJA O REGULAMENTO E REGRAS</a>
								</div>
								<input type="hidden" name="action" value="roleta" />
								<input type="hidden" name="token" value="a09e123a02f23dda84e5f1821d537886">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo get_bloginfo('template_url'); ?>/futebol/script.js"></script>