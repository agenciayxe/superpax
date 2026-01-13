<nav class="fixed top-0 -right-full h-screen w-full bg-red-800 pt-36 px-4 z-50 text-center text-xl  transition-all duration-300 ease-in-out block md:hidden" id="header-bar-mobile">
	<div class="button-close absolute top-0 right-0 px-4 py-2 my-2 mx-4 text-3xl bg-red-700 hover:bg-red-900 rounded-md text-white hover:text-yellow-300 transition-colors" id="header-bar-mobile-close">
		<i class="fa-solid fa-xmark"></i>
	</div>
	<?php 
	wp_nav_menu( 
		array( 
			'theme_location' => 'menumobile', 
			'menu_class' => 'header-menu text-white uppercase',
			'menu_id' => 'header-nav',
			'container_class' => 'menu-principal-header', 
			'container_id' => 'menu-principal-header' ,
			'walker' => new OrganizacaoMenuPrincipal()
		) 
	);
	?>
	<div id="pre-socials-container" class="pre-socials-container">
		<ul id="pre-list-ul" class="text-white flex justify-center items-center my-4 text-xl">
			<li class="m-2">
				<a href="<?php echo InfoVar::show('radio'); ?>" target="blank" class="menu-link main-menu-link">
					<i class="fas fa-broadcast-tower"></i>
				</a>
			</li>
			<li class="m-2">
				<a href="<?php echo InfoVar::show('email'); ?>" target="blank" class="menu-link main-menu-link">
					<i class="far fa-envelope"></i>
				</a>
			</li>
			<li class="m-2">
				<a href="<?php echo InfoVar::show('facebook'); ?>" target="blank" class="menu-link main-menu-link">
					<i class="fab fa-facebook"></i>
				</a>
			</li>
			<li class="m-2">
				<a href="<?php echo InfoVar::show('instagram'); ?>" target="blank" class="menu-link main-menu-link">
					<i class="fab fa-instagram"></i>
				</a>
			</li>
			<li class="m-2">
				<a href="<?php echo InfoVar::show('youtube'); ?>" target="blank" class="menu-link main-menu-link">
					<i class="fab fa-youtube"></i>
				</a>
			</li>
		</ul>
	</div>
</nav>