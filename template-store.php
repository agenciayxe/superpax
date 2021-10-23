<?php
/*
Template name: Lojas
*/
get_header(); 
?>
<main class="page page-stores">
	<div class="container">
		<div class="list-stores">
			<div id="store-list">
				
				<?php
			    $argsStore = array(
			        'post_type' => 'lojas',
			        'posts_per_page' => -1
			    );
			    $storeList = new WP_Query($argsStore);
			    if ($storeList->have_posts()) {
			        while ($storeList->have_posts()) {
			            $storeList->the_post();
			            $terms = wp_get_post_terms( get_the_ID(), 'lojas' );
			            ?>
			            <div class="box-stores <?php echo $terms[0]->slug; ?>">
			                <div class="content">
			                    <h1><?php echo get_the_title(); ?></h1>
			                    <div class="text-bairro"><strong><?php echo $terms[0]->name; ?></strong></div>
			                    <?php echo the_content(); ?>
			                    <?php 
			                    if (get_field('link') && get_field('link') != '') {
			                        ?>
			                        <a href="<?php echo get_field('link'); ?>" target="_blank"><button type="button" class="button-contato">Ver No Mapa</button></a>
			                        <?php
			                    }
			                    ?>
			                </div>
			                <div class="map">
			                    <?php
			                    if (get_field('mapa') && get_field('mapa') != '') {
			                        echo get_field('mapa');
			                    }
			                    ?>
			                </div>
			            </div>
			            <?php
			        }
			    }
			    else {
			    	?><div class="bg-light text-center text-uppercase p-5"><i class="fas fa-map-marker-alt fa-3x m-2"></i><h4>Selecione um local acima para encontrar uma loja</h4></div><?php
			    }
			    ?>
			</div>
		</div>
	</div>
</main>
<?php 
get_footer(); 
?>