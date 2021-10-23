<section class="section section-tips">
	<div class="container">	
		<h1>Dicas</h1>
		<div class="row list-tips"> 	
			
			<?php 
			$argsTips = array(
				'post_type' => 'dicas',
				'posts_per_page' => 3
			);
			$listTips = new WP_Query($argsTips);
			if ($listTips->have_posts()) {
				while ($listTips->have_posts()) {
					$listTips->the_post();
					?>
					<div class="col-md-4 col-sm-6 single-tips mb-4">
						<a href="<?php echo get_the_permalink(); ?>">
							<div class="thumb-tips">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
							</div>
							<!-- <div class="text-tips">
								<div class="title-tips">
									<h1><?php echo get_the_title(); ?></h1>
								</div>
							</div> -->
						</a>
					</div>
					<?php 
				}
			}
			?>
			<div class="col-md-12 text-right">
				<a href="<?php echo get_post_type_archive_link('dicas'); ?>">
					<button type="button" class="button-tips">
					VER TODAS AS DICAS
					</button>
				</a>
			</div>
		</div>

	</div>
</section>