<?php 
get_header(); 
?>
<main>
	<div class="container">
		<h1><?php echo get_the_title(); ?></h1>
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
		<a href="<?php echo get_post_type_archive_link('noticias'); ?>"><button type="button">Voltar Para Notícias</button></a>
	</div>
</main>
<?php 
get_footer(); 
?>