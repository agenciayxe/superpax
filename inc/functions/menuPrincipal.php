<?php 
/* MENU PRINCIPAL */
function menuPrincipal() {
    register_nav_menu('principal', __('Menu Principal', 'theme-slug'));
}
add_action('after_setup_theme', 'menuPrincipal');

function menuRodape() {
	register_nav_menu('menurodape', __('Rodapé', 'theme-slug'));
}
add_action('after_setup_theme', 'menuRodape');

function menuRodape2() {
	register_nav_menu('menurodape-2', __('Rodapé 2', 'theme-slug'));
}
add_action('after_setup_theme', 'menuRodape2');

function menuRodape3() {
	register_nav_menu('menurodape-3', __('Rodapé 3', 'theme-slug'));
}
add_action('after_setup_theme', 'menuRodape3');

function menuMobile() {
	register_nav_menu('menumobile', __('Menu Mobile', 'theme-slug'));
}
add_action('after_setup_theme', 'menuMobile');
?>