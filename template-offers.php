<?php
/*
Template name: Encartes
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
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'meta_query' => array(
                        'relation' => 'OR',
                        array('key' => 'validade', 'compare' => 'NOT EXISTS', 'value' => ''),
                        array('key' => 'validade', 'value' => $timeCurrent, 'compare' => '>', 'type' => 'DATE'),
                        array('key' => 'validade', 'value' => '', 'compare' => '=',),
                    )
                );
                $enQuery = new WP_Query($postEncarte);
                if ($enQuery->have_posts()) {
                    while ($enQuery->have_posts()) {
                        $enQuery->the_post();
                        $paginas = get_field('encarte');
                        $validade = strftime('%d/%m/%Y', strtotime(get_field('validade')));
                        foreach ($paginas as $paginaCurrent) {
                            $paginaImage = wp_get_attachment_image_src($paginaCurrent['ID'], 'full');
                            $thumbEncarte = $paginaImage[0];
                            break;
                        }
                        ?>
                        <div class="rounded-xl overflow-hidden shadow-lg shadow-gray-300 text-center md:text-left md:flex p-4 md:p-8">
                            <div class="w-full md:w-1/2 lg:w-1/4">
                                <img src="<?php echo $thumbEncarte; ?>" class="w-full inline-block" alt="">
                            </div>
                            <div class="w-full md:w-1/2 lg:w-3/4 md:px-8 py-2 md:pt-8 md:pb-4 uppercase">
                                <h3 class="text-2xl text-4xl text-red-700 font-medium uppercase py-4">ENCARTE</h3>
                                <div class="w-full xl:w-1/2">
                                    <a href="<?php echo get_page_link(73); ?>">
                                        <div class="bg-red-700 bg-[url('../img/button-lamina.jpg')] bg-cover bg-center px-10 py-5 my-6 flex items-center rounded-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10" width="65.283" height="79.541" viewBox="0 0 65.283 79.541">
                                                <g id="flyer" transform="translate(-80.21 -41.725)">
                                                    <path id="Caminho_41" data-name="Caminho 41" d="M112.383,121.267c-2.324-.774-4.644-1.566-6.976-2.319q-11.806-3.822-23.619-7.622c-1.307-.422-1.578-.8-1.578-2.2V43.777c0-1.779.844-2.4,2.52-1.862q14.723,4.753,29.454,9.489a2.3,2.3,0,0,0,1.329,0q14.735-4.723,29.454-9.489c1.679-.543,2.52.08,2.523,1.86q0,6.529,0,13.055c0,.156.005.312-.005.465a1.6,1.6,0,0,1-1.54,1.631,1.568,1.568,0,0,1-1.553-1.613c-.035-1.035-.01-2.071-.01-3.109V45.4c-.292.08-.528.136-.759.209q-13.25,4.271-26.5,8.534a.892.892,0,0,0-.731,1.033q.026,30.77.015,61.54v.854c2.041-.653,4.006-1.282,5.968-1.915q10.63-3.426,21.262-6.84a.937.937,0,0,0,.761-1.091q-.03-18.61-.018-37.219a1.856,1.856,0,0,1,.784-1.822,1.49,1.49,0,0,1,2.2.829,3.976,3.976,0,0,1,.118,1.148q.008,19.194.005,38.385c0,1.51-.239,1.842-1.654,2.3q-14.908,4.81-29.819,9.622c-.241.078-.467.2-.7.3C113,121.267,112.692,121.267,112.383,121.267ZM83.316,45.375v.751q0,30.845-.018,61.691c0,.628.244.829.777,1q10.856,3.479,21.7,6.989c1.814.586,3.631,1.163,5.516,1.767v-.862q0-30.728.015-61.457a.978.978,0,0,0-.807-1.133c-6.38-2.028-12.748-4.094-19.121-6.147C88.726,47.117,86.073,46.262,83.316,45.375Z" fill="#fff303" />
                                                    <path id="Caminho_42" data-name="Caminho 42" d="M234.02,215.412q0-4.2,0-8.391c0-1.3.286-1.7,1.51-2.093q7.528-2.431,15.058-4.855c1.6-.513,2.443.116,2.443,1.809q0,8.391,0,16.784c0,1.342-.276,1.726-1.556,2.141q-7.49,2.42-14.985,4.832-2.469.8-2.475-1.834Q234.014,219.606,234.02,215.412Zm3.109,6.715c.214-.05.312-.065.407-.1,3.96-1.272,7.916-2.556,11.884-3.8.513-.161.51-.462.51-.867q-.011-6.521-.005-13.045c0-.221-.028-.442-.043-.694a2.731,2.731,0,0,0-.354.058c-3.958,1.277-7.913,2.566-11.879,3.82-.505.161-.523.457-.523.869q.011,4.93.005,9.861C237.129,219.5,237.129,220.764,237.129,222.126Z" transform="translate(-115.156 -118.425)" fill="#fff303" />
                                                    <path id="Caminho_43" data-name="Caminho 43" d="M251.391,93.51a1.585,1.585,0,0,1,1.638,1.136,1.453,1.453,0,0,1-.673,1.674,2.943,2.943,0,0,1-.7.312c-5.061,1.641-10.132,3.254-15.183,4.923-1.613.533-2.546-.6-2.342-1.676.161-.844.822-1.131,1.533-1.36q5.387-1.73,10.771-3.463c1.427-.46,2.85-.925,4.277-1.38C250.974,93.59,251.256,93.543,251.391,93.51Z" transform="translate(-115.218 -38.771)" fill="#fff303" />
                                                    <path id="Caminho_44" data-name="Caminho 44" d="M235.811,135.96a1.554,1.554,0,0,1-1.654-1.1,1.461,1.461,0,0,1,.694-1.734,4.13,4.13,0,0,1,.784-.327q7.482-2.42,14.972-4.825a2.867,2.867,0,0,1,1.131-.191,1.429,1.429,0,0,1,1.314,1.234,1.377,1.377,0,0,1-.8,1.608,19.077,19.077,0,0,1-2.041.724q-6.819,2.209-13.64,4.408C236.279,135.855,235.974,135.918,235.811,135.96Z" transform="translate(-115.22 -64.428)" fill="#fff303" />
                                                    <path id="Caminho_45" data-name="Caminho 45" d="M235.738,170.2a1.524,1.524,0,0,1-1.578-1.1,1.466,1.466,0,0,1,.7-1.731,3.9,3.9,0,0,1,.784-.324q7.407-2.4,14.814-4.792c.148-.048.294-.1.442-.141a1.613,1.613,0,0,1,2.131,1.01,1.571,1.571,0,0,1-1.2,1.953q-7.769,2.533-15.55,5.028A4.157,4.157,0,0,1,235.738,170.2Z" transform="translate(-115.223 -90.073)" fill="#fff303" />
                                                    <path id="Caminho_46" data-name="Caminho 46" d="M329.175,122.649a1.541,1.541,0,1,1-1.515,1.566A1.6,1.6,0,0,1,329.175,122.649Z" transform="translate(-185.266 -60.588)" fill="#fff303" />
                                                    <path id="Caminho_47" data-name="Caminho 47" d="M129.432,109.091c0,2.822.005,5.647,0,8.469,0,1.578-.875,2.219-2.377,1.734q-7.6-2.446-15.2-4.915c-1.123-.364-1.422-.764-1.422-1.915q-.008-8.545,0-17.093c0-1.53.877-2.171,2.34-1.7q7.607,2.439,15.206,4.9c1.176.379,1.455.784,1.458,2.048Q129.432,104.857,129.432,109.091ZM113.58,97.2c-.023.226-.043.329-.043.43,0,4.5.008,9.006-.015,13.507,0,.477.219.606.6.726q5.794,1.855,11.582,3.724c.183.058.374.088.563.131a1.221,1.221,0,0,0,.053-.209c.005-4.581,0-9.16.02-13.741,0-.46-.251-.545-.591-.651-1.749-.555-3.49-1.126-5.237-1.689C118.224,98.693,115.94,97.959,113.58,97.2Z" transform="translate(-22.622 -38.777)" fill="#fff303" />
                                                    <path id="Caminho_48" data-name="Caminho 48" d="M129.464,277.233a1.519,1.519,0,0,1-2.123,1.417c-2.86-.9-5.709-1.824-8.562-2.744q-3.468-1.116-6.931-2.242c-.967-.317-1.39-.852-1.354-1.646a1.528,1.528,0,0,1,2.126-1.342c2.417.749,4.822,1.543,7.232,2.319,2.754.887,5.508,1.769,8.26,2.666C129.045,275.962,129.464,276.472,129.464,277.233Z" transform="translate(-22.672 -171.346)" fill="#fff303" />
                                                    <path id="Caminho_49" data-name="Caminho 49" d="M112.351,235.778c.3.073.6.131.9.224q7.486,2.409,14.97,4.827a4.238,4.238,0,0,1,.646.261,1.529,1.529,0,0,1,.812,1.882,1.482,1.482,0,0,1-1.8.97c-.874-.219-1.731-.518-2.591-.794-4.327-1.392-8.657-2.779-12.974-4.2a2.3,2.3,0,0,1-1.249-.807,1.834,1.834,0,0,1-.068-1.5c.209-.43.794-.676,1.214-1.005C112.256,235.688,112.3,235.733,112.351,235.778Z" transform="translate(-22.954 -145.185)" fill="#fff303" />
                                                    <path id="Caminho_50" data-name="Caminho 50" d="M127.763,210.3c-.163-.04-.467-.1-.761-.193q-7.524-2.416-15.045-4.848a3.357,3.357,0,0,1-.842-.382,1.461,1.461,0,0,1-.6-1.706,1.488,1.488,0,0,1,1.543-1.05,3.792,3.792,0,0,1,.829.181q7.561,2.428,15.12,4.865a3.29,3.29,0,0,1,.706.314,1.5,1.5,0,0,1,.656,1.752A1.538,1.538,0,0,1,127.763,210.3Z" transform="translate(-22.639 -120.082)" fill="#fff303" />
                                                </g>
                                            </svg>
                                            <div class="px-8 text-white text-2xl">
                                                Abrir o Encarte
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                    if (get_field('pdf')) {
                                        $encarteArquivo = get_field('pdf');
                                    ?>
                                        <a href="<?php echo $encarteArquivo; ?>" target="_blank">
                                            <div class="bg-red-700 bg-[url('../img/button-lamina.jpg')] bg-cover bg-center px-10 py-5 my-6 flex items-center rounded-2xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10" width="32.78" height="32.772" viewBox="0 0 32.78 32.772">
                                                    <g id="download" transform="translate(-56.8 -46.098)">
                                                        <path id="Caminho_75" data-name="Caminho 75" d="M89.577,235.353a1.517,1.517,0,1,0-3.021.011v4.6a3.241,3.241,0,0,1-3.447,3.458H63.268a3.252,3.252,0,0,1-3.447-3.458v-4.547A1.522,1.522,0,1,0,56.8,235.4v4.643a6.235,6.235,0,0,0,6.415,6.4h9.969c3.383,0,6.767.011,10.15,0a6.236,6.236,0,0,0,6.233-6.212C89.588,238.609,89.577,236.976,89.577,235.353Z" transform="translate(0 -167.578)" fill="#fff303" />
                                                        <path id="Caminho_76" data-name="Caminho 76" d="M126.607,69.409A1.581,1.581,0,0,0,129.2,69.4l7.952-7.952a3.835,3.835,0,0,0,.342-.374,1.512,1.512,0,0,0-.854-2.38,1.566,1.566,0,0,0-1.558.534q-2.61,2.626-5.241,5.251c-.107.107-.181.278-.406.267V47.977a3.326,3.326,0,0,0-.053-.726,1.509,1.509,0,0,0-2.924-.032,2.746,2.746,0,0,0-.064.726V64.734c-.053.032-.1.064-.149.1a3.488,3.488,0,0,0-.3-.395q-2.61-2.61-5.209-5.219a1.553,1.553,0,0,0-1.558-.512,1.519,1.519,0,0,0-.619,2.626C121.217,64.019,123.917,66.708,126.607,69.409Z" transform="translate(-54.704 0)" fill="#fff303" />
                                                    </g>
                                                </svg>
                                                <div class="px-8 text-white text-2xl">
                                                    Download do Encarte
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                else {
                    ?>
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gray-200 my-4 md:flex items-stretch">
                        <div class="w-full p-10 text-center">
                            <i class="fa-solid fa-battery-empty text-4xl text-red-700 my-4"></i>
                            <h1 class="text-xl text-red-700 font-medium uppercase pb-2">Não há encarte disponível</h1>
                            <div class="text-base text-gray-700 font-bold uppercase pb-2">Aguarde, em breve novas ofertas especiais.</div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_query();
                ?>
            </div>
        </div>
    </section>
    
    <?php
    date_default_timezone_set("America/Sao_Paulo");
    $timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
    $postEncarte = array(
        'post_type' => 'lamina',
        'posts_per_page' => 1,
        'meta_key' => 'validade',
        'meta_value' => $timeCurrent,
        'meta_compare' => '>'
    );
    $enQuery = new WP_Query($postEncarte);
    if ($enQuery->have_posts()) {
        $enQuery->the_post();
        $paginas = get_field('encarte');
        $paginaImage = wp_get_attachment_image_src($paginas[0]['ID'], 'full');
        ?>
        <section class="py-8">
            <div class="container mx-auto px-4">
                <h3 class="text-xl md:text-4xl text-red-700 text-center font-medium uppercase pb-4">
                    Veja mais ofertas na loja mais próxima!
                </h3>
                <div class="flex flex-wrap items-center">
                    <div class="w-full sm:w-1/2 md:w-1/3 xl:w-1/4 px-2 py-4">
                        <div class="rounded-xl overflow-hidden shadow-lg shadow-gray-300">
                            <img src="<?php echo $paginaImage[0]; ?>" class="w-full" alt="">
                            <div class="px-4 py-4 uppercase">
                                <h3 class="text-lg md:text-2xl text-red-700 font-medium pb-2">LÂMINA</h3>
                                <?php
                                if (get_field('lojas_validas')) {
                                    $lojasValidas = get_field('lojas_validas');
                                    ?><h4 class="text-xs md:text-sm font-medium text-gray-600 pb-2"><?php echo $lojasValidas; ?></h4><?php
                                }
                                ?>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-2">
                                    <?php
                                    if (get_field('pdf')) {
                                        $encarteArquivo = get_field('pdf');
                                    ?>
                                        <a href="<?php echo $encarteArquivo; ?>" class="block w-full" target="_blank"><button class="w-full bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-2 py-2 px-2 text-xs md:text-sm mx-auto uppercase">DOWNLOAD</button></a>
                                    <?php
                                    }
                                    ?>
                                    <a href="<?php echo get_the_permalink(); ?>" class="block w-full">
                                        <button class="w-full bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-2 py-2 px-2 text-xs md:text-sm mx-auto uppercase">VER LÂMINA</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
</main>
<?php get_footer(); ?>