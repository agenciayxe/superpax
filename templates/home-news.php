<section class="section home-news">
	<div class="container">
		<div class="content-news">
			<h2 class="title">Notícias</h2>
			<div class="row">
				<div class="col-md-6">
					<img src="<?php bloginfo('template_url'); ?>/img/banner-news.jpg" class="image-news img-fluid" alt="">
				</div>
				<div class="col-md-6">
					<div class="list-news">
						<?php 
						for ($n = 0; $n <= 2; $n++) {
							?>
							<div class="single-news">
								<div class="title-news">
									<h3>BGM Cuida do Golfe Olimpico</h3>
								</div>
								<div class="content-news">
									A BGM é responsavel pela gestão e manutenção do campo de golfe
								</div>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>