<section class="section home-services">
	<div class="container">
		<div class="content-services">
			<div class="row">
				<div class="col-md-4">
					<div class="single-service">
						<div class="img-service">
							<img src="<?php echo get_bloginfo('template_url'); ?>/img/icons/icon-stores.png" alt="">
						</div>
						<h3 class="title-service">
							Nossas Lojas
						</h3>
						<p class="text-service">
							Veja o endereço da loja mais próxima
						</p>
						<div class="link-service">
							<a href="<?php echo get_page_link(InfoVar::show('lojas')); ?>">
							Veja Agora!
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<img src="<?php bloginfo('template_url'); ?>/img/img-zapdelivery2.png" alt="" class="img-fluid">
				</div>
				<div class="col-md-4">
					<div class="single-service">
						<div class="img-service">
							<img src="<?php echo get_bloginfo('template_url'); ?>/img/icons/icon-app.png" alt="">
						</div>
						<h3 class="title-service">
							Baixe Nosso App
						</h3>
						<p class="text-service">
							Fique por dentro de todas as promoções!
						</p>
						<div class="col-md-12">
							<div class="row">
								<div class="link-service col-md-6">
									<a href="<?php echo InfoVar::show('appstore'); ?>" class="text-center">
										App Store
									</a>
								</div>
								<div class="link-service col-md-6">
									<a href="<?php echo InfoVar::show('googleplay'); ?>" class="text-center">
										Google Play
									</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>