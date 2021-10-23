<section class="home-brands section">
	<div class="container">
		<div class="content-brands">
			<h2 class="title">Marcas Que Trabalhamos</h2>
			<div class="list-brand">
				<?php 
				$listBrand = array(
					'jacobsen.png',
					'turfco.png',
					'ryan.png',
					'redexim.png',
					'tru-turf.png',
				);
				foreach($listBrand as $brandCurrent) {
					?>
					<div class="single-brand carousel-cell">
						<img src="<?php bloginfo('template_url'); ?>/img/brands/<?php echo $brandCurrent; ?>" alt="">
					</div>
					<?php 
				}
				?>
			</div>
		</div>
	</div>
</section>