<section class="section section-offers">
	 <div class="container">
	 	<div class="content-offers">
	 		<div class="d-flex row">
	 			<div class="col-md-6 img-offer">
					<?php
					date_default_timezone_set("America/Sao_Paulo");
					$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
					$postEncarte = array(
						'post_type' => 'video',
						'posts_per_page' => 1,
						'meta_key' => 'validade',
						'meta_value' => $timeCurrent,
						'meta_compare' => '>'
					);
					$enQuery = new WP_Query($postEncarte);
					if ($enQuery->have_posts()) {
						while ($enQuery->have_posts()) {
							$enQuery->the_post();
							$video = get_field('video');
							if ($video) {
								?>
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
								<?php
							}
							else { ?><h3 class="text-center">Sem vídeo de ofertas no momento!</h3><?php }
						}
					}
					else { ?><h3 class="text-center">Sem vídeo de ofertas no momento!</h3><?php }
					?>
					<?php /* echo do_shortcode('[youtube_channel]'); */ ?>
	 			</div>
	 			<div class="col-md-6 offers-buttons">
	 				<!--<a href="<?php echo get_page_link(InfoVar::show('encarte')); ?>">
	 					<div class="button-offer offer-about">
	 						<div class="title-offer">Sobre Nós</div>
	 					</div>
	 				</a>-->
					 <?php
				date_default_timezone_set("America/Sao_Paulo");
				$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
				$postEncarte = array(
					'post_type' => 'encarte',
					'posts_per_page' => 1,
					'meta_key' => 'validade',
					'meta_value' => $timeCurrent,
					'meta_compare' => '>'
				);
				$enQuery = new WP_Query($postEncarte);
				if ($enQuery->have_posts()) {
					?>
					<a href="<?php echo get_page_link(33058); ?>">
	 					<div class="button-offer offer-brochure">
	 						<div class="title-offer">Encarte Digital</div>
	 					</div>
	 				</a>
					<?php
				}
				date_default_timezone_set("America/Sao_Paulo");
				$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
				$postEncarte = array(
					'post_type' => 'lamina',
					'posts_per_page' => 1,
					'meta_key' => 'validade',
					'meta_value' => $timeCurrent,
					'meta_compare' => '>',
					'tax_query' => array(
						array(
							'taxonomy' => 'lamina',
							'field'    => 'slug',
							'terms'    => 'geral',
						),
					),
				);
				$enQuery = new WP_Query($postEncarte);
				if ($enQuery->have_posts()) {
					?>
					<a href="<?php echo get_page_link(33060); ?>">
	 					<div class="button-offer offer-about">
	 						<div class="title-offer">Lâmina Digital</div>
	 					</div>
	 				</a>
					<?php
				}
				
				date_default_timezone_set("America/Sao_Paulo");
				$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
				$postEncarte = array(
					'post_type' => 'lamina',
					'posts_per_page' => 1,
					'meta_key' => 'validade',
					'meta_value' => $timeCurrent,
					'meta_compare' => '>',
					'tax_query' => array(
						array(
							'taxonomy' => 'lamina',
							'field'    => 'slug',
							'terms'    => 'pilares-penha',
						),
					),
				);
				$enQuery = new WP_Query($postEncarte);
				if ($enQuery->have_posts()) {
					?>
					<a href="<?php echo get_page_link(33060); ?>">
	 					<div class="button-offer offer-about">
	 						<div class="title-offer">Pilares e Vila da Penha</div>
	 					</div>
	 				</a>
					<?php
				}
				
				date_default_timezone_set("America/Sao_Paulo");
				$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
				$postEncarte = array(
					'post_type' => 'lamina',
					'posts_per_page' => 1,
					'meta_key' => 'validade',
					'meta_value' => $timeCurrent,
					'meta_compare' => '>',
					'tax_query' => array(
						array(
							'taxonomy' => 'lamina',
							'field'    => 'slug',
							'terms'    => 'pilares',
						),
					),
				);
				$enQuery = new WP_Query($postEncarte);
				if ($enQuery->have_posts()) {
					?>
					<a href="<?php echo get_page_link(33060); ?>">
	 					<div class="button-offer offer-about">
	 						<div class="title-offer">Lâmina Pilares</div>
	 					</div>
	 				</a>
					<?php
				}
				
				date_default_timezone_set("America/Sao_Paulo");
				$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
				$postEncarte = array(
					'post_type' => 'lamina',
					'posts_per_page' => 1,
					'meta_key' => 'validade',
					'meta_value' => $timeCurrent,
					'meta_compare' => '>',
					'tax_query' => array(
						array(
							'taxonomy' => 'lamina',
							'field'    => 'slug',
							'terms'    => 'vila-da-penha',
						),
					),
				);
				$enQuery = new WP_Query($postEncarte);
				if ($enQuery->have_posts()) {
					?>
					<a href="<?php echo get_page_link(33060); ?>">
	 					<div class="button-offer offer-about">
	 						<div class="title-offer">Vila da Penha</div>
	 					</div>
	 				</a>
					<?php
				}
				?>
	 				<a href="<?php echo get_page_link(15); ?>">
	 					<div class="button-offer offer-stores">
	 						<div class="title-offer">Nossas Lojas</div>
	 					</div>
	 				</a>
			 		<!-- <a href="">
			 			<div class="d-flex align-items-center row">
			 				<div class="col-md-7">
			 					<img src="<?php bloginfo('template_url'); ?>/img/image-encarte.png" alt="" class="img-fluid img-offers">
			 				</div>
			 				<div class="col-md-5">
			 					<h3 class="title-offers">
			 						Veja o Encarte
			 					</h3>
			 				</div>
			 			</div>
			 		</a> -->
	 			</div>
	 		</div>
	 	</div>
	 </div>
</section>