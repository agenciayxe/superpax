<div>
    <h3 class="py-3 font-bold uppercase text-black">Sobre</h3>
    <?php 
    wp_nav_menu( 
        array( 
            'theme_location' => 'menurodape-2', 
            'menu_class' => 'font-reading',
            'menu_id' => 'footer-nav',
            'container_class' => '', 
            'container_id' => 'menu-principal-footer',
            'walker' => new OrganizacaoMenuRodape()
        ) 
    );
    ?>
</div>