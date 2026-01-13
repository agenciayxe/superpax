<?php 
add_action('wp_ajax_nopriv_search', 'searchList');
add_action('wp_ajax_search', 'searchList');

function searchList() {
    global $wpdb;
    $content = $_POST;
    $searchCurrent = $content['search'];
    if ($searchCurrent != '') {
        $response = array(
            'status' => false,
            'message' => 'Houve um erro ou efetuar a pesquisa, tente novamente mais tarde!',
            'pages' => array(),
            'tips' => array(),
            'stores' => array(),
        );
        
        // PÁGINAS
        $listPages = array(
            array('link' => get_bloginfo('home'), 'name' => 'Início', 'icon' => '<i class="px-1 fas fa-info-circle"></i>', 'keywords' => 'página inicial, início, home, começo, inicio, primeira'),
            array('link' => get_page_link(InfoVar::show('sobre')), 'name' => 'Sobre', 'icon' => '<i class="px-1 fas fa-info-circle"></i>', 'keywords' => 'sobre, quem somos, redeconomia, história, informações, informação '),
            array('link' => get_page_link(InfoVar::show('ofertas')), 'name' => 'Ofertas', 'icon' => '<i class="px-1 fas fa-shopping-cart"></i>', 'keywords' => 'ofertas, lâminas, laminas, encartes, promoções, preços, valores, produtos, catalogo'),
            array('link' => get_page_link(InfoVar::show('lojas')), 'name' => 'Lojas', 'icon' => '<i class="px-1 fas fa-store"></i>', 'keywords' => 'lojas, endereços, locais, telefones, mercados, supermercados, como chegar, localização, mapa'),
            array('link' => get_page_link(InfoVar::show('sac')), 'name' => 'Contato', 'icon' => '<i class="px-1 fas fa-headset"></i>', 'keywords' => 'sac, contato, suporte ao cliente, fale conosco, ajuda, atendimento, problemas, reclamação, ouvidoria'),
            array('link' => get_page_link(InfoVar::show('trabalhe')), 'name' => 'Trabalhe Conosco', 'icon' => '<i class="px-1 fas fa-users"></i>', 'keywords' => 'trabalhe conosco, curriculo, trabalhar, emprego, vagas, oportunidade'),
            array('link' => get_page_link(InfoVar::show('promocoes')), 'name' => 'Promoções', 'icon' => '<i class="px-1 fas fa-bullhorn"></i>', 'keywords' => 'promoções, regulamentos, promoção, participe, Dia das Mães, Abril da Economia, concursos, sorteios'),
        );
        $pages = array();
        foreach ($listPages as $currentPage) {
            $regex = '/'. $searchCurrent .'/i';
            if (preg_match($regex, $currentPage['keywords'])) {
                $pages[] = array(
                    'link' => $currentPage['link'],
                    'icon' => $currentPage['icon'],
                    'name' => $currentPage['name'],
                );
            }
        }
        if (count($pages) > 0) { $response['pages'] = $pages; }

        // DICAS
        $tips = array();
        $argsTips = array(
            'post_type' => 'dicas',
            'posts_per_page' => 4,
            's' => $searchCurrent
        );
        $listTips = new WP_Query($argsTips);
        if ($listTips->have_posts()) {
            while ($listTips->have_posts()) {
                $listTips->the_post();
                $tips[] = array(
                    'link' => get_the_permalink(),
                    'img' => get_the_post_thumbnail_url(),
                    'title' => get_the_title(),
                );
            }
        }
        if (count($tips) > 0) { $response['tips'] = $tips; }

        // LOJAS
        $stores = array();
        $argsStore = array(
            'post_type' => 'lojas',
            'posts_per_page' => 4,
            's' => $searchCurrent
        );
        $listStore = new WP_Query($argsStore);
        if ($listStore->have_posts()) {
            while ($listStore->have_posts()) {
                $listStore->the_post();
                $stores[] = array(
                    'link' => get_page_link(InfoVar::show('lojas')) . '?loja=' . get_the_ID(),
                    'title' => get_the_title(),
                    'content' => get_the_content(),
                );
            }
        }
        if (count($stores) > 0) { $response['stores'] = $stores; }
        if (count($pages) > 0 || count($tips) > 0 || count($stores) > 0) {
            $response['status'] = true;
            $response['message'] = 'Pesquisa realizada';
        }
    }
    echo json_encode($response);
    exit;
}
?>