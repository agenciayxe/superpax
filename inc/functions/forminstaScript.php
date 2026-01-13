<?php 
function scriptForminsta() {
    
    global $post;
    $slugPage = (isset($post->post_name)) ? $post->post_name : false;
    if (is_front_page()) {
        wp_enqueue_script( 'forminstascripts', get_template_directory_uri() . '/js/script-forminsta.js', array(), '', true );
        wp_localize_script( 'forminstascripts', 'forminsta_object',
            array( 
                'location' => admin_url( 'admin-ajax.php' ),
                'action' => 'forminsta',
                'name' => 'forminstaSave', 
            )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'scriptForminsta' );
?>