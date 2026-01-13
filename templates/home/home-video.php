<?php
function offVideoOffer() {
    ?>
    <div class="w-full aspect-video rounded-xl md:rounded-2xl flex justify-center items-center text-xl bg-gray-100 p-4">
        <div class="uppercase text-center">
            <i class="fa-solid fa-link-slash text-5xl text-red-700 my-4"></i>
            <h3 class="font-medium text-red-700 py-2">Não há vídeo de ofertas no momento!</h3>
            <p class="text-sm text-gray-700">Por favor aguarde enquanto atualizamos o vídeo de ofertas da redeconomia!</p>
        </div>
    </div>
    <?php
}

date_default_timezone_set("America/Sao_Paulo");
$timeCurrent = (string) strftime('%Y-%m-%d %H:%M:%S', strtotime('now'));
$postEncarte = array(
    'post_type' => 'video',
    'posts_per_page' => 1,
    'meta_key' => 'validade',
    'meta_value' => $timeCurrent,
    'meta_compare' => '>'
);
$enQuery = new WP_Query($postEncarte);
if ($enQuery->have_posts()) {
    while ($enQuery->have_posts()) {
        $enQuery->the_post();
        $video = get_field('video');
        if ($video) {
            ?>
            <iframe class="w-full aspect-video rounded-xl md:rounded-2xl" src="https://www.youtube.com/embed/<?php echo $video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            <?php
        }
        else { offVideoOffer(); }
    }
}
else { offVideoOffer(); }

    /* echo do_shortcode('[youtube_channel]'); */ 
    ?>