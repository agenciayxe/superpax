<?php 
/*
Template name: Lâmina
*/
get_header(); 
get_template_part('templates/ads', 'brochure');
?>
<main class="page page-market">
	<div class="container">
		<?php
		date_default_timezone_set("America/Sao_Paulo");
		$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
		$postEncarte = array(
			'post_type' => 'lamina',
			'posts_per_page' => 1,
			'meta_key' => 'validade',
			'meta_value' => $timeCurrent,
			'meta_compare' => '>'
		);
		$enQuery = new WP_Query($postEncarte);
		if ($enQuery->have_posts()) {
			while ($enQuery->have_posts()) {
				$enQuery->the_post();
				if (get_field('pdf_pilares')) {
					$encarteArquivoPilares = get_field('pdf_pilares');
					?><div class="d-flex justify-content-center"><a href="<?php echo $encarteArquivoPilares; ?>" target="_blank"><button class="button-contato">Lâmina - Pilares</button></a></div><?php
				}
				if (get_field('pdf_vila_penha')) {
					$encarteArquivoVilaPenha = get_field('pdf_vila_penha');
					?><div class="d-flex justify-content-center"><a href="<?php echo $encarteArquivoVilaPenha; ?>" target="_blank"><button class="button-contato">Lâmina - Vila da Penha</button></a></div><?php
				}
				if (get_field('pdf')) {
					$encarteArquivo = get_field('pdf');
					?><div class="d-flex justify-content-center"><a href="<?php echo $encarteArquivo; ?>" target="_blank"><button class="button-contato">Download do Lâmina - Demais Lojas</button></a></div><?php
				}
			?>
			<div class="text-center d-flex justify-content-center align-items-center">
		    	<div class="swiper-button-prev"></div><div class="swiper-pagination"></div><div class="swiper-button-next"></div>
		    </div>
			<p class="text-center"><small>Ofertas válidas somente para as unidades de Madureira, Guadalupe, Del Castilho, Inhaúma, Realengo, Oswaldo Cruz e Encantado.</small></p>
			<div class="market-slide swiper-container">
			    <div class="swiper-wrapper">
					<?php
						$paginas = get_field('encarte');
						foreach ($paginas as $paginaCurrent) {
							$paginaImage = wp_get_attachment_image_src($paginaCurrent['ID'], 'full');
							?>
							<div class="swiper-slide"><div class="swiper-zoom-container"><img src="<?php echo $paginaImage[0]; ?>" class="img-fluid" alt=""></div></div>
							<?php
						}
					?>
				</div>
			    <div class="swiper-scrollbar"></div>
			</div>
			<?php
			}
		}
		else { ?><h3 class="text-center">Atenção. Em breve grandes surpresas de ofertas. Aguardem!</h3><?php }
		?>
	</div>
</main>
<?php 
get_footer(); 
?>