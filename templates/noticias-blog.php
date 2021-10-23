<main class="container section-news">
	<div class="row list-posts">
		<?php 
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				?>
				<div class="col-md-4 col-sm-6">
					<a href="<?php the_permalink(); ?>">
						<div class="content" style="min-height: 340px;">
							<?php
							if (has_post_thumbnail()) { ?><div class="img-default" style="background-image: url('<?php echo the_post_thumbnail_url('medium') ?>');"></div><?php } else { ?><div class="img-default"><h3><?php the_title(); ?></h3></div><?php }
							?>
							<div class="text">
								<!-- <h3><?php echo get_the_date(); ?></h3> -->
								<h2><?php the_title(); ?></h2>
								<h3><?php echo get_the_excerpt(); ?></h3>
								<span class="view-more">Ver Mais </span>
							</div>
						</div>
					</a>
				</div>
				<?php 
			}
		}

		?>
	</div>
	<div class="row">
		<?php echo paginateList(); ?>
	</div>
</main>