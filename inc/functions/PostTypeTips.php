<?php 
function postTypeDicas () {
    $labels = array(
        'name'               => _x( 'Dicas', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Dicas', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Dicas', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Dicas', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicionar Novo', 'Dicas', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicionar Novo Dicas', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Dicas', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Dicas', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Dicas', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Dicas', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Dicas Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Dicas encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Dicas encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'dicas' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 4,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
    );
    register_post_type('dicas', $args);
    add_post_type_support( 'dicas', 'wps_subtitle' );
}
add_action('init', 'postTypeDicas');

function tipsTags() {
    $label = array(
        'name' => 'Tags',
        'singular_name' => 'Tag',
        'menu_name' => 'Tags',
        'all_items' => 'Todas as Tags',
        'edit_item' => 'Editar Tag',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Tag Pai',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'tag_dicas',
        'dicas',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'dicas-receitas')
        )
    );
}
add_action('init',  'tipsTags');