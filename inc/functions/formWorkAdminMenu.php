<?php 
function formWorkAdminMenu() {
    if (current_user_can( 'manage_options' )) {
        add_menu_page(__('Currículos','menu-test'), __('Currículos','menu-test'), 'manage_options', 'form-work', 'work_options', 'dashicons-media-text', 12 );
    }
}
add_action( 'admin_menu', 'formWorkAdminMenu' );
?>