    <footer class="bg-gray-200 py-2 md:py-8 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 md:gap-x-16">
                <?php 
                get_template_part('templates/footer/footer', 'links');
                get_template_part('templates/footer/footer', 'links-2');
                get_template_part('templates/footer/footer', 'links-3');
                get_template_part('templates/footer/footer', 'info');
                ?>
            </div>
        </div>
    </footer>
    <div class="fixed bottom-0 right-0 m-4 z-50"><a href="https://www.redeconomia.com.br/clube-redeconomia/" target="_blank"><div class="bg-[url('../img/icon.png')] bg-cover bg-center h-32 w-32 hover:scale-105 transition duration-500"></div></a></div>
    <?php get_template_part('templates/footer/footer', 'copyright'); ?>
    <?php 
    if (isset($_GET['a']) && $_GET['a'] == 'b') { var_dump($_COOKIE); }
    if (!isset($_COOKIE["cookie_accepted"]) || $_COOKIE["cookie_accepted"] != "1") { get_template_part('templates/footer/footer', 'cookies'); } ?>
    <?php wp_footer(); ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bbf6f323dad74f2"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo get_bloginfo('template_url'); ?>/node_modules/flowbite/dist/flowbite.js"></script>
    <script src="<?php echo get_bloginfo('template_url'); ?>/js/script.js"></script>
    <script async src="https://tags.cgcmd.globo.com/gp/de09cd01-db04-4c7b-bd4e-14dac863a306.js"></script>
</body>
</html>