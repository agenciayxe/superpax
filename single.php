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
					if (has_post_thumbnail()) {
						?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" class="rounded float-md-right img-fluid my-2">
						<?php
					}
					the_content();
				}
			}
			?>
		</div>
		<div class="py-3">
			<h4>Compartilhe: </h4>
			<div class="addthis_inline_share_toolbox_cyf8"></div>
		</div>

		<a onclick="window.history.go(-1); return false;"><button type="button">Voltar</button></a><a href="<?php echo get_post_type_archive_link('dicas'); ?>"><button type="button">Ver Outras Dicas</button></a>

		<div class="comments-facebook py-3">
			<h4>Deixe seu comentário:</h4>
			<?php
			$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
			$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			?>
			<div class="fb-comments" data-href="<?php echo $url; ?>" data-width="100%" width="100%" data-numposts="10"></div>
		</div>
	</div>
</main>
<?php 
get_footer(); 
?>