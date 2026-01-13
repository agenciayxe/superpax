<?php get_header(); ?>
<main>
    <?php 
    get_template_part('templates/home/home', 'banner'); 
    get_template_part('templates/home/home', 'featured');
    get_template_part('templates/home/home', 'offers');
    // get_template_part('templates/home/home', 'app');
    get_template_part('templates/home/home', 'info');
    get_template_part('templates/home/home', 'articles');
    ?>
</main>
<?php get_footer(); ?>