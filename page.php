<?php get_header(); ?>
<main>
    <section id="page" class="section-page pt-8 pb-8">
        <div class="container mx-auto px-4">
            <?php 
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        echo get_the_content();
                    }
                }
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>