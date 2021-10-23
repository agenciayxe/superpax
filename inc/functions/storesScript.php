<?php 
function scriptStores() {
    global $post;
    $slugPage = $post->post_name;
    if ($slugPage == 'lojas') {
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script-store.js', array(), '', true );
        wp_localize_script( 'scripts', 'store_object',
            array( 
                'location' => admin_url( 'admin-ajax.php' ),
                'action' => 'stores',
                'name' => 'listStores', 
            )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'scriptStores' );
?>