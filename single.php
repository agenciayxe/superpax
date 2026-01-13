<?php get_header(); ?>
<main>
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap md:flex-row-reverse">
            <?php get_template_part('templates/components/articles', 'aside'); ?>
                <div class="w-full md:w-2/3 lg:w-3/4">
                    <?php 
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                ?>
                                <h1 class="text-2xl uppercase text-red-700 font-medium my-4"><?php echo get_the_title(); ?></h1>
                                <h3 class="text-base uppercase text-gray-500 my-4">publicado: <?php echo get_the_date(); ?></h3>
                                <a onclick="window.history.go(-1); return false;"><button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 mr-2 py-2 px-10 inline-block text-base uppercase">Voltar</button></a><a href="<?php echo get_post_type_archive_link('dicas'); ?>"><button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 mr-2 py-2 px-10 inline-block text-base uppercase">Outras Dicas</button></a>
                                <div class="text-xl text-gray-600 content-single">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                ?>
                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" class="w-full md:w-auto py-4 md:py-0 float-none md:float-right">
                                                <?php
                                            }
                                            if (get_field('shorts_link')) {
                                                ?>
                                                <a href="<?php echo get_field('shorts_link'); ?>" target="_blank"><button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase">ASSISTA A RECEITA COMPLETA</button></a>
                                                <?php
                                            }
                                            the_content();
                                            ?>
                                            
                                </div>
                                <a onclick="window.history.go(-1); return false;"><button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 mr-2 py-2 px-10 inline-block text-base uppercase">Voltar</button></a><a href="<?php echo get_post_type_archive_link('dicas'); ?>"><button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 mr-2 py-2 px-10 inline-block text-base uppercase">Outras Dicas</button></a>
                                <hr class="border-gray-200 my-6">
                                <h3 class="text-lg uppercase text-red-700 font-medium my-4">COMPARTILHE</h3>
                                <div class="font-bold py-2 bg-pink md:text-lg flex text-red-700 gap-5">
                                    <div class="addthis_inline_share_toolbox_cyf8"></div>
                                </div>
                                <hr class="border-gray-200 my-6">

                                <div class="comments-facebook">
                                    <h3 class="text-lg uppercase text-red-700 font-medium my-4">Deixe seu comentário:</h3>
                                    <?php
                                    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                                    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                    ?>
                                    <div class="fb-comments" data-href="<?php echo $url; ?>" data-width="100%" width="100%" data-numposts="10"></div>
                                </div>
                                <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>