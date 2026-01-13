<?php 
/*
Template name: Lojas
*/
get_header(); ?>
<main>
    <section class="py-8">
        <div class="container mx-auto px-4">
            <h3 class="py-3 font-medium text-xl font-reading text-red-700">Encontre a loja mais próxima de você!</h3>
            <div class="md:flex gap-x-4">
                <div class="w-full md:w-1/2 my-2">
                    <select class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" name="municipio" id="campo-municipio"> 
                        <option disabled selected>Selecione um municipio</option>
                    </select>
                </div>
                <div class="w-full md:w-1/2 my-2">
                    <select class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" name="bairro" id="campo-bairro" disabled>
                        <option disabled selected>Selecione um bairro</option>
                    </select>
                </div>
            </div>
            <hr class="border-gray-200 my-6">
            <div class="w-full" id="store-list">
            <?php
				if (isset($_GET['loja']) && $_GET['loja'] != '') {
					$idLoja = (int) $_GET['loja'];
				    $argsStore = array(
				    	'p' => $idLoja,
				        'post_type' => 'lojas',
				        'posts_per_page' => 1
				    );
				    $storeList = new WP_Query($argsStore);
				    if ($storeList->have_posts()) {
				        while ($storeList->have_posts()) {
				            $storeList->the_post();
                            $arrayTelefones = array();
                            if (get_field('telefone')) { $arrayTelefones[] = get_field('telefone'); }
                            if (get_field('telefone2')) { $arrayTelefones[] = get_field('telefone2'); }
                            if (get_field('telefone3')) { $arrayTelefones[] = get_field('telefone3'); }

				            $terms = wp_get_post_terms( get_the_ID(), 'lojas' );
                            $nameTerms = $terms[0]->name;
                            if ($terms[0]->parent) {
                                $terms = get_term( $terms[0]->parent, 'lojas' );
                                $nameTerms = $terms->name;
                            }
				            ?>
				            <div class="rounded-xl overflow-hidden shadow-lg shadow-gray-300 my-4 md:flex items-stretch">
                                <div class="md:w-1/2"><?php echo get_field('mapa'); ?></div>
                                <div class="md:w-1/2 text-center md:text-left p-8 md:p-16">
                                    <h1 class="text-xl md:text-2xl text-red-700 font-medium uppercase pb-1 md:pb-4"><?php echo $nameTerms; ?></h1>
                                    <div class="text-lg md:text-xl text-gray-700 font-bold uppercase pb-1 md:pb-4"><?php echo get_the_title(); ?></div>
                                    <div class="py-1 md:py-3 uppercase font-medium font-reading text-gray-500"><?php echo get_the_content(); ?></div>
                                    <hr class="border-gray-200 my-4">
                                    <?php if (count($arrayTelefones) > 0) { ?> <div class="py-1 md:py-3 uppercase font-medium font-reading text-gray-500"><strong>Telefone(s): </strong> <?php echo implode(" / ", $arrayTelefones); ?></div> <?php }?>
                                    <?php if (get_field('whatsapp')) { ?><div class="py-1 md:py-3 uppercase font-medium font-reading text-gray-500"><strong>WhatsApp: </strong> <?php echo get_field('whatsapp'); ?></div><?php } ?>
                                    <?php if (get_field('horario')) { ?><div class="py-1 md:py-3 uppercase font-medium font-reading text-gray-500"><strong>Horário de Funcionamento: </strong> <?php echo get_field('horario'); ?></div><?php } ?>
                                    <a href="<?php echo get_permalink(); ?>" target="_blank"><button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 inline-block text-base uppercase">Ver Mapa</button></a>
                                </div>
                            </div>
				            <?php
				        }
				    }
				}
                else {
                    ?>
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gray-200 my-4 md:flex items-stretch">
                        <div class="w-full p-10 text-center">
                            <i class="fa-solid fa-arrow-up text-4xl text-red-700 my-4"></i>
                            <h1 class="text-xl text-red-700 font-medium uppercase pb-2">selecione o município e o bairro de preferência acima</h1>
                            <div class="text-base text-gray-700 font-bold uppercase pb-2">para encontrar a loja mais próxima de você!</div>
                        </div>
                    </div>
                    <?php
                }
			    ?>
                
            </div>
        </div>
    </section>
</main>
<?php
$municipio = array();
$municipioTaxonomy = get_terms( 
    array(
        'taxonomy' => 'lojas', 'parent' => 0
    )
);
foreach ($municipioTaxonomy as $municipioSingle) {
    $child = array();
    $bairro = array();
    $bairroTaxonomy = get_terms( 
        array(
            'taxonomy' => 'lojas',
            'child_of' => $municipioSingle->term_id
        )
    );
    foreach ($bairroTaxonomy as $bairroSingle) {
        $child = array();
        $bairro[] = array(
            'name' => $bairroSingle->name,
            'slug' => $bairroSingle->slug
        );
    }
    $municipio[] = array(
        'name' => $municipioSingle->name,
        'slug' => $municipioSingle->slug,
        'bairro' => $bairro
    );
}
$municipio = json_encode($municipio);
?>
<script> var municipios = <?php echo $municipio; ?>;</script>
<?php get_footer(); ?>