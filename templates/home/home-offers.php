<?php
date_default_timezone_set("America/Sao_Paulo");
$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
if (is_front_page()) {
    $arraySlide = array(
        'post_type' => 'ofertas',
        'posts_per_page' => 1,
        'order' => 'DESC',
        'orderby' => 'date',
        'meta_key' => 'validade',
        'meta_value' => $timeCurrent,
        'meta_compare' => '>'
    );
    $querySlide = new WP_Query($arraySlide);
    if ($querySlide->have_posts()) {
        while ($querySlide->have_posts()) {
            $querySlide->the_post();
            $offersSlide = get_field('ofertas');
            ?>
            <section id="offers" class="py-2 md:py-8">
                <div class="container mx-auto px-4">
                    <h2 class="text-red-700 text-center text-2xl md:text-4xl font-medium pb-4">OFERTAS</h2>
                    <div class="swiper swiper-offers overflow-hidden relative">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($offersSlide as $offersSingle) {
                                if ($offersSingle['url']) {
                                    ?><div class="swiper-slide"><img src="<?php echo $offersSingle['url']; ?>" alt="" class="w-full rounded-2xl"></div><?php
                                }
                            }
                            
                            ?>
                        </div>
                        <div class="swiper-button-prev after:text-red-700 after:!text-2xl after:md:!text-4xl"></div>
                        <div class="swiper-button-next after:text-red-700 after:!text-2xl after:md:!text-4xl"></div>
                    </div>
                </div>
            </section>
        <?php 
        }
    }
    wp_reset_query();
}
?>