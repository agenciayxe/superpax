
<h3 class="text-xl my-2 font-medium text-red-700 uppercase">Mais Recentes</h3>
<?php 
$argsTips = array(
    'post_type' => 'dicas',
    'posts_per_page' => 4
);
$listTips = new WP_Query($argsTips);
if ($listTips->have_posts()) {
    while ($listTips->have_posts()) {
        $listTips->the_post();
        ?>
        <div class="w-full py-2">
            <a href="<?php echo get_the_permalink(); ?>">
                <div class="rounded-xl overflow-hidden shadow-lg shadow-gray-300 flex">
                    <div class="w-1/3 bg-center bg-cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                    <div class="w-2/3 px-4 pt-4 pb-1 uppercase">
                        <h3 class="text-sm text-gray-400 font-medium pb-2"><?php echo get_the_title(); ?></h3>
                        <div class="text-blue-500 text-right py-2 text-xs font-bold">VER MAIS</div>
                    </div>
                </div>
            </a>
        </div>
        <?php 
    }
}
?> 