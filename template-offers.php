<?php 
/*
Template Name: Ofertas
*/
get_header(); 
?>
<main class="page-offers section">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6 col-sm-6 single-offers">
				<?php/*
				echo do_shortcode('[youtube_channel]');*/
				?>
			</div>
		</div>
		<div class="row">
			<?php
			date_default_timezone_set("America/Sao_Paulo");
			$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
			$postEncarte = array(
				'post_type' => 'encarte',
				'posts_per_page' => 1,
				'meta_key' => 'validade',
				'meta_value' => $timeCurrent,
				'meta_compare' => '>'
			);
			$enQuery = new WP_Query($postEncarte);
			if ($enQuery->have_posts()) {
				?>
				<div class="col-md-6 col-sm-6 single-offers">
					<a href="<?php echo get_page_link(33058); ?>">
						<div class="content">
							 <div class="img-default" style="background-image: url('<?php echo get_bloginfo('template_url') . '/img/offer-encarte.jpg'; ?>');"></div>
							<!-- <img src="<?php echo $img[$h]; ?>" alt="" class="img-default img-fluid"> -->
							<div class="text">
								<h2>Encarte de Ofertas</h2>
								<span class="view-more">Ver Mais </span>
							</div>
						</div>
					</a>
				</div>
				<?php
			}


			date_default_timezone_set("America/Sao_Paulo");
			$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
			$postEncarte = array(
				'post_type' => 'lamina',
				'posts_per_page' => 1,
				'meta_key' => 'validade',
				'meta_value' => $timeCurrent,
				'meta_compare' => '>',
				'tax_query' => array(
					array(
						'taxonomy' => 'lamina',
						'field'    => 'slug',
						'terms'    => 'geral',
					),
				),
			);
			$enQuery = new WP_Query($postEncarte);
			if ($enQuery->have_posts()) {
				?>
				<div class="col-md-6 col-sm-6 single-offers">
					<a href="<?php echo get_page_link(33060); ?>">
						<div class="content">
							 <div class="img-default" style="background-image: url('<?php echo get_bloginfo('template_url') . '/img/offer-lamina.jpg'; ?>');"></div>
							<!-- <img src="<?php echo $img[$h]; ?>" alt="" class="img-default img-fluid"> -->
							<div class="text">
								<h2>Lâmina de Ofertas</h2>
								<span class="view-more">Ver Mais </span>
							</div>
						</div>
					</a>
				</div>
				<?php
			}

			date_default_timezone_set("America/Sao_Paulo");
			$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
			$postEncarte = array(
				'post_type' => 'lamina',
				'posts_per_page' => 1,
				'meta_key' => 'validade',
				'meta_value' => $timeCurrent,
				'meta_compare' => '>',
				'tax_query' => array(
					array(
						'taxonomy' => 'lamina',
						'field'    => 'slug',
						'terms'    => 'pilares-penha',
					),
				),
			);
			$enQuery = new WP_Query($postEncarte); 
			if ($enQuery->have_posts()) {
				?>
				<div class="col-md-6 col-sm-6 single-offers">
					<a href="<?php echo get_page_link(33623); ?>">
						<div class="content">
							 <div class="img-default" style="background-image: url('<?php echo get_bloginfo('template_url') . '/img/offer-lamina-penha-pilares.jpg'; ?>');"></div>
							<!-- <img src="<?php echo $img[$h]; ?>" alt="" class="img-default img-fluid"> -->
							<div class="text">
								<h2>Lâmina de Ofertas</h2>
								<span class="view-more">Ver Mais </span>
							</div>
						</div>
					</a>
				</div>
				<?php
			}
			

			date_default_timezone_set("America/Sao_Paulo");
			$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
			$postEncarte = array(
				'post_type' => 'lamina',
				'posts_per_page' => 1,
				'meta_key' => 'validade',
				'meta_value' => $timeCurrent,
				'meta_compare' => '>',
				'tax_query' => array(
					array(
						'taxonomy' => 'lamina',
						'field'    => 'slug',
						'terms'    => 'pilares',
					),
				),
			);
			$enQuery = new WP_Query($postEncarte); 
			if ($enQuery->have_posts()) {
				?>
				<div class="col-md-6 col-sm-6 single-offers">
					<a href="<?php echo get_page_link(33635); ?>">
						<div class="content">
							 <div class="img-default" style="background-image: url('<?php echo get_bloginfo('template_url') . '/img/offer-lamina-pilares.jpg'; ?>');"></div>
							<!-- <img src="<?php echo $img[$h]; ?>" alt="" class="img-default img-fluid"> -->
							<div class="text">
								<h2>Lâmina de Ofertas</h2>
								<span class="view-more">Ver Mais </span>
							</div>
						</div>
					</a>
				</div>
				<?php
			}
			

			date_default_timezone_set("America/Sao_Paulo");
			$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
			$postEncarte = array(
				'post_type' => 'lamina',
				'posts_per_page' => 1,
				'meta_key' => 'validade',
				'meta_value' => $timeCurrent,
				'meta_compare' => '>',
				'tax_query' => array(
					array(
						'taxonomy' => 'lamina',
						'field'    => 'slug',
						'terms'    => 'vila-da-penha',
					),
				),
			);
			$enQuery = new WP_Query($postEncarte); 
			if ($enQuery->have_posts()) {
				?>
				<div class="col-md-6 col-sm-6 single-offers">
					<a href="<?php echo get_page_link(33637); ?>">
						<div class="content">
							 <div class="img-default" style="background-image: url('<?php echo get_bloginfo('template_url') . '/img/offer-lamina-vila-da-penha.jpg'; ?>');"></div>
							<!-- <img src="<?php echo $img[$h]; ?>" alt="" class="img-default img-fluid"> -->
							<div class="text">
								<h2>Lâmina de Ofertas</h2>
								<span class="view-more">Ver Mais </span>
							</div>
						</div>
					</a>
				</div>
				<?php
			}
			?>
	</div>
</main>
<?php get_footer(); ?>