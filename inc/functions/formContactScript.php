<?php 
function script_contact() {
    // $idPage = get_the_ID();
    global $post;
    $slugPage = (isset($post->post_name)) ? $post->post_name : false;
    if ($slugPage == 'contato') {
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script-contact.js', array(), '', true );
        wp_localize_script( 'scripts', 'ajax_object',
            array( 
                'location' => admin_url( 'admin-ajax.php' ),
                'contact' => 'contact',
                'save' => 'save_contact', 
            )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'script_contact' );
?>