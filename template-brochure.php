<?php
/*
Template name: Encartes (Single)
*/
get_header(); ?>
<main>
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="w-full px-2">
                <?php
                date_default_timezone_set("America/Sao_Paulo");
                $timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
                $postEncarte = array(
                    'post_type' => 'encarte',
                    'posts_per_page' => 1,
                    'meta_key' => 'validade',
                    'meta_value' => $timeCurrent,
                    'meta_compare' => '>'
                );
                $enQuery = new WP_Query($postEncarte);
                if ($enQuery->have_posts()) {
                    while ($enQuery->have_posts()) {
                        $enQuery->the_post();
                        ?>
                        <div class="flex items-center flex-col sm:flex-row sm:justify-between flex-wrap uppercase">
                            <a onclick="window.history.go(-1); return false;">
                                <div class="bg-red-700 bg-[url('../img/button-lamina.jpg')] bg-cover bg-center px-8 py-4 md:px-10 md:py-5 my-2 md:my-6 flex items-center rounded-lg md:rounded-2xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 md:h-10" width="28.389" height="23.583" viewBox="0 0 28.389 23.583">
                                        <path id="back" d="M54.1,65.867c.21-.286.4-.581.638-.848q2.716-3.13,5.441-6.241a1.174,1.174,0,0,1,1.277-.438,1.1,1.1,0,0,1,.819.953,1.194,1.194,0,0,1-.353,1.01c-1.115,1.267-2.22,2.544-3.335,3.821-.248.286-.5.562-.781.9H73.823a8.716,8.716,0,0,1,3.306.591,8.219,8.219,0,0,1,4.745,4.755,8.1,8.1,0,0,1-.381,6.984,8.256,8.256,0,0,1-5.212,4.211,8.974,8.974,0,0,1-2.515.314h-16.7a2.893,2.893,0,0,1-.5-.038,1.136,1.136,0,0,1-.915-1.21,1.166,1.166,0,0,1,1.086-1.067c.124-.01.238,0,.362,0H73.89a6.109,6.109,0,1,0,.01-12.215H58.14c-.076,0-.162.01-.3.019.133.162.238.276.343.4l3.773,4.316a1.163,1.163,0,1,1-1.734,1.544c-.534-.591-1.048-1.191-1.572-1.791q-2.115-2.415-4.23-4.84a3.776,3.776,0,0,1-.314-.5Z" transform="translate(-54.1 -58.291)" fill="#fff303"/>
                                    </svg>
                                    <div class="px-3 md:px-8 text-white text-sm md:text-base lg:text-2xl">
                                        Voltar
                                    </div>
                                </div>
                            </a>
                            <?php
                            if (get_field('pdf')) {
                                $encarteArquivo = get_field('pdf');
                                ?>
                                <a href="<?php echo $encarteArquivo; ?>" target="_blank">
                                    <div class="bg-red-700 bg-[url('../img/button-lamina.jpg')] bg-cover bg-center px-8 py-4 md:px-10 md:py-5 my-2 md:my-6 flex items-center rounded-lg md:rounded-2xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 md:h-10" width="32.78" height="32.772" viewBox="0 0 32.78 32.772">
                                            <g id="download" transform="translate(-56.8 -46.098)">
                                                <path id="Caminho_75" data-name="Caminho 75" d="M89.577,235.353a1.517,1.517,0,1,0-3.021.011v4.6a3.241,3.241,0,0,1-3.447,3.458H63.268a3.252,3.252,0,0,1-3.447-3.458v-4.547A1.522,1.522,0,1,0,56.8,235.4v4.643a6.235,6.235,0,0,0,6.415,6.4h9.969c3.383,0,6.767.011,10.15,0a6.236,6.236,0,0,0,6.233-6.212C89.588,238.609,89.577,236.976,89.577,235.353Z" transform="translate(0 -167.578)" fill="#fff303"/>
                                                <path id="Caminho_76" data-name="Caminho 76" d="M126.607,69.409A1.581,1.581,0,0,0,129.2,69.4l7.952-7.952a3.835,3.835,0,0,0,.342-.374,1.512,1.512,0,0,0-.854-2.38,1.566,1.566,0,0,0-1.558.534q-2.61,2.626-5.241,5.251c-.107.107-.181.278-.406.267V47.977a3.326,3.326,0,0,0-.053-.726,1.509,1.509,0,0,0-2.924-.032,2.746,2.746,0,0,0-.064.726V64.734c-.053.032-.1.064-.149.1a3.488,3.488,0,0,0-.3-.395q-2.61-2.61-5.209-5.219a1.553,1.553,0,0,0-1.558-.512,1.519,1.519,0,0,0-.619,2.626C121.217,64.019,123.917,66.708,126.607,69.409Z" transform="translate(-54.704 0)" fill="#fff303"/>
                                            </g>
                                        </svg>
                                        <div class="px-3 md:px-8 text-white text-sm md:text-base lg:text-2xl">
                                            Download do Encarte
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                        
                        <div class="m-4 text-center flex justify-center items-center">
                            <div class="swiper-button-prev !relative p-2 mx-4 after:text-red-700"></div>
                            <div class="swiper-pagination !w-auto !relative p-2 mx-4 text-red-700 text-lg md:text-xl font-medium uppercase"></div>
                            <div class="swiper-button-next !relative p-2 mx-4 after:text-red-700"></div>
                        </div>
                        <div class="swiper swiper-brochure rounded-xl md:rounded-2xl overflow-hidden">
                            <div class="swiper-wrapper">
                                <?php
                                    $paginas = get_field('encarte');
                                    foreach ($paginas as $paginaCurrent) {
                                        $paginaImage = wp_get_attachment_image_src($paginaCurrent['ID'], 'full')
                                        ?>
                                        <div class="swiper-slide"><img src="<?php echo $paginaImage[0]; ?>" alt="" class="w-full"></div><?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                else { ?><h3 class="text-center">Atenção. Em breve grandes surpresas de ofertas. Aguardem!</h3><?php }
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>