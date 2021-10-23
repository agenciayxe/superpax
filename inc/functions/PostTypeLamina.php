<?php 
function postTypeLamina () {
    $labels = array(
        'name'               => _x( 'Lamina', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Lamina', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Lamina', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Lamina', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicionar Novo', 'Lamina', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicionar Novo Lamina', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Lamina', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Lamina', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Lamina', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Lamina', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Lamina Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Lamina encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Lamina encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'lamina' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('lamina')
    );
    register_post_type('lamina', $args);
    add_post_type_support( 'lamina', 'wps_subtitle' );
}
add_action('init', 'postTypeLamina');