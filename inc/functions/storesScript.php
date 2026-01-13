<?php 
function script_stores() {
    // $idPage = get_the_ID();
    global $post;
    $slugPage = (isset($post->post_name)) ? $post->post_name : false;
    if ($slugPage == 'lojas') {
        wp_enqueue_script( 'storesscripts', get_template_directory_uri() . '/js/script-store.js', array(), '', true );
        wp_localize_script( 'storesscripts', 'store_object',
            array( 
                'location' => admin_url( 'admin-ajax.php' ),
                'action' => 'stores',
                'name' => 'list_stores', 
            )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'script_stores' );
?>