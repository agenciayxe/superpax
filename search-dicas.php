<?php get_header(); ?>
    <main>
        <section class="py-8">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap md:flex-row-reverse">
                    <?php get_template_part('templates/components/articles', 'aside'); ?>
                    <div class="w-full md:w-2/3 lg:w-3/4">
                        <?php get_template_part('templates/components/articles', 'list'); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>