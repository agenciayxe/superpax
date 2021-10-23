<?php 
function my_plugin_menu() {
    if (current_user_can( 'manage_options' )) {
        add_menu_page(__('Contatos','menu-test'), __('Contatos','menu-test'), 'manage_options', 'form-contact', 'my_plugin_options', 'dashicons-phone', 12 );
    }
}
add_action( 'admin_menu', 'my_plugin_menu' );
?>