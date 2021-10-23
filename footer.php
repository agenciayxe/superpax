	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6 footer-data">
					<div class="element-footer">
						<img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="img-fluid footer-logo" alt="">
					</div>
				</div>
				<div class="col-md-6 footer-about">
					<div class="element-footer">
						<div class="footer-site">
							<div class="list-socials">
								<div class="single-socials">
									<a href="<?php echo InfoVar::show('facebook'); ?>" target="_blank">
										<i class="icons icon-facebook">
										</i>
									</a>
								</div>
								<div class="single-socials">
									<a href="<?php echo InfoVar::show('instagram'); ?>" target="_blank">
										<i class="icons icon-instagram">
										</i>
									</a>
								</div>
								<!--<div class="single-socials">
									<a href="<?php echo InfoVar::show('youtube'); ?>" target="_blank">
										<i class="icons icon-youtube">
										</i>
									</a>
								</div>
								<div class="single-socials">
									<a href="<?php echo InfoVar::show('intranet'); ?>" target="_blank">
										<i class="icons icon-intranet">
										</i>
									</a>
								</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="box-back-top" id="box-back-top">
		<i class="fas fa-arrow-up"></i>
	</div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bbf6f323dad74f2"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.pkgd.min.js"></script>
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script src="<?php bloginfo('template_url'); ?>/js/swiper.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/inc/bxslider/jquery.bxslider.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/functions.js?v=1.1.19"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/functions-store.js"></script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<?php if (is_front_page()) { get_template_part('templates/home', 'popup'); } ?>
	<?php wp_footer(); ?>
</body>
</html>