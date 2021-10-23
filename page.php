<?php 
get_header(); 
?>
<main>
	<div class="container">
		<div class="content-text">
			<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					the_content();
				}
			}
			?>
		</div>
	</div>
</main>
<?php 
get_footer(); 
?>