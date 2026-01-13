<?php 
/*
Template name: Promoções
*/
get_header(); ?>
    <main>
        <section class="py-8">
            <div class="container mx-auto px-4">
                <h3 class="py-6 my-2 font-medium text-2xl font-reading text-red-700">Fique por dentro de nossas ações e participe!</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <?php
                $argsStore = array(
					'post_type' => 'promocoes',
					'posts_per_page' => -1
				);
				$storeList = new WP_Query($argsStore);
				if ($storeList->have_posts()) {
					while ($storeList->have_posts()) {
						$storeList->the_post();
						?>
							<div class="rounded-xl overflow-hidden shadow-lg shadow-gray-300">
								<div class="w-full h-80 2xl:h-96 bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_id()); ?>');"></div>
								<div class="px-6 pt-6 pb-4 uppercase">
									<h3 class="text-lg text-red-700 font-medium pb-6"><?php echo get_the_title(); ?></h3>
									<?php echo the_content(); ?>
									<div class="grid grid-cols-2 gap-2">
										<?php 
										if (get_field('participar') != '') {
											?>
											<a href="<?php echo get_field('participar'); ?>"><button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase">Participar</button></a>
											<?php
										}
										if (get_field('regulamento') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-regulamento-<?php echo get_the_ID(); ?>">Regulamento</button>
											<?php 
											modal('regulamento-' . get_the_ID(), 'Regulamento - ' . get_the_title(), get_field('regulamento') );
										}
										if (get_field('vencedores') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-vencedores-<?php echo get_the_ID(); ?>">Vencedores</button>
											<?php
											modal('vencedores-' . get_the_ID(), 'Vencedores - ' . get_the_title(), get_field('vencedores') );
										}
										if (get_field('semana_1') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-semana_1-<?php echo get_the_ID(); ?>">Dicas Semana 1</button>
											<?php
											modal('semana_1-' . get_the_ID(), 'Dicas Semana 1 - ' . get_the_title(), get_field('semana_1') );
										}
										if (get_field('semana_2') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-semana_2-<?php echo get_the_ID(); ?>">Dicas Semana 2</button>
											<?php
											modal('semana_2-' . get_the_ID(), 'Dicas Semana 2 - ' . get_the_title(), get_field('semana_2') );
										}
										if (get_field('semana_3') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-semana_3-<?php echo get_the_ID(); ?>">Dicas Semana 3</button>
											<?php
											modal('semana_3-' . get_the_ID(), 'Dicas Semana 3 - ' . get_the_title(), get_field('semana_3') );
										}
										if (get_field('semana_4') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-semana_4-<?php echo get_the_ID(); ?>">Dicas Semana 4</button>
											<?php
											modal('semana_4-' . get_the_ID(), 'Dicas Semana 4 - ' . get_the_title(), get_field('semana_4') );
										}
										if (get_field('semana_5') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-semana_5-<?php echo get_the_ID(); ?>">Dicas Semana 5</button>
											<?php
											modal('semana_5-' . get_the_ID(), 'Dicas Semana 5 - ' . get_the_title(), get_field('semana_5') );
										}
										if (get_field('semana_6') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-semana_6-<?php echo get_the_ID(); ?>">Dicas Semana 6</button>
											<?php
											modal('semana_6-' . get_the_ID(), 'Dicas Semana 6 - ' . get_the_title(), get_field('semana_6') );
										}
										if (get_field('semana_7') != '') {
											?>
											<button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-1 py-2 px-4 block text-xs uppercase" data-modal-toggle="modal-semana_7-<?php echo get_the_ID(); ?>">Dicas Semana 7</button>
											<?php
											modal('semana_4-' . get_the_ID(), 'Dicas Semana 7 - ' . get_the_title(), get_field('semana_7') );
										}
										?>
									</div>
								</div>
							</div>
						<?php
					}
				}
                ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>