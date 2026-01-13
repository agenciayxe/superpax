<?php 
add_action('wp_ajax_nopriv_stores', 'stores_list');
add_action('wp_ajax_stores', 'stores_list');

function stores_list() {
    global $wpdb;
    $content = $_POST;

    $localAtual = $content['local'];
    $argsStore = array(
        'post_type' => 'lojas',
        'posts_per_page' => -1,
	'orderby' => 'title',
	'order'   => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'lojas',
                'field' => 'slug',
                'terms' => $localAtual
            )
        )
    );
    $storeList = new WP_Query($argsStore);
    $responseJson = array();
    if ($storeList->have_posts()) {
        while ($storeList->have_posts()) {
            $storeList->the_post();
            $terms = wp_get_post_terms( get_the_ID(), 'lojas' );
            $responseJson[] = array(
                'mapa' => (get_field('mapa') && get_field('mapa') != '') ? get_field('mapa'): '',
                'category' => ($terms[0]->name && $terms[0]->name != '') ? $terms[0]->name: '',
                'title' => get_the_title(),
                'content' => get_the_content(),
                'link' => (get_field('link') && get_field('link') != '') ?  get_field('link'): '',
                'horario' => (get_field('horario_funcionamento') && get_field('horario_funcionamento') != '') ?  get_field('horario_funcionamento'): '',
                'whatsapp' => (get_field('whatsapp') && get_field('whatsapp') != '') ?  get_field('whatsapp'): '',
                'telefone' => (get_field('telefone') && get_field('telefone') != '') ?  get_field('telefone'): '',
                'telefone2' => (get_field('telefone2') && get_field('telefone2') != '') ?  get_field('telefone2'): '',
                'telefone3' => (get_field('telefone3') && get_field('telefone3') != '') ?  get_field('telefone3'): '',
            );
        }
    }
    echo json_encode($responseJson);
    exit;
}
?>