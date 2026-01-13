<?php get_header(); ?>
<main>
    <?php the_content(); ?>
    <?php 
    get_template_part('templates/home/home', 'banner'); 
    get_template_part('templates/home/home', 'button-offer');
    get_template_part('templates/home/home', 'featured');
    get_template_part('templates/home/home', 'offers');
    // get_template_part('templates/home/home', 'app');
    get_template_part('templates/home/home', 'articles');
    get_template_part('templates/home/home', 'info');
    // if (isset($_GET['a']) && $_GET['a'] == 'b') { get_template_part('templates/home/home', 'formulario-instagram');  }
    ?>
</main>
<?php get_footer(); ?>