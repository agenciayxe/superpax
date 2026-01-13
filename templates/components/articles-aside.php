
<div class="md:w-1/3 lg:w-1/4 px-4 <?php if (is_single()) { echo ' hidden '; } ?> md:block">
    <aside>
        
        <div class="mb-4 md:mb-10">
            <?php get_template_part('templates/components/widget', 'search'); ?>
        </div>
        <div class="mb-4 md:mb-10 hidden md:block">
            <?php get_template_part('templates/components/widget', 'recents'); ?>
        </div>
        <div class="mb-2 md:mb-10">
            <?php get_template_part('templates/components/widget', 'tags'); ?>
        </div>
    </aside>
</div>