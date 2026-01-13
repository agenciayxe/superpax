<h3 class="text-xl my-2 font-medium text-red-700 uppercase">Tags</h3>
<div class="my-2 flex flex-wrap md:block">
    <?php
        $tags = get_terms( 'tag_dicas', array(
            'hide_empty' => false,
        ) );
        foreach ($tags as $singletag) {
            ?><div><a href="<?php echo get_term_link($singletag, 'dicas'); ?>"><span class="inline-block my-1 mx-1 md:mx-0 md:my-2 py-2 px-2 md:px-4 text-xs md:text-lg text-red-700 font-bold uppercase border md:border-2 border-red-700"><?php echo $singletag->name; ?></span></a></div><?php
        }
    ?>
    
    
</div>