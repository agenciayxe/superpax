<?php 
add_action('wp_ajax_nopriv_search', 'searchList');
add_action('wp_ajax_search', 'searchList');

function searchList() {
    global $wpdb;
    $content = $_POST;
    $searchCurrent = $content['search'];
    if ($searchCurrent != '') {
        $response = '';
        $listPages = array(
            array('link' => get_bloginfo('home'), 'name' => 'Início', 'icon' => '<i class="fas fa-info-circle"></i>', 'keywords' => 'página inicial, início, home, começo, inicio, primeira'),
            array('link' => get_page_link(InfoVar::show('sobre')), 'name' => 'Sobre', 'icon' => '<i class="fas fa-info-circle"></i>', 'keywords' => 'sobre, quem somos, redeconomia, história, informações, informação '),
            array('link' => get_page_link(InfoVar::show('ofertas')), 'name' => 'Ofertas', 'icon' => '<i class="fas fa-shopping-cart"></i>', 'keywords' => 'ofertas, lâminas, laminas, encartes, promoções, preços, valores, produtos, catalogo'),
            array('link' => get_page_link(InfoVar::show('lojas')), 'name' => 'Lojas', 'icon' => '<i class="fas fa-store"></i>', 'keywords' => 'lojas, endereços, locais, telefones, mercados, supermercados, como chegar, localização, mapa'),
            array('link' => get_page_link(InfoVar::show('sac')), 'name' => 'Sac', 'icon' => '<i class="fas fa-headset"></i>', 'keywords' => 'sac, contato, suporte ao cliente, fale conosco, ajuda, atendimento, problemas, reclamação, ouvidoria'),
            array('link' => get_page_link(InfoVar::show('trabalhe')), 'name' => 'Trabalhe Conosco', 'icon' => '<i class="fas fa-users"></i>', 'keywords' => 'trabalhe conosco, curriculo, trabalhar, emprego, vagas, oportunidade'),
            array('link' => get_page_link(InfoVar::show('promocoes')), 'name' => 'Promoções', 'icon' => '<i class="fas fa-bullhorn"></i>', 'keywords' => 'promoções, regulamentos, promoção, participe, Dia das Mães, Abril da Economia, concursos, sorteios'),
        );
        $pages = '';
        foreach ($listPages as $currentPage) {
            $regex = '/'. $searchCurrent .'/i';
            if (preg_match($regex, $currentPage['keywords'])) {
                $pages .= '<div class="single-page col-12 col-lg-4 col-md-6 my-1"><a href="' . $currentPage['link'] . '">' . $currentPage['icon'] . ' ' . $currentPage['name'] . '</a></div>';
            }
        }
        if ($pages != '') {
        $response .= '<div class="autosuggest-page autosuggest-single"><h3>Páginas</h3><div class="list-pages list-content row d-flex" id="autosuggest-page">' . $pages . '</div></div>';
        }

        $argsTips = array(
            'post_type' => 'dicas',
            'posts_per_page' => 4,
            's' => $searchCurrent
        );
        $listTips = new WP_Query($argsTips);
        if ($listTips->have_posts()) {
            $response .= '<div class="autosuggest-tip autosuggest-single"><h3>Dicas e Receitas</h3><div class="list-tips list-content row d-flex" id="autosuggest-tip">';
            while ($listTips->have_posts()) {
                $listTips->the_post();
               $response .= '<div class="single-tip col-12 col-lg-6 col-md-6 my-1"><a href="' . get_the_permalink() . '"><div class="row d-flex justify-content-center align-items-center"><div class="col-md-3"><img src="' . get_the_post_thumbnail_url() . '" class="img-tip" alt=""></div><div class="col-md-9"><h4>' . get_the_title() . '</h4></div></div></a></div>';
            }
            $response .= '</div></div>';
        }


        $argsStore = array(
            'post_type' => 'lojas',
            'posts_per_page' => 4,
            's' => $searchCurrent
        );
        $listStore = new WP_Query($argsStore);
        if ($listStore->have_posts()) {
            $response .= '<div class="autosuggest-store autosuggest-single"><h3>Lojas</h3><div class="list-stores list-content row d-flex" id="autosuggest-store">';
            while ($listStore->have_posts()) {
                $listStore->the_post();
                $response .= '<div class="single-store col-12 col-lg-6 col-md-6 my-1"><a href="' . get_page_link(InfoVar::show('lojas')) . '?loja=' . get_the_ID() . '"><div class="row d-flex justify-content-center align-items-center"><div class="col-md-1 text-center"><i class="fas fa-map-marker-alt fa-2x"></i></div><div class="col-md-11"><h4>' . get_the_title() . '</h4><p>' . get_the_content() . '</p></div></div></a></div>';
            }
            $response .= '</div></div>';
        }
        if ($response == '') {
            $response = '<div class="autosuggest-pre"><div class="p-3 text-center"><h4>Nenhum resultado encontrado</h4></div></div>';
        }
    }
    else {
        $response = '<div class="autosuggest-pre"><div class="p-3 text-center"><h4>Insira sua pesquisa</h4></div></div>';
    }
    echo $response;
    exit;
}
?>