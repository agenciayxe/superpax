<?php 
function postTypeOfertas () {
    $labels = array(
        'name'               => _x( 'Ofertas', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Ofertas', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Ofertas', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Ofertas', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicionar Novo', 'Ofertas', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicionar Novo Ofertas', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Ofertas', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Ofertas', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Ofertas', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Ofertas', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Ofertas Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Ofertas encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Ofertas encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'offers' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
    );
    register_post_type('ofertas', $args);
    add_post_type_support( 'ofertas', 'wps_subtitle' );
}
add_action('init', 'postTypeOfertas');

