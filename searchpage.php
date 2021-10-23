<?php 
/*
Template Name: Search Page
*/
get_header(); 
?>
<main class="container section-news">
	<div class="row list-posts">
		<?php 
		global $query_string;

		wp_parse_str( $query_string, $search_query );
		$search = new WP_Query( $search_query );

		if ($search->have_posts()) {
			while ($search->have_posts()) {
				$search->the_post();
				?>
				<div class="col-md-4 col-sm-6">
					<a href="<?php the_permalink(); ?>">
						<div class="content" style="min-height: 340px;">
							<div class="img-default" style="background-image: url('<?php echo the_post_thumbnail_url('medium') ?>');"></div>
							<div class="text">
								<h3><?php echo get_the_date(); ?></h3>
								<h2><?php the_title(); ?></h2>
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
<?php
get_footer(); 
?>