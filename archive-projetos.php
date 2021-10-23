<?php 
/*
Template name: Projetos
*/
get_header(); 
?>
<main class="page page-projects">
	<div class="container">
		<div class="list-projects">
			<?php 
			$argsStore = array(
				'post_type' => 'projetos'
			);
			$storeList = new WP_Query($argsStore);
			if ($storeList->have_posts()) {
				while ($storeList->have_posts()) {
					$storeList->the_post();
					?>
					<div class="box-projects">
						<div class="image-featured" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>');"></div>
						<div class="content">
							<h1><?php echo get_the_title(); ?></h1>
							<p><?php echo get_the_excerpt(); ?></p>
							<a href="<?php echo get_the_permalink(); ?>"><button type="button" class="button-contato">Ver Mais</button></a>
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