<?php 
add_action('wp_ajax_nopriv_stores', 'storesList');
add_action('wp_ajax_stores', 'storesList');

function storesList() {
    global $wpdb;
    $content = $_POST;

    $localAtual = $content['local'];
    $argsStore = array(
        'post_type' => 'lojas',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'lojas',
                'field' => 'slug',
                'terms' => $localAtual
            )
        )
    );
    $storeList = new WP_Query($argsStore);
    if ($storeList->have_posts()) {
        while ($storeList->have_posts()) {
            $storeList->the_post();
            $terms = wp_get_post_terms( get_the_ID(), 'lojas' );
            ?>
            <div class="box-stores <?php echo $terms[0]->slug; ?>">
                <div class="content">
                    <h1><?php echo get_the_title(); ?></h1>
                    <div class="text-bairro"><strong><?php echo $terms[0]->name; ?></strong></div>
                    <?php echo the_content(); ?>
                    <?php 
                    if (get_field('link') && get_field('link') != '') {
                        ?>
                        <a href="<?php echo get_field('link'); ?>" target="_blank"><button type="button" class="button-contato">Ver No Mapa</button></a>
                        <?php
                    }
                    ?>
                </div>
                <div class="map">
                    <?php
                    if (get_field('mapa') && get_field('mapa') != '') {
                        echo get_field('mapa');
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
    exit;
}
?>