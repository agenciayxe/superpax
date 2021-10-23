<?php 
get_header(); 
?>
<main class="page page-services">
	<div class="container">
		<div class="list-services row">
			<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>
					<div class="col-md-6">
						<div class="single-services">
							<a href="<?php echo get_the_permalink(); ?>">
								<div class="img-services" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>');">
								</div>
								<div class="title-services"><h3><?php echo get_the_title(); ?></h3></div>
							</a>
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