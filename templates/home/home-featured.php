<section id="featured" class="py-2 md:py-8">
    <div class="container mx-auto px-4">
        <div class="w-full grid md:grid-cols-12 gap-4 md:gap-8 xl:gap-12">
            <div class="md:col-span-7">
                <?php get_template_part('templates/home/home', 'video'); ?>
            </div>
            <div class="md:col-span-5 flex flex-col sm:flex-row md:flex-col uppercase gap-4 justify-center sm:justify-between md:gap-8 xl:gap-12">
                <?php get_template_part('templates/home/home', 'brochure'); ?>
            </div>
        </div>
    </div>
</section>