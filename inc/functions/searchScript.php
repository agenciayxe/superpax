<?php 
function scriptSearch() {
    wp_enqueue_script( 'searchscript', get_template_directory_uri() . '/js/functions-search.js', array(), '', true );
    wp_localize_script( 'searchscript', 'search_object',
        array( 
            'location' => admin_url( 'admin-ajax.php' ),
            'action' => 'search',
        )
    );
}
add_action( 'wp_enqueue_scripts', 'scriptSearch' );
?>