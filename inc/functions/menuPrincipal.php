<?php 
/* MENU PRINCIPAL */
function menuPrincipal() {
    register_nav_menu('principal', __('Menu Principal', 'theme-slug'));
}
add_action('after_setup_theme', 'menuPrincipal');

function menuPreHeader() {
	register_nav_menu('premenu', __('Pré Header', 'theme-slug'));
}
add_action('after_setup_theme', 'menuPreHeader');

function menuMobile() {
	register_nav_menu('menumobile', __('Menu Mobile', 'theme-slug'));
}
add_action('after_setup_theme', 'menuMobile');
?>