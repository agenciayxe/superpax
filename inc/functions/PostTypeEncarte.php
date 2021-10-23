<?php 
function postTypeEncarte () {
    $labels = array(
        'name'               => _x( 'Encarte', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Encarte', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Encarte', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Encarte', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicionar Novo', 'Encarte', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicionar Novo Encarte', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Encarte', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Encarte', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Encarte', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Encarte', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Encarte Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Encarte encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Encarte encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'encarte' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('encarte')
    );
    register_post_type('encarte', $args);
    add_post_type_support( 'encarte', 'wps_subtitle' );
}
add_action('init', 'postTypeEncarte');
