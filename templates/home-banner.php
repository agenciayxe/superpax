<div class="home-section home-topo container-fluid">
	<div class="row">
		<!-- <div class="col-lg-2 col-md-3">
			<nav class="home-banner-bar">
				<?php 
				wp_nav_menu( 
					array( 
						'theme_location' => 'menumobile', 
						'menu_class' => 'header-menu',
						'menu_id' => 'header-nav',
						'container_class' => 'menu-principal-header', 
						'container_id' => 'menu-principal-header' ,
						'walker' => new OrganizacaoMenuPrincipal()
					) 
				);
				?>
			</nav>
		</div> -->
		<?php
		date_default_timezone_set("America/Sao_Paulo");
		$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
        
		if (is_page() && has_post_thumbnail()) {
			?>
			<div class="home-banner col-lg-12" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->id, 'full'); ?>');">
				<!-- <img src="<?php echo get_the_post_thumbnail_url($post->id, 'full'); ?>" alt=""> -->
			</div>
			<?php
		}
		else {
            $arraySlide = array(
                'post_type' => 'slide',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => -1,
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => 'validade',
                        'compare' => 'NOT EXISTS',
                        'value' => ''
                    ),
                    array(
                        'key' => 'validade',
                        'value' => $timeCurrent,
                        'compare' => '>',
                        'type' => 'DATE'
                    ),
                    array(
                        'key' => 'validade',
                        'value' => '',
                        'compare' => '=',
                    ),
                    
                )
            );
            $querySlide = new WP_Query($arraySlide);
            if ($querySlide->have_posts()) {
                ?>
				<div class="home-banner col-lg-12">
					<div class="row">
						<div class="market-slide swiper-content">
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
							<div class="swiper-wrapper">
								<?php
                                    while ($querySlide->have_posts()) {
                                        $querySlide->the_post();
                                        // if ((get_field('validade') && get_field('validade') > $timeCurrent) || !get_field('validade')) {
                                            $bannerImage = get_the_post_thumbnail_url(get_the_ID()); ?>
											<div class="swiper-slide">
												<?php if (get_field('link')) { ?><a href="<?php echo get_field('link'); ?>" target="_blank"><?php } ?>
													<div class="banner-slide-single" style="background-image: url('<?php echo $bannerImage; ?>');"></div>
												<?php if (get_field('link')) { ?></a><?php } ?>
											</div>
											<?php
                                        // }
                                    } ?>
							</div>
						</div>
					</div>
				</div>
				<?php
            }
            wp_reset_query();
        }
		?>
	</div>
</div>