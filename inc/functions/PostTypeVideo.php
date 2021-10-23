<?php 
function postTypeVideo () {
    $labels = array(
        'name'               => _x( 'Video', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Video', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Video', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Video', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicionar Novo', 'Video', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicionar Novo Video', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Video', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Video', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Video', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Video', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Video Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Video encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Video encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'video' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
    );
    register_post_type('video', $args);
    add_post_type_support( 'video', 'wps_subtitle' );
}
add_action('init', 'postTypeVideo');

