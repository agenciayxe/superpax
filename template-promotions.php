<?php
/*
Template name: Promoções
*/
get_header(); 
?>
<main class="page page-promotions">
	<div class="container">
		<div class="list-promotions">
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
						<div class="box-promotions">
							<div class="img-thumb" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_id(), 'medium_large'); ?>');"></div>
							<div class="content">
								<h1><?php echo get_the_title(); ?></h1>
								<?php echo the_content(); ?>
								<?php 
								if (get_field('participar') != '') {
									?>
									<a href="<?php echo get_field('participar'); ?>"><button type="button" class="button-contato">Participar</button></a>
									<?php
								}
								if (get_field('regulamento') != '') {
									?>
									<button type="button" class="button-contato" data-toggle="modal" data-target="#modal-regulamento-<?php echo get_the_ID(); ?>">Regulamento</button>
									<?php 
									modal('regulamento-' . get_the_ID(), 'Regulamento - ' . get_the_title(), get_field('regulamento') );
								}
								if (get_field('vencedores') != '') {
									?>
									<button type="button" class="button-contato" data-toggle="modal" data-target="#modal-vencedores-<?php echo get_the_ID(); ?>">Vencedores</button>
									<?php
									modal('vencedores-' . get_the_ID(), 'Vencedores - ' . get_the_title(), get_field('vencedores') );
								}
								?>
							</div>
						</div>
						<?php
					}
				}
			?>
		</div>
	</div>

</main>
<?php 
get_footer(); 
?>